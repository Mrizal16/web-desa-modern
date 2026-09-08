@extends('layouts.warga')

@section('title', 'Detail Permohonan')

@section('content')

@php
    $status = strtoupper($letterRequest->status ?? '');
@endphp

<div class="space-y-6">

    {{-- HEADER --}}
    <div>
        <a href="{{ route('warga.letters.index') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-sky-600 hover:text-sky-700 transition">

            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      d="M15 19l-7-7 7-7"/>
            </svg>

            Kembali ke Surat Saya
        </a>

        <div class="mt-5">
            <p class="text-sm font-semibold text-sky-600">
                Administrasi Surat
            </p>

            <h1 class="text-3xl font-bold text-slate-800 mt-1">
                Detail Permohonan
            </h1>

            <p class="text-slate-500 mt-1">
                Lihat informasi, dokumen, dan perkembangan permohonan surat Anda.
            </p>
        </div>
    </div>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="flex items-start gap-3 bg-sky-50 border border-sky-200 text-sky-700 p-4 rounded-2xl">

            <div class="w-9 h-9 bg-sky-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            <div>
                <p class="font-semibold">
                    Berhasil
                </p>

                <p class="text-sm mt-1">
                    {{ session('success') }}
                </p>
            </div>

        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- KONTEN UTAMA --}}
        <div class="xl:col-span-2 space-y-6">

            {{-- INFORMASI PERMOHONAN --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 bg-slate-50/50">

                    <div class="flex items-start gap-4">

                        <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">

                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>
                            </svg>

                        </div>

                        <div>
                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                                Jenis Surat
                            </p>

                            <h2 class="text-xl md:text-2xl font-bold text-slate-800 mt-1">
                                {{ $letterRequest->letterType->name ?? '-' }}
                            </h2>
                        </div>

                    </div>

                </div>

                <div class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- NOMOR --}}
                        <div class="border border-slate-200 rounded-xl p-4">

                            <p class="text-xs text-slate-400">
                                Nomor Permohonan
                            </p>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $letterRequest->request_number }}
                            </p>

                        </div>

                        {{-- TANGGAL --}}
                        <div class="border border-slate-200 rounded-xl p-4">

                            <p class="text-xs text-slate-400">
                                Tanggal Pengajuan
                            </p>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $letterRequest->created_at->format('d M Y, H:i') }}
                            </p>

                        </div>

                        {{-- PEMOHON --}}
                        <div class="border border-slate-200 rounded-xl p-4">

                            <p class="text-xs text-slate-400">
                                Nama Pemohon
                            </p>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $letterRequest->user->name ?? auth()->user()->name }}
                            </p>

                        </div>

                        {{-- PENERIMAAN --}}
                        <div class="border border-slate-200 rounded-xl p-4">

                            <p class="text-xs text-slate-400">
                                Pilihan Awal Penerimaan
                            </p>

                            <div class="mt-2">

                                @if($letterRequest->delivery_method === 'pdf')

                                    <span class="inline-flex items-center gap-2 bg-sky-50 text-sky-700 border border-sky-100 px-3 py-1.5 rounded-full text-xs font-semibold">

                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                  d="M7 3h7l5 5v13H7z"/>
                                        </svg>

                                        Download PDF
                                    </span>

                                @elseif($letterRequest->delivery_method === 'pickup')

                                    <span class="inline-flex items-center gap-2 bg-indigo-50 text-indigo-700 border border-indigo-100 px-3 py-1.5 rounded-full text-xs font-semibold">

                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                  d="M3 21h18M5 21V9l7-5 7 5v12"/>
                                        </svg>

                                        Ambil di Balai Desa
                                    </span>

                                @else
                                    <span class="text-sm text-slate-500">-</span>
                                @endif

                            </div>

                        </div>

                    </div>

                    {{-- KEPERLUAN --}}
                    <div class="mt-6">

                        <h3 class="font-bold text-slate-800">
                            Keperluan Surat
                        </h3>

                        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5 mt-3">

                            <p class="text-slate-700 leading-relaxed whitespace-pre-line">
                                {{ $letterRequest->purpose }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            {{-- DOKUMEN --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.2 7.8l-6.8 6.8a2 2 0 102.8 2.8l7.5-7.5a4 4 0 00-5.7-5.7L5.5 11.7a6 6 0 108.5 8.5l6-6"/>
                            </svg>

                        </div>

                        <div>
                            <h2 class="font-bold text-slate-800">
                                Dokumen Persyaratan
                            </h2>

                            <p class="text-sm text-slate-400 mt-1">
                                Dokumen yang Anda unggah saat mengajukan permohonan.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="p-6 space-y-3">

                    @forelse($letterRequest->documents as $document)

                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 border border-slate-200 bg-slate-50/50 rounded-xl p-4">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-xl bg-white border border-slate-200 text-sky-600 flex items-center justify-center flex-shrink-0">

                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M7 3h7l5 5v13H7zM14 3v6h6"/>
                                    </svg>

                                </div>

                                <div class="min-w-0">

                                    <p class="font-semibold text-slate-800">
                                        {{ $document->document_type }}
                                    </p>

                                    <p class="text-sm text-slate-400 mt-1 truncate">
                                        {{ $document->file_name }}
                                    </p>

                                </div>

                            </div>

                            <a href="{{ asset('storage/' . $document->file_path) }}"
                               target="_blank"
                               class="inline-flex justify-center items-center gap-2 bg-white border border-sky-200 hover:bg-sky-50 text-sky-700 font-semibold px-4 py-2 rounded-xl text-sm transition">

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M14 3h7v7m0-7L10 14M5 7v12h12v-5"/>
                                </svg>

                                Lihat Dokumen
                            </a>

                        </div>

                    @empty

                        <div class="py-10 text-center">

                            <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center mx-auto mb-3">

                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M7 3h7l5 5v13H7z"/>
                                </svg>

                            </div>

                            <p class="font-semibold text-slate-600">
                                Tidak ada dokumen
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

            {{-- CATATAN ADMIN --}}
            @if(!empty($letterRequest->admin_note))

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-slate-200">

                        <h2 class="font-bold text-slate-800">
                            Catatan Admin
                        </h2>

                        <p class="text-sm text-slate-400 mt-1">
                            Informasi dari admin terkait permohonan Anda.
                        </p>

                    </div>

                    <div class="p-6">

                        @if($status === 'PERLU PERBAIKAN')

                            <div class="flex gap-4 bg-orange-50 border border-orange-200 rounded-2xl p-5">

                                <div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 9v4m0 4h.01"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="font-semibold text-orange-800">
                                        Permohonan perlu diperbaiki
                                    </p>

                                    <p class="text-sm text-orange-800 mt-2 whitespace-pre-line">
                                        {{ $letterRequest->admin_note }}
                                    </p>
                                </div>

                            </div>

                        @elseif($status === 'DITOLAK')

                            <div class="flex gap-4 bg-red-50 border border-red-200 rounded-2xl p-5">

                                <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="font-semibold text-red-800">
                                        Alasan Penolakan
                                    </p>

                                    <p class="text-sm text-red-800 mt-2 whitespace-pre-line">
                                        {{ $letterRequest->admin_note }}
                                    </p>
                                </div>

                            </div>

                        @else

                            <div class="bg-amber-50 border border-amber-200 rounded-2xl p-5">

                                <p class="text-amber-800 whitespace-pre-line">
                                    {{ $letterRequest->admin_note }}
                                </p>

                            </div>

                        @endif

                    </div>

                </div>

            @endif

            {{-- PERBAIKAN --}}
            @if($status === 'PERLU PERBAIKAN')

                <div class="bg-orange-50 border border-orange-200 rounded-2xl p-6">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                        <div class="flex gap-4">

                            <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center flex-shrink-0">

                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M11 4H4v7m16 9h-7v-7M4 11l6-6m4 14l6-6"/>
                                </svg>

                            </div>

                            <div>
                                <h2 class="font-bold text-orange-800">
                                    Perbaikan Diperlukan
                                </h2>

                                <p class="text-sm text-orange-700 mt-2">
                                    Perbaiki data atau dokumen sesuai catatan admin agar permohonan dapat diverifikasi kembali.
                                </p>
                            </div>

                        </div>

                        <a href="{{ route('warga.letters.revision', $letterRequest) }}"
                           class="inline-flex justify-center items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-5 py-3 rounded-xl font-semibold transition flex-shrink-0">

                            Perbaiki Permohonan

                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 18l6-6-6-6"/>
                            </svg>

                        </a>

                    </div>

                </div>

            @endif

            {{-- HASIL SURAT --}}
            @if($status === 'SELESAI')

                @if($letterRequest->final_delivery_method === 'pdf')

                    <div class="bg-sky-50 border border-sky-200 rounded-2xl p-6">

                        <div class="flex gap-4">

                            <div class="w-12 h-12 rounded-xl bg-white text-sky-600 flex items-center justify-center flex-shrink-0">

                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M7 3h7l5 5v13H7zM14 3v6h6"/>
                                </svg>

                            </div>

                            <div class="flex-1">

                                <h2 class="font-bold text-xl text-sky-800">
                                    Surat Siap Diunduh
                                </h2>

                                <p class="text-sm text-sky-700 mt-2">
                                    Permohonan Anda telah selesai. Surat tersedia dalam bentuk PDF.
                                </p>

                                @if($letterRequest->result_file_path)

                                    <a href="{{ asset('storage/' . $letterRequest->result_file_path) }}"
                                       target="_blank"
                                       class="inline-flex items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl font-semibold mt-5 transition">

                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 3v12m0 0l-4-4m4 4l4-4M5 21h14"/>
                                        </svg>

                                        Download Surat PDF
                                    </a>

                                @else

                                    <div class="bg-white border border-amber-200 text-amber-700 p-4 rounded-xl mt-5">
                                        File surat belum tersedia. Silakan hubungi admin desa.
                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                @elseif($letterRequest->final_delivery_method === 'pickup')

                    @if($letterRequest->pickup_status === 'SUDAH DIAMBIL')

                        <div class="bg-sky-50 border border-sky-200 rounded-2xl p-6">

                            <div class="flex gap-4">

                                <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">

                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M5 13l4 4L19 7"/>
                                    </svg>

                                </div>

                                <div>
                                    <h2 class="font-bold text-xl text-sky-800">
                                        Surat Sudah Diambil
                                    </h2>

                                    <p class="text-sky-700 mt-2">
                                        Surat Anda telah diambil dari Balai Desa.
                                    </p>
                                </div>

                            </div>

                        </div>

                    @else

                        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6">

                            <div class="flex gap-4">

                                <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">

                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M3 21h18M5 21V9l7-5 7 5v12"/>
                                    </svg>

                                </div>

                                <div class="flex-1">

                                    <h2 class="font-bold text-xl text-blue-800">
                                        Surat Siap Diambil
                                    </h2>

                                    <p class="text-blue-700 mt-2">
                                        Surat Anda telah selesai dan siap diambil di Balai Desa.
                                    </p>

                                    <div class="bg-white border border-blue-200 rounded-xl p-4 mt-4">

                                        <p class="font-semibold text-slate-800">
                                            Jangan lupa membawa identitas.
                                        </p>

                                        <p class="text-sm text-slate-500 mt-1">
                                            Surat mungkin memerlukan tanda tangan atau stempel basah saat pengambilan.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif

                @endif

            @endif

        </div>

        {{-- SIDEBAR STATUS --}}
        <div class="space-y-5">

            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden sticky top-24">

                <div class="px-6 py-5 border-b border-slate-200">

                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Status
                    </p>

                    <h2 class="font-bold text-slate-800 mt-1">
                        Status Permohonan
                    </h2>

                </div>

                <div class="p-6">

                    {{-- STATUS BADGE --}}
                    <div>

                        @if($status === 'MENUNGGU VERIFIKASI')

                            <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1.5 rounded-full text-sm font-semibold">
                                <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                Menunggu Verifikasi
                            </span>

                        @elseif($status === 'DIPROSES')

                            <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-200 px-3 py-1.5 rounded-full text-sm font-semibold">
                                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                Diproses
                            </span>

                        @elseif($status === 'PERLU PERBAIKAN')

                            <span class="inline-flex items-center gap-2 bg-orange-50 text-orange-700 border border-orange-200 px-3 py-1.5 rounded-full text-sm font-semibold">
                                <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                                Perlu Perbaikan
                            </span>

                        @elseif($status === 'DITOLAK')

                            <span class="inline-flex items-center gap-2 bg-red-50 text-red-700 border border-red-200 px-3 py-1.5 rounded-full text-sm font-semibold">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                Ditolak
                            </span>

                        @elseif($status === 'SELESAI')

                            <span class="inline-flex items-center gap-2 bg-sky-50 text-sky-700 border border-sky-200 px-3 py-1.5 rounded-full text-sm font-semibold">
                                <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
                                Selesai
                            </span>

                        @else

                            <span class="inline-flex bg-slate-100 text-slate-600 px-3 py-1.5 rounded-full text-sm font-semibold">
                                {{ $letterRequest->status }}
                            </span>

                        @endif

                    </div>

                    {{-- DESKRIPSI STATUS --}}
                    <div class="border-t border-slate-200 mt-6 pt-5">

                        @if($status === 'MENUNGGU VERIFIKASI')

                            <p class="font-semibold text-slate-700 text-sm">
                                Menunggu pemeriksaan
                            </p>

                            <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                Permohonan telah dikirim dan sedang menunggu pemeriksaan admin desa.
                            </p>

                        @elseif($status === 'DIPROSES')

                            <p class="font-semibold text-blue-700 text-sm">
                                Sedang diproses
                            </p>

                            <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                Permohonan sudah diverifikasi dan sedang diproses oleh admin desa.
                            </p>

                        @elseif($status === 'PERLU PERBAIKAN')

                            <p class="font-semibold text-orange-700 text-sm">
                                Perbaikan diperlukan
                            </p>

                            <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                Ada data atau dokumen yang perlu diperbaiki. Lihat catatan admin.
                            </p>

                        @elseif($status === 'DITOLAK')

                            <p class="font-semibold text-red-700 text-sm">
                                Permohonan ditolak
                            </p>

                            <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                Permohonan tidak dapat diproses. Lihat alasan penolakan dari admin.
                            </p>

                        @elseif($status === 'SELESAI')

                            @if($letterRequest->final_delivery_method === 'pdf')

                                <p class="font-semibold text-sky-700 text-sm">
                                    Surat selesai
                                </p>

                                <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                    Surat telah selesai dan dapat diunduh dalam bentuk PDF.
                                </p>

                            @elseif($letterRequest->final_delivery_method === 'pickup')

                                @if($letterRequest->pickup_status === 'SUDAH DIAMBIL')

                                    <p class="font-semibold text-sky-700 text-sm">
                                        Surat sudah diambil
                                    </p>

                                    <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                        Surat telah selesai dan sudah diambil.
                                    </p>

                                @else

                                    <p class="font-semibold text-blue-700 text-sm">
                                        Siap diambil
                                    </p>

                                    <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                        Surat telah selesai dan siap diambil di Balai Desa.
                                    </p>

                                @endif

                            @else

                                <p class="text-sm text-slate-500">
                                    Permohonan surat telah selesai diproses.
                                </p>

                            @endif

                        @endif

                    </div>

                    {{-- TIMELINE --}}
                    <div class="border-t border-slate-200 mt-6 pt-5">

                        <h3 class="font-bold text-slate-800 text-sm mb-5">
                            Riwayat Waktu
                        </h3>

                        <div class="space-y-5">

                            <div class="flex gap-3">

                                <div class="w-8 h-8 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">

                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M5 13l4 4L19 7"/>
                                    </svg>

                                </div>

                                <div>
                                    <p class="text-xs text-slate-400">
                                        Pengajuan dibuat
                                    </p>

                                    <p class="text-sm font-semibold text-slate-700 mt-1">
                                        {{ $letterRequest->created_at->format('d M Y, H:i') }}
                                    </p>
                                </div>

                            </div>

                            @if($status === 'SELESAI' && $letterRequest->completed_at)

                                <div class="flex gap-3">

                                    <div class="w-8 h-8 rounded-full bg-sky-600 text-white flex items-center justify-center flex-shrink-0">

                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>

                                    </div>

                                    <div>
                                        <p class="text-xs text-slate-400">
                                            Surat selesai
                                        </p>

                                        <p class="text-sm font-semibold text-slate-700 mt-1">
                                            {{ $letterRequest->completed_at->format('d M Y, H:i') }}
                                        </p>
                                    </div>

                                </div>

                            @endif

                            <div class="flex gap-3">

                                <div class="w-8 h-8 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center flex-shrink-0">

                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 8v4l3 2"/>
                                    </svg>

                                </div>

                                <div>
                                    <p class="text-xs text-slate-400">
                                        Terakhir diperbarui
                                    </p>

                                    <p class="text-sm font-semibold text-slate-700 mt-1">
                                        {{ $letterRequest->updated_at->format('d M Y, H:i') }}
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection