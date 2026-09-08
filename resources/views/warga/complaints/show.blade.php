@extends('layouts.warga')

@section('title', 'Detail Pengaduan')

@section('content')

@php
    $status = strtoupper($complaint->status ?? '');
@endphp

<div class="space-y-6">

    {{-- HEADER --}}
    <div>
        <a href="{{ route('warga.complaints.index') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-sky-600 hover:text-sky-700 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      d="M15 19l-7-7 7-7"/>
            </svg>

            Kembali ke Pengaduan Saya
        </a>

        <div class="mt-5">
            <p class="text-sm font-semibold text-sky-600">
                Layanan Pengaduan
            </p>

            <h1 class="text-3xl font-bold text-slate-800 mt-1">
                Detail Pengaduan
            </h1>

            <p class="text-slate-500 mt-1">
                Lihat detail, status, dan tanggapan dari pemerintah desa.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- KONTEN UTAMA --}}
        <div class="xl:col-span-2 space-y-6">

            {{-- DETAIL PENGADUAN --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 bg-slate-50/50">
                    <div class="flex items-start gap-4">

                        <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>
                            </svg>
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Judul Pengaduan
                            </p>

                            <h2 class="text-xl md:text-2xl font-bold text-slate-800 mt-1">
                                {{ $complaint->title }}
                            </h2>
                        </div>

                    </div>
                </div>

                <div class="p-6">

                    {{-- INFO --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="border border-slate-200 rounded-xl p-4">
                            <div class="flex items-center gap-3">

                                <div class="w-9 h-9 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M4 6h16M4 12h16M4 18h7"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs text-slate-400">
                                        Kategori
                                    </p>

                                    <p class="font-semibold text-slate-700 mt-0.5">
                                        {{ $complaint->category }}
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="border border-slate-200 rounded-xl p-4">
                            <div class="flex items-center gap-3">

                                <div class="w-9 h-9 rounded-lg bg-sky-100 text-sky-600 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14H4V6a1 1 0 011-1z"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs text-slate-400">
                                        Tanggal Pengaduan
                                    </p>

                                    <p class="font-semibold text-slate-700 mt-0.5">
                                        {{ $complaint->created_at->format('d M Y, H:i') }}
                                    </p>
                                </div>

                            </div>
                        </div>

                    </div>

                    {{-- ISI --}}
                    <div class="mt-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-bold text-slate-800">
                                Isi Pengaduan
                            </h3>

                            <span class="text-xs text-slate-400">
                                Detail laporan
                            </span>
                        </div>

                        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5">
                            <p class="text-slate-700 leading-relaxed whitespace-pre-line">
                                {{ $complaint->message }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- LAMPIRAN --}}
            @if($complaint->attachment_path)

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-slate-200">
                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 bg-sky-100 text-sky-600 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.2 7.8l-6.8 6.8a2 2 0 102.8 2.8l7.5-7.5a4 4 0 00-5.7-5.7L5.5 11.7a6 6 0 108.5 8.5l6-6"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="font-bold text-slate-800">
                                    Lampiran Pengaduan
                                </h2>

                                <p class="text-sm text-slate-400 mt-1">
                                    Dokumen atau gambar pendukung yang Anda kirim.
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="p-6">
                        <div class="border border-slate-200 bg-slate-50 rounded-xl p-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-xl bg-white border border-slate-200 text-sky-600 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M7 3h7l5 5v13H7zM14 3v6h6"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="font-semibold text-slate-700">
                                        File Lampiran
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1">
                                        Klik tombol untuk membuka lampiran.
                                    </p>
                                </div>

                            </div>

                            <a href="{{ asset('storage/' . $complaint->attachment_path) }}"
                               target="_blank"
                               class="inline-flex justify-center items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition">

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M14 3h7v7m0-7L10 14M5 7v12h12v-5"/>
                                </svg>

                                Lihat Lampiran
                            </a>

                        </div>
                    </div>

                </div>

            @endif

            {{-- TANGGAPAN ADMIN --}}
            @if($complaint->admin_response)

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-slate-200">
                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="font-bold text-slate-800">
                                    Tanggapan Pemerintah Desa
                                </h2>

                                <p class="text-sm text-slate-400 mt-1">
                                    Informasi tindak lanjut dari admin desa.
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="p-6">
                        <div class="bg-sky-50 border border-sky-200 rounded-2xl p-5">
                            <p class="text-sky-900 leading-relaxed whitespace-pre-line">
                                {{ $complaint->admin_response }}
                            </p>
                        </div>
                    </div>

                </div>

            @endif

        </div>

        {{-- SIDEBAR STATUS --}}
        <div class="space-y-6">

            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Status
                    </p>

                    <h2 class="font-bold text-slate-800 mt-1">
                        Status Pengaduan
                    </h2>
                </div>

                <div class="p-6">

                    @if($status === 'MENUNGGU')

                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>

                            <div>
                                <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 text-sm font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                    Menunggu
                                </span>
                            </div>

                        </div>

                    @elseif($status === 'DIPROSES')

                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M4 4v6h6M20 20v-6h-6M5 19a9 9 0 0014-7M19 5a9 9 0 00-14 7"/>
                                </svg>
                            </div>

                            <div>
                                <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-200 text-sm font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                    Diproses
                                </span>
                            </div>

                        </div>

                    @elseif($status === 'SELESAI')

                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>

                            <div>
                                <span class="inline-flex items-center gap-2 bg-sky-50 text-sky-700 border border-sky-200 text-sm font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
                                    Selesai
                                </span>
                            </div>

                        </div>

                    @else

                        <span class="inline-flex items-center bg-slate-100 text-slate-600 text-sm font-semibold px-3 py-1.5 rounded-full">
                            {{ $complaint->status }}
                        </span>

                    @endif

                    <div class="border-t border-slate-200 mt-6 pt-5">

                        @if($status === 'MENUNGGU')

                            <p class="text-sm font-semibold text-slate-700">
                                Menunggu pemeriksaan
                            </p>

                            <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                Pengaduan telah berhasil dikirim dan sedang menunggu pemeriksaan admin desa.
                            </p>

                        @elseif($status === 'DIPROSES')

                            <p class="text-sm font-semibold text-blue-700">
                                Sedang ditindaklanjuti
                            </p>

                            <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                Pengaduan sedang diperiksa dan ditindaklanjuti oleh pemerintah desa.
                            </p>

                        @elseif($status === 'SELESAI')

                            <p class="text-sm font-semibold text-sky-700">
                                Pengaduan selesai
                            </p>

                            <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                Pengaduan telah selesai ditindaklanjuti oleh pemerintah desa.
                            </p>

                        @endif

                    </div>

                </div>

            </div>

            {{-- ALUR STATUS --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">

                <h3 class="font-bold text-slate-800">
                    Alur Pengaduan
                </h3>

                <p class="text-sm text-slate-400 mt-1">
                    Tahapan penanganan pengaduan.
                </p>

                <div class="mt-6 space-y-1">

                    {{-- MENUNGGU --}}
                    <div class="flex gap-3">

                        <div class="flex flex-col items-center">
                            <div class="w-8 h-8 rounded-full
                                {{ in_array($status, ['MENUNGGU', 'DIPROSES', 'SELESAI'])
                                    ? 'bg-sky-600 text-white'
                                    : 'bg-slate-200 text-slate-400' }}
                                flex items-center justify-center">

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M5 13l4 4L19 7"/>
                                </svg>

                            </div>

                            <div class="w-px h-10
                                {{ in_array($status, ['DIPROSES', 'SELESAI'])
                                    ? 'bg-sky-300'
                                    : 'bg-slate-200' }}">
                            </div>
                        </div>

                        <div class="pt-1">
                            <p class="text-sm font-semibold text-slate-700">
                                Pengaduan Dikirim
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Menunggu pemeriksaan admin
                            </p>
                        </div>

                    </div>

                    {{-- DIPROSES --}}
                    <div class="flex gap-3">

                        <div class="flex flex-col items-center">
                            <div class="w-8 h-8 rounded-full
                                {{ in_array($status, ['DIPROSES', 'SELESAI'])
                                    ? 'bg-sky-600 text-white'
                                    : 'bg-slate-200 text-slate-400' }}
                                flex items-center justify-center">

                                @if(in_array($status, ['DIPROSES', 'SELESAI']))
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M5 13l4 4L19 7"/>
                                    </svg>
                                @else
                                    <span class="w-2 h-2 bg-current rounded-full"></span>
                                @endif

                            </div>

                            <div class="w-px h-10
                                {{ $status === 'SELESAI'
                                    ? 'bg-sky-300'
                                    : 'bg-slate-200' }}">
                            </div>
                        </div>

                        <div class="pt-1">
                            <p class="text-sm font-semibold text-slate-700">
                                Sedang Diproses
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Pemerintah desa menindaklanjuti
                            </p>
                        </div>

                    </div>

                    {{-- SELESAI --}}
                    <div class="flex gap-3">

                        <div class="w-8 h-8 rounded-full
                            {{ $status === 'SELESAI'
                                ? 'bg-sky-600 text-white'
                                : 'bg-slate-200 text-slate-400' }}
                            flex items-center justify-center">

                            @if($status === 'SELESAI')
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            @else
                                <span class="w-2 h-2 bg-current rounded-full"></span>
                            @endif

                        </div>

                        <div class="pt-1">
                            <p class="text-sm font-semibold text-slate-700">
                                Selesai
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Pengaduan telah ditindaklanjuti
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection