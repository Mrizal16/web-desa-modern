<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LetterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LetterRequestController extends Controller
{
    public function index()
    {
        $requests = LetterRequest::with([
            'user',
            'letterType',
        ])
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
            'result_file_path' => $filePath,
            'completed_at' => now(),
            'admin_note' => null,
        ]);

        return redirect()
            ->route('admin.permohonan.show', $letterRequest)
            ->with('success', 'Permohonan berhasil diselesaikan.');
    }
}