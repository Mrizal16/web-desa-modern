<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        $complaints = Complaint::where('user_id', $request->user()->id)
            ->latest()
            ->get()
            ->map(function ($complaint) {
                return [
                    'id' => $complaint->id,
                    'title' => $complaint->title,
                    'category' => $complaint->category,
                    'message' => $complaint->message,
                    'status' => $complaint->status,
                    'admin_response' => $complaint->admin_response,
                    'attachment_path' => $complaint->attachment_path,
                    'attachment_url' => $complaint->attachment_path
                        ? asset('storage/' . $complaint->attachment_path)
                        : null,
                    'created_at' => $complaint->created_at,
                    'updated_at' => $complaint->updated_at,
                ];
            });

        return response()->json([
            'message' => 'Daftar pengaduan berhasil diambil.',
            'data' => $complaints,
        ]);
    }

    public function show(Request $request, Complaint $complaint)
    {
        if ($complaint->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Anda tidak memiliki akses ke pengaduan ini.',
            ], 403);
        }

        return response()->json([
            'message' => 'Detail pengaduan berhasil diambil.',
            'data' => [
                'id' => $complaint->id,
                'title' => $complaint->title,
                'category' => $complaint->category,
                'message' => $complaint->message,
                'status' => $complaint->status,
                'admin_response' => $complaint->admin_response,
                'attachment_path' => $complaint->attachment_path,
                'attachment_url' => $complaint->attachment_path
                    ? asset('storage/' . $complaint->attachment_path)
                    : null,
                'created_at' => $complaint->created_at,
                'updated_at' => $complaint->updated_at,
            ],
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'category' => [
                'required',
                'string',
                'max:100',
            ],
            'message' => [
                'required',
                'string',
                'max:3000',
            ],
            'attachment' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:2048',
            ],
        ]);

        $path = null;

        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store(
                'complaints/' . $request->user()->id,
                'public'
            );
        }

        $complaint = Complaint::create([
            'user_id' => $request->user()->id,
            'title' => $validated['title'],
            'category' => $validated['category'],
            'message' => $validated['message'],
            'attachment_path' => $path,
            'status' => 'MENUNGGU',
        ]);

        return response()->json([
            'message' => 'Pengaduan berhasil dikirim.',
            'data' => [
                'id' => $complaint->id,
                'title' => $complaint->title,
                'category' => $complaint->category,
                'message' => $complaint->message,
                'status' => $complaint->status,
                'attachment_path' => $complaint->attachment_path,
                'attachment_url' => $complaint->attachment_path
                    ? asset('storage/' . $complaint->attachment_path)
                    : null,
                'created_at' => $complaint->created_at,
            ],
        ], 201);
    }
}