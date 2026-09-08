<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $letterRequest->update([
            'status' => 'DIPROSES',
            'admin_note' => null,
        ]);

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

        $letterRequest->update([
            'status' => 'PERLU PERBAIKAN',
            'admin_note' => $validated['admin_note'],
        ]);

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

        $letterRequest->update([
            'status' => 'DITOLAK',
            'admin_note' => $validated['admin_note'],
        ]);

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

        $letterRequest->update([
            'pickup_status' => 'SUDAH DIAMBIL',
        ]);

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
}