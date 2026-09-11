<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\LetterRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LetterRequestController extends Controller
{
    public function index()
    {
        $requests = LetterRequest::with(['user', 'letterType'])
            ->latest()
            ->get();

        return view('admin.permohonan.index', compact('requests'));
    }

    public function show(LetterRequest $letterRequest)
    {
        $letterRequest->load([
            'user.resident',
            'letterType',
            'documents',
        ]);

        return view('admin.permohonan.show', compact('letterRequest'));
    }

    public function verify(LetterRequest $letterRequest)
    {
        $oldValues = [
            'status' => $letterRequest->status,
            'admin_note' => $letterRequest->admin_note,
        ];

        $letterRequest->update([
            'status' => 'DIPROSES',
            'admin_note' => null,
        ]);

        $this->logActivity(
            action: 'letter_verified',
            letterRequest: $letterRequest,
            description: 'Admin memverifikasi permohonan surat.',
            oldValues: $oldValues,
            newValues: [
                'status' => $letterRequest->status,
                'admin_note' => $letterRequest->admin_note,
            ],
        );

        Notification::create([
            'user_id' => $letterRequest->user_id,
            'title' => 'Permohonan Diverifikasi',
            'message' => 'Permohonan surat Anda sudah diverifikasi dan sedang diproses.',
            'type' => 'surat',
            'link' => route('warga.letters.show', $letterRequest),
        ]);

        return redirect()
            ->route('admin.permohonan.show', $letterRequest)
            ->with('success', 'Permohonan berhasil diverifikasi.');
    }

    public function requestRevision(Request $request, LetterRequest $letterRequest)
    {
        $validated = $request->validate([
            'admin_note' => 'required|string|max:1000',
        ]);

        $oldValues = [
            'status' => $letterRequest->status,
            'admin_note' => $letterRequest->admin_note,
        ];

        $letterRequest->update([
            'status' => 'PERLU PERBAIKAN',
            'admin_note' => $validated['admin_note'],
        ]);

        $this->logActivity(
            action: 'letter_revision_requested',
            letterRequest: $letterRequest,
            description: 'Admin meminta warga memperbaiki permohonan surat.',
            oldValues: $oldValues,
            newValues: [
                'status' => $letterRequest->status,
                'admin_note' => $letterRequest->admin_note,
            ],
        );

        Notification::create([
            'user_id' => $letterRequest->user_id,
            'title' => 'Permohonan Perlu Diperbaiki',
            'message' => 'Permohonan surat Anda perlu diperbaiki. Silakan lihat catatan admin.',
            'type' => 'surat',
            'link' => route('warga.letters.show', $letterRequest),
        ]);

        return redirect()
            ->route('admin.permohonan.show', $letterRequest)
            ->with('success', 'Permohonan dikembalikan untuk diperbaiki oleh warga.');
    }

    public function reject(Request $request, LetterRequest $letterRequest)
    {
        $validated = $request->validate([
            'admin_note' => 'required|string|max:1000',
        ]);

        $oldValues = [
            'status' => $letterRequest->status,
            'admin_note' => $letterRequest->admin_note,
        ];

        $letterRequest->update([
            'status' => 'DITOLAK',
            'admin_note' => $validated['admin_note'],
        ]);

        $this->logActivity(
            action: 'letter_rejected',
            letterRequest: $letterRequest,
            description: 'Admin menolak permohonan surat.',
            oldValues: $oldValues,
            newValues: [
                'status' => $letterRequest->status,
                'admin_note' => $letterRequest->admin_note,
            ],
        );

        Notification::create([
            'user_id' => $letterRequest->user_id,
            'title' => 'Permohonan Ditolak',
            'message' => 'Permohonan surat Anda ditolak. Silakan lihat alasan dari admin.',
            'type' => 'surat',
            'link' => route('warga.letters.show', $letterRequest),
        ]);

        return redirect()
            ->route('admin.permohonan.show', $letterRequest)
            ->with('success', 'Permohonan berhasil ditolak.');
    }

    public function complete(Request $request, LetterRequest $letterRequest)
    {
        if ($letterRequest->status !== 'DIPROSES') {
            abort(403);
        }

        $validated = $request->validate([
            'final_delivery_method' => 'required|in:pdf,pickup',
            'result_pdf' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        if (
            $validated['final_delivery_method'] === 'pdf' &&
            !$request->hasFile('result_pdf')
        ) {
            return back()->withErrors([
                'result_pdf' => 'File PDF surat wajib diupload.',
            ]);
        }

        $oldValues = [
            'status' => $letterRequest->status,
            'final_delivery_method' => $letterRequest->final_delivery_method,
            'pickup_status' => $letterRequest->pickup_status,
            'result_file_path' => $letterRequest->result_file_path,
            'completed_at' => $letterRequest->completed_at,
            'admin_note' => $letterRequest->admin_note,
        ];

        $filePath = null;

        if ($validated['final_delivery_method'] === 'pdf') {
            $filePath = $request->file('result_pdf')->store(
                'letter-results/' . $letterRequest->id,
                'public'
            );
        }

        if ($letterRequest->result_file_path) {
            Storage::disk('public')->delete(
                $letterRequest->result_file_path
            );
        }

        $letterRequest->update([
            'status' => 'SELESAI',
            'final_delivery_method' => $validated['final_delivery_method'],
            'pickup_status' => $validated['final_delivery_method'] === 'pickup'
                ? 'SIAP DIAMBIL'
                : null,
            'result_file_path' => $filePath,
            'completed_at' => now(),
            'admin_note' => null,
        ]);

        $this->logActivity(
            action: 'letter_completed',
            letterRequest: $letterRequest,
            description: 'Admin menyelesaikan permohonan surat.',
            oldValues: $oldValues,
            newValues: [
                'status' => $letterRequest->status,
                'final_delivery_method' => $letterRequest->final_delivery_method,
                'pickup_status' => $letterRequest->pickup_status,
                'result_file_path' => $letterRequest->result_file_path,
                'completed_at' => $letterRequest->completed_at,
                'admin_note' => $letterRequest->admin_note,
            ],
        );

        Notification::create([
            'user_id' => $letterRequest->user_id,
            'title' => 'Surat Selesai',
            'message' => $validated['final_delivery_method'] === 'pdf'
                ? 'Surat Anda sudah selesai dan dapat diunduh.'
                : 'Surat Anda sudah selesai dan siap diambil di Balai Desa.',
            'type' => 'surat',
            'link' => route('warga.letters.show', $letterRequest),
        ]);

        return redirect()
            ->route('admin.permohonan.show', $letterRequest)
            ->with('success', 'Permohonan berhasil diselesaikan.');
    }

    public function markPickedUp(LetterRequest $letterRequest)
    {
        if (
            $letterRequest->status !== 'SELESAI' ||
            $letterRequest->final_delivery_method !== 'pickup'
        ) {
            abort(403);
        }

        $oldValues = [
            'pickup_status' => $letterRequest->pickup_status,
        ];

        $letterRequest->update([
            'pickup_status' => 'SUDAH DIAMBIL',
        ]);

        $this->logActivity(
            action: 'letter_picked_up',
            letterRequest: $letterRequest,
            description: 'Admin menandai surat sudah diambil oleh warga.',
            oldValues: $oldValues,
            newValues: [
                'pickup_status' => $letterRequest->pickup_status,
            ],
        );

        Notification::create([
            'user_id' => $letterRequest->user_id,
            'title' => 'Surat Sudah Diambil',
            'message' => 'Surat Anda telah tercatat sudah diambil.',
            'type' => 'surat',
            'link' => route('warga.letters.show', $letterRequest),
        ]);

        return redirect()
            ->route('admin.permohonan.show', $letterRequest)
            ->with('success', 'Surat berhasil ditandai sudah diambil oleh warga.');
    }

    public function dashboard()
    {
        $stats = [
            'total_warga' => \App\Models\User::whereHas('resident')->count(),
            'menunggu' => LetterRequest::where('status', 'MENUNGGU VERIFIKASI')->count(),
            'diproses' => LetterRequest::where('status', 'DIPROSES')->count(),
            'perbaikan' => LetterRequest::where('status', 'PERLU PERBAIKAN')->count(),
            'selesai' => LetterRequest::where('status', 'SELESAI')->count(),
            'ditolak' => LetterRequest::where('status', 'DITOLAK')->count(),
            'pengaduan' => \App\Models\Complaint::count(),
        ];

        $latestRequests = LetterRequest::with(['user', 'letterType'])
            ->latest()
            ->take(5)
            ->get();

        $latestComplaints = \App\Models\Complaint::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'latestRequests',
            'latestComplaints'
        ));
    }

    private function logActivity(
        string $action,
        LetterRequest $letterRequest,
        string $description,
        array $oldValues = [],
        array $newValues = []
    ): void {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'subject_type' => LetterRequest::class,
            'subject_id' => $letterRequest->id,
            'description' => $description,
            'old_values' => $oldValues ?: null,
            'new_values' => $newValues ?: null,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
