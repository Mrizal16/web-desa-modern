<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Notification;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with('user')
            ->latest()
            ->get();

        return view('admin.complaints.index', compact('complaints'));
    }

    public function show(Complaint $complaint)
    {
        $complaint->load('user');

        return view('admin.complaints.show', compact('complaint'));
    }

    public function process(Complaint $complaint)
    {
        $complaint->update([
            'status' => 'DIPROSES',
        ]);

        Notification::create([
            'user_id' => $complaint->user_id,
            'title' => 'Pengaduan Sedang Diproses',
            'message' => 'Pengaduan Anda sedang ditindaklanjuti oleh admin desa.',
            'type' => 'pengaduan',
            'link' => route('warga.complaints.show', $complaint),
        ]);

        return redirect()
            ->route('admin.complaints.show', $complaint)
            ->with('success', 'Pengaduan sedang diproses.');
    }

    public function complete(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'admin_response' => 'required|string|max:3000',
        ]);

        $complaint->update([
            'status' => 'SELESAI',
            'admin_response' => $validated['admin_response'],
        ]);

        Notification::create([
            'user_id' => $complaint->user_id,
            'title' => 'Pengaduan Selesai',
            'message' => 'Pengaduan Anda telah selesai ditindaklanjuti. Silakan lihat tanggapan admin.',
            'type' => 'pengaduan',
            'link' => route('warga.complaints.show', $complaint),
        ]);

        return redirect()
            ->route('admin.complaints.show', $complaint)
            ->with('success', 'Pengaduan berhasil diselesaikan.');
    }
}