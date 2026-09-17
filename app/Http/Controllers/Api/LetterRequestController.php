<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LetterDocument;
use App\Models\LetterRequest;
use App\Models\LetterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LetterRequestController extends Controller
{
    /**
     * Daftar jenis surat aktif.
     */
    public function types()
    {
        $letterTypes = LetterType::where('is_active', true)
            ->orderBy('name')
            ->get();

        return response()->json([
            'message' => 'Jenis surat berhasil diambil.',
            'data' => $letterTypes,
        ]);
    }

    /**
     * Daftar permohonan surat milik warga yang login.
     */
    public function index(Request $request)
    {
        $letterRequests = LetterRequest::where('user_id', $request->user()->id)
            ->with('letterType')
            ->latest()
            ->get();

        return response()->json([
            'message' => 'Daftar permohonan surat berhasil diambil.',
            'data' => $letterRequests,
        ]);
    }

    /**
     * Detail permohonan surat.
     */
    public function show(Request $request, LetterRequest $letterRequest)
    {
        if ($letterRequest->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Anda tidak memiliki akses ke permohonan ini.',
            ], 403);
        }

        $letterRequest->load([
            'letterType',
            'documents',
        ]);

        $documents = $letterRequest->documents->map(function ($document) {
            return [
                'id' => $document->id,
                'document_type' => $document->document_type,
                'file_name' => $document->file_name,
                'file_path' => $document->file_path,
                'file_url' => $document->file_path
                    ? asset('storage/' . $document->file_path)
                    : null,
            ];
        });

        return response()->json([
            'message' => 'Detail permohonan berhasil diambil.',
            'data' => [
                'id' => $letterRequest->id,
                'request_number' => $letterRequest->request_number,
                'letter_type' => $letterRequest->letterType,
                'purpose' => $letterRequest->purpose,
                'status' => $letterRequest->status,
                'admin_note' => $letterRequest->admin_note,
                'delivery_method' => $letterRequest->delivery_method,
                'final_delivery_method' => $letterRequest->final_delivery_method,
                'result_file_path' => $letterRequest->result_file_path,
                'result_file_url' => $letterRequest->result_file_path
                    ? asset('storage/' . $letterRequest->result_file_path)
                    : null,
                'completed_at' => $letterRequest->completed_at,
                'pickup_status' => $letterRequest->pickup_status,
                'documents' => $documents,
                'created_at' => $letterRequest->created_at,
                'updated_at' => $letterRequest->updated_at,
            ],
        ]);
    }

    /**
     * Membuat permohonan surat baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'letter_type_id' => [
                'required',
                'integer',
                'exists:letter_types,id',
            ],
            'purpose' => [
                'required',
                'string',
                'max:1000',
            ],
            'delivery_method' => [
                'nullable',
                'in:pdf,pickup',
            ],
            'ktp' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:2048',
            ],
            'kk' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:2048',
            ],
            'supporting_document' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:2048',
            ],
        ]);

        $letterType = LetterType::where('id', $validated['letter_type_id'])
            ->where('is_active', true)
            ->first();

        if (!$letterType) {
            return response()->json([
                'message' => 'Jenis surat tidak tersedia atau sudah tidak aktif.',
            ], 422);
        }

        $deliveryMethod = $validated['delivery_method'] ?? null;

        if ($deliveryMethod === 'pdf' && !$letterType->allow_pdf) {
            return response()->json([
                'message' => 'Jenis surat ini tidak mendukung PDF.',
                'errors' => [
                    'delivery_method' => [
                        'Jenis surat ini tidak mendukung PDF.',
                    ],
                ],
            ], 422);
        }

        if ($deliveryMethod === 'pickup' && !$letterType->allow_pickup) {
            return response()->json([
                'message' => 'Jenis surat ini tidak dapat diambil secara fisik.',
                'errors' => [
                    'delivery_method' => [
                        'Jenis surat ini tidak dapat diambil secara fisik.',
                    ],
                ],
            ], 422);
        }

        $letterRequest = DB::transaction(function () use (
            $request,
            $validated,
            $letterType,
            $deliveryMethod
        ) {
            $letterRequest = LetterRequest::create([
                'request_number' => $this->generateRequestNumber(),
                'user_id' => $request->user()->id,
                'letter_type_id' => $letterType->id,
                'purpose' => $validated['purpose'],
                'delivery_method' => $deliveryMethod,
                'status' => 'MENUNGGU VERIFIKASI',
            ]);

            $this->storeDocument(
                $letterRequest,
                'KTP',
                $request->file('ktp')
            );

            $this->storeDocument(
                $letterRequest,
                'KARTU KELUARGA',
                $request->file('kk')
            );

            if ($request->hasFile('supporting_document')) {
                $this->storeDocument(
                    $letterRequest,
                    'DOKUMEN PENDUKUNG',
                    $request->file('supporting_document')
                );
            }

            return $letterRequest;
        });

        $letterRequest->load([
            'letterType',
            'documents',
        ]);

        return response()->json([
            'message' => 'Pengajuan surat berhasil dikirim.',
            'data' => $letterRequest,
        ], 201);
    }

    /**
     * Mengirim ulang revisi permohonan.
     */
    public function updateRevision(
        Request $request,
        LetterRequest $letterRequest
    ) {
        if ($letterRequest->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Anda tidak memiliki akses ke permohonan ini.',
            ], 403);
        }

        if ($letterRequest->status !== 'PERLU PERBAIKAN') {
            return response()->json([
                'message' => 'Permohonan ini tidak sedang membutuhkan perbaikan.',
            ], 422);
        }

        $validated = $request->validate([
            'purpose' => [
                'required',
                'string',
                'max:1000',
            ],
            'ktp' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:2048',
            ],
            'kk' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:2048',
            ],
            'supporting_document' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:2048',
            ],
        ]);

        DB::transaction(function () use (
            $request,
            $validated,
            $letterRequest
        ) {
            $letterRequest->update([
                'purpose' => $validated['purpose'],
            ]);

            if ($request->hasFile('ktp')) {
                $this->replaceDocument(
                    $letterRequest,
                    'KTP',
                    $request->file('ktp')
                );
            }

            if ($request->hasFile('kk')) {
                $this->replaceDocument(
                    $letterRequest,
                    'KARTU KELUARGA',
                    $request->file('kk')
                );
            }

            if ($request->hasFile('supporting_document')) {
                $this->replaceDocument(
                    $letterRequest,
                    'DOKUMEN PENDUKUNG',
                    $request->file('supporting_document')
                );
            }

            $letterRequest->update([
                'status' => 'MENUNGGU VERIFIKASI',
                'admin_note' => null,
            ]);
        });

        $letterRequest->load([
            'letterType',
            'documents',
        ]);

        return response()->json([
            'message' => 'Perbaikan berhasil dikirim kembali ke admin.',
            'data' => $letterRequest,
        ]);
    }

    private function storeDocument(
        LetterRequest $letterRequest,
        string $documentType,
        $file
    ): void {
        $path = $file->store(
            'letter-documents/' . $letterRequest->id,
            'public'
        );

        LetterDocument::create([
            'request_id' => $letterRequest->id,
            'document_type' => $documentType,
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
        ]);
    }

    private function replaceDocument(
        LetterRequest $letterRequest,
        string $documentType,
        $file
    ): void {
        $path = $file->store(
            'letter-documents/' . $letterRequest->id,
            'public'
        );

        $document = $letterRequest->documents()
            ->where('document_type', $documentType)
            ->first();

        if ($document) {
            if ($document->file_path) {
                Storage::disk('public')->delete(
                    $document->file_path
                );
            }

            $document->update([
                'file_name' => $file->getClientOriginalName(),
                'file_path' => $path,
            ]);

            return;
        }

        LetterDocument::create([
            'request_id' => $letterRequest->id,
            'document_type' => $documentType,
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
        ]);
    }

    private function generateRequestNumber(): string
    {
        do {
            $number =
                'REQ-' .
                now()->format('Ymd') .
                '-' .
                strtoupper(Str::random(6));
        } while (
            LetterRequest::where(
                'request_number',
                $number
            )->exists()
        );

        return $number;
    }
}