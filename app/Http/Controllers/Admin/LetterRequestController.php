<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LetterRequest;
use Illuminate\Http\Request;

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

        return view(
            'admin.permohonan.index',
            compact('requests')
        );
    }


    public function show(LetterRequest $letterRequest)
    {
        $letterRequest->load([
            'user.resident',
            'letterType',
            'documents',
        ]);

        return view(
            'admin.permohonan.show',
            compact('letterRequest')
        );
    }


    public function verify(LetterRequest $letterRequest)
    {
        $letterRequest->update([
            'status' => 'DIPROSES',
            'admin_note' => null,
        ]);

        return redirect()
            ->route('admin.permohonan.show', $letterRequest)
            ->with(
                'success',
                'Permohonan berhasil diverifikasi.'
            );
    }


    public function requestRevision(
        Request $request,
        LetterRequest $letterRequest
    ) {
        $validated = $request->validate([
            'admin_note' => 'required|string|max:1000',
        ]);

        $letterRequest->update([
            'status' => 'PERLU PERBAIKAN',
            'admin_note' => $validated['admin_note'],
        ]);

        return redirect()
            ->route('admin.permohonan.show', $letterRequest)
            ->with(
                'success',
                'Permohonan dikembalikan untuk diperbaiki oleh warga.'
            );
    }


    public function reject(
        Request $request,
        LetterRequest $letterRequest
    ) {
        $validated = $request->validate([
            'admin_note' => 'required|string|max:1000',
        ]);

        $letterRequest->update([
            'status' => 'DITOLAK',
            'admin_note' => $validated['admin_note'],
        ]);

        return redirect()
            ->route('admin.permohonan.show', $letterRequest)
            ->with(
                'success',
                'Permohonan berhasil ditolak.'
            );
    }
}