<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('warga.complaints.index', compact('complaints'));
    }

    public function create()
    {
        return view('warga.complaints.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'message' => 'required|string|max:3000',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $path = null;

        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store(
                'complaints/' . auth()->id(),
                'public'
            );
        }

        Complaint::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'category' => $validated['category'],
            'message' => $validated['message'],
            'attachment_path' => $path,
            'status' => 'MENUNGGU',
        ]);

        return redirect()
            ->route('warga.complaints.index')
            ->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function show(Complaint $complaint)
    {
        if ($complaint->user_id !== auth()->id()) {
            abort(403);
        }

        return view('warga.complaints.show', compact('complaint'));
    }
}