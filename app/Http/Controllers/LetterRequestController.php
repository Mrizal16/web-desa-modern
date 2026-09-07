<?php

namespace App\Http\Controllers;

use App\Models\LetterType;
use App\Models\LetterRequest;
use App\Models\LetterDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LetterRequestController extends Controller
{
    public function create()
    {
        $letterTypes = LetterType::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('warga.letters.create', compact('letterTypes'));
    }

    public function form(LetterType $letterType)
    {
        if (!$letterType->is_active) {
            abort(404);
        }

        return view('warga.letters.form', compact('letterType'));
    }

    public function store(Request $request, LetterType $letterType)
    {
        if (!$letterType->is_active) {
            abort(404);
        }

        $validated = $request->validate([
            'purpose' => 'required|string|max:1000',
            'delivery_method' => 'nullable|in:pdf,pickup',
            'ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'supporting_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $deliveryMethod = $validated['delivery_method'] ?? null;

        if ($deliveryMethod === 'pdf' && !$letterType->allow_pdf) {
            return back()
                ->withErrors([
                    'delivery_method' => 'Jenis surat ini tidak mendukung PDF.',
                ])
                ->withInput();
        }

        if ($deliveryMethod === 'pickup' && !$letterType->allow_pickup) {
            return back()
                ->withErrors([
                    'delivery_method' => 'Jenis surat ini tidak dapat diambil secara fisik.',
                ])
                ->withInput();
        }

        $letterRequest = DB::transaction(function () use (
            $request,
            $validated,
            $letterType,
            $deliveryMethod
        ) {
            $letterRequest = LetterRequest::create([
                'request_number' => $this->generateRequestNumber(),
                'user_id' => auth()->id(),
                'letter_type_id' => $letterType->id,
                'purpose' => $validated['purpose'],
                'delivery_method' => $deliveryMethod,
                'status' => 'MENUNGGU VERIFIKASI',
            ]);

            $ktp = $request->file('ktp');
            $ktpPath = $ktp->store(
                'letter-documents/' . $letterRequest->id,
                'public'
            );

            LetterDocument::create([
                'request_id' => $letterRequest->id,
                'document_type' => 'KTP',
                'file_name' => $ktp->getClientOriginalName(),
                'file_path' => $ktpPath,
            ]);

            $kk = $request->file('kk');
            $kkPath = $kk->store(
                'letter-documents/' . $letterRequest->id,
                'public'
            );

            LetterDocument::create([
                'request_id' => $letterRequest->id,
                'document_type' => 'KARTU KELUARGA',
                'file_name' => $kk->getClientOriginalName(),
                'file_path' => $kkPath,
            ]);

            if ($request->hasFile('supporting_document')) {
                $support = $request->file('supporting_document');

                $supportPath = $support->store(
                    'letter-documents/' . $letterRequest->id,
                    'public'
                );

                LetterDocument::create([
                    'request_id' => $letterRequest->id,
                    'document_type' => 'DOKUMEN PENDUKUNG',
                    'file_name' => $support->getClientOriginalName(),
                    'file_path' => $supportPath,
                ]);
            }

            return $letterRequest;
        });

        return redirect()
            ->route('warga.letters.show', $letterRequest)
            ->with('success', 'Pengajuan surat berhasil dikirim.');
    }

    public function index()
    {
        $letterRequests = auth()
            ->user()
            ->letterRequests()
            ->with('letterType')
            ->latest()
            ->get();

        return view(
            'warga.letters.index',
            compact('letterRequests')
        );
    }

    public function show(LetterRequest $letterRequest)
    {
        if ($letterRequest->user_id !== auth()->id()) {
            abort(403);
        }

        $letterRequest->load([
            'letterType',
            'documents',
        ]);

        return view(
            'warga.letters.show',
            compact('letterRequest')
        );
    }

    public function editRevision(LetterRequest $letterRequest)
    {
        if ($letterRequest->user_id !== auth()->id()) {
            abort(403);
        }

        if ($letterRequest->status !== 'PERLU PERBAIKAN') {
            abort(403);
        }

        $letterRequest->load([
            'letterType',
            'documents',
        ]);

        return view(
            'warga.letters.revision',
            compact('letterRequest')
        );
    }

    public function updateRevision(
        Request $request,
        LetterRequest $letterRequest
    ) {
        if ($letterRequest->user_id !== auth()->id()) {
            abort(403);
        }

        if ($letterRequest->status !== 'PERLU PERBAIKAN') {
            abort(403);
        }

        $validated = $request->validate([
            'purpose' => 'required|string|max:1000',
            'ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'supporting_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
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

        return redirect()
            ->route('warga.letters.show', $letterRequest)
            ->with(
                'success',
                'Perbaikan berhasil dikirim kembali ke admin.'
            );
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
                Storage::disk('public')
                    ->delete($document->file_path);
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