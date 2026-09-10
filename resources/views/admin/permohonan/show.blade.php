<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Permohonan</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">

    @php
        $status = strtoupper($letterRequest->status ?? '');
    @endphp

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-sky-600 via-blue-600 to-indigo-700 rounded-3xl p-6 sm:p-8 mb-8 text-white shadow-lg shadow-blue-100">

        <div class="absolute -top-16 -right-16 w-48 h-48 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-20 left-1/3 w-56 h-56 bg-white/10 rounded-full"></div>

        <div class="relative flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6">

            <div>

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-widest text-blue-100">
                    Pelayanan Administrasi
                </div>

                <h1 class="text-3xl sm:text-4xl font-bold mt-4">
                    Detail Permohonan
                </h1>

                <p class="text-blue-100 mt-2 max-w-2xl">
                    Periksa data, dokumen, dan tindak lanjuti permohonan surat warga.
                </p>

            </div>

            <div class="flex flex-col sm:flex-row gap-3">

                <a href="{{ route('admin.dashboard') }}"
                   class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 border border-white/20 text-white px-5 py-3 rounded-xl font-semibold transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 18l-6-6 6-6"/>

                    </svg>

                    Dashboard

                </a>

                <a href="{{ route('admin.permohonan.index') }}"
                   class="inline-flex items-center justify-center gap-2 bg-white text-blue-700 hover:bg-blue-50 px-5 py-3 rounded-xl font-bold transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16"/>

                    </svg>

                    Daftar Permohonan

                </a>

            </div>

        </div>

    </div>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 rounded-2xl mb-6">

            <div class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
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

    {{-- ERROR --}}
    @if($errors->any())
        <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 p-4 rounded-2xl mb-6">

            <div class="w-9 h-9 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 9v4m0 4h.01"/>
                </svg>
            </div>

            <div>
                <p class="font-semibold">
                    Terjadi kesalahan
                </p>

                <p class="text-sm mt-1">
                    {{ $errors->first() }}
                </p>
            </div>

        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- LEFT CONTENT --}}
        <div class="xl:col-span-2 space-y-6">

            {{-- DATA PERMOHONAN --}}
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                            </svg>

                        </div>

                        <div>
                            <h2 class="font-bold text-lg text-slate-800">
                                Data Permohonan
                            </h2>

                            <p class="text-sm text-slate-400 mt-1">
                                Informasi utama permohonan surat warga.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="p-5 sm:p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- NOMOR --}}
                        <div class="border border-slate-200 rounded-2xl p-4">

                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                                Nomor Permohonan
                            </p>

                            <p class="font-bold text-slate-800 mt-2">
                                {{ $letterRequest->request_number ?? '-' }}
                            </p>

                        </div>

                        {{-- TANGGAL --}}
                        <div class="border border-slate-200 rounded-2xl p-4">

                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                                Tanggal Pengajuan
                            </p>

                            <p class="font-semibold text-slate-800 mt-2">
                                {{ $letterRequest->created_at?->format('d M Y, H:i') ?? '-' }}
                            </p>

                        </div>

                        {{-- JENIS SURAT --}}
                        <div class="border border-slate-200 rounded-2xl p-4">

                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                                Jenis Surat
                            </p>

                            <p class="font-semibold text-slate-800 mt-2">
                                {{ $letterRequest->letterType->name ?? '-' }}
                            </p>

                        </div>

                        {{-- STATUS --}}
                        <div class="border border-slate-200 rounded-2xl p-4">

                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400 mb-2">
                                Status
                            </p>

                            @if($status === 'MENUNGGU VERIFIKASI')

                                <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                    Menunggu Verifikasi
                                </span>

                            @elseif($status === 'DIPROSES')

                                <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                    Diproses
                                </span>

                            @elseif($status === 'PERLU PERBAIKAN')

                                <span class="inline-flex items-center gap-2 bg-orange-50 text-orange-700 border border-orange-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                                    Perlu Perbaikan
                                </span>

                            @elseif($status === 'DITOLAK')

                                <span class="inline-flex items-center gap-2 bg-red-50 text-red-700 border border-red-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                    Ditolak
                                </span>

                            @elseif($status === 'SELESAI')

                                <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                                    Selesai
                                </span>

                            @else

                                <span class="inline-flex bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    {{ $letterRequest->status ?? '-' }}
                                </span>

                            @endif

                        </div>

                        {{-- METODE --}}
                        <div class="border border-slate-200 rounded-2xl p-4">

                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                                Metode Penerimaan
                            </p>

                            <p class="font-semibold text-slate-800 mt-2">

                                @if($letterRequest->delivery_method === 'pdf')
                                    Download PDF
                                @elseif($letterRequest->delivery_method === 'pickup')
                                    Ambil di Balai Desa
                                @else
                                    -
                                @endif

                            </p>

                        </div>

                    </div>

                    {{-- KEPERLUAN --}}
                    <div class="mt-5">

                        <p class="text-sm font-semibold text-slate-700 mb-2">
                            Keperluan
                        </p>

                        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">

                            <p class="text-slate-700 leading-relaxed">
                                {{ $letterRequest->purpose ?? '-' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            {{-- DATA WARGA --}}
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M20 21a8 8 0 10-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>

                            </svg>

                        </div>

                        <div>
                            <h2 class="font-bold text-lg text-slate-800">
                                Data Warga
                            </h2>

                            <p class="text-sm text-slate-400 mt-1">
                                Identitas warga pemohon.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="p-5 sm:p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="border border-slate-200 rounded-2xl p-4">
                            <p class="text-xs text-slate-400">Nama</p>
                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $letterRequest->user->name ?? '-' }}
                            </p>
                        </div>

                        <div class="border border-slate-200 rounded-2xl p-4">
                            <p class="text-xs text-slate-400">Email</p>
                            <p class="font-semibold text-slate-800 mt-1 break-all">
                                {{ $letterRequest->user->email ?? '-' }}
                            </p>
                        </div>

                        <div class="border border-slate-200 rounded-2xl p-4">
                            <p class="text-xs text-slate-400">NIK</p>
                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $letterRequest->user->resident->nik ?? '-' }}
                            </p>
                        </div>

                        <div class="border border-slate-200 rounded-2xl p-4">
                            <p class="text-xs text-slate-400">Nomor KK</p>
                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $letterRequest->user->resident->no_kk ?? '-' }}
                            </p>
                        </div>

                        <div class="border border-slate-200 rounded-2xl p-4">
                            <p class="text-xs text-slate-400">No. HP</p>
                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $letterRequest->user->resident->phone ?? '-' }}
                            </p>
                        </div>

                        <div class="border border-slate-200 rounded-2xl p-4">
                            <p class="text-xs text-slate-400">Alamat</p>
                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $letterRequest->user->resident->address ?? '-' }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            {{-- DOKUMEN --}}
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M15.2 7.8l-6.8 6.8a2 2 0 102.8 2.8l7.5-7.5a4 4 0 00-5.7-5.7L5.5 11.7a6 6 0 108.5 8.5l6-6"/>

                            </svg>

                        </div>

                        <div>
                            <h2 class="font-bold text-lg text-slate-800">
                                Dokumen Persyaratan
                            </h2>

                            <p class="text-sm text-slate-400 mt-1">
                                Periksa dokumen yang diunggah oleh warga.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="p-6 space-y-3">

                    @forelse($letterRequest->documents ?? [] as $document)

                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border border-slate-200 rounded-2xl p-4 hover:border-blue-200 hover:bg-blue-50/40 transition">

                            <div class="flex items-center gap-3 min-w-0">

                                <div class="w-11 h-11 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center flex-shrink-0">

                                    <svg class="w-5 h-5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M7 3h7l5 5v13H7z"/>

                                    </svg>

                                </div>

                                <div class="min-w-0">

                                    <p class="font-semibold text-slate-800">
                                        {{ $document->document_type ?? 'Dokumen' }}
                                    </p>

                                    <p class="text-sm text-slate-400 mt-1 truncate">
                                        {{ $document->file_name ?? 'Dokumen yang diunggah warga' }}
                                    </p>

                                </div>

                            </div>

                            <a href="{{ asset('storage/' . $document->file_path) }}"
                               target="_blank"
                               class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition">

                                <svg class="w-4 h-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M14 3h7v7m0-7L10 14M5 7v12h12v-5"/>

                                </svg>

                                Lihat Dokumen
                            </a>

                        </div>

                    @empty

                        <div class="bg-slate-50 border border-slate-200 rounded-xl p-8 text-center">

                            <p class="text-slate-500">
                                Tidak ada dokumen yang ditemukan.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

        {{-- RIGHT SIDEBAR --}}
        <div class="space-y-6">

            {{-- STATUS CARD --}}
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden xl:sticky xl:top-6">

                <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                    <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                        Status Saat Ini
                    </p>

                    <h2 class="font-bold text-slate-800 mt-1">
                        Progress Permohonan
                    </h2>

                </div>

                <div class="p-5 sm:p-6">

                    @if($status === 'MENUNGGU VERIFIKASI')

                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">

                                <svg class="w-6 h-6"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                </svg>

                            </div>

                            <div>
                                <p class="font-bold text-amber-700">
                                    Menunggu Verifikasi
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Perlu ditinjau admin
                                </p>
                            </div>

                        </div>

                    @elseif($status === 'DIPROSES')

                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">

                                <svg class="w-6 h-6"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M4 4v6h6M20 20v-6h-6M5 19a9 9 0 0014-7M19 5a9 9 0 00-14 7"/>

                                </svg>

                            </div>

                            <div>
                                <p class="font-bold text-blue-700">
                                    Diproses
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Surat sedang diproses
                                </p>
                            </div>

                        </div>

                    @elseif($status === 'PERLU PERBAIKAN')

                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center">

                                <svg class="w-6 h-6"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 9v4m0 4h.01"/>

                                </svg>

                            </div>

                            <div>
                                <p class="font-bold text-orange-700">
                                    Perlu Perbaikan
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Menunggu revisi warga
                                </p>
                            </div>

                        </div>

                    @elseif($status === 'DITOLAK')

                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center">

                                <svg class="w-6 h-6"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M6 18L18 6M6 6l12 12"/>

                                </svg>

                            </div>

                            <div>
                                <p class="font-bold text-red-700">
                                    Ditolak
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Permohonan tidak diproses
                                </p>
                            </div>

                        </div>

                    @elseif($status === 'SELESAI')

                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">

                                <svg class="w-6 h-6"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M5 13l4 4L19 7"/>

                                </svg>

                            </div>

                            <div>
                                <p class="font-bold text-emerald-700">
                                    Selesai
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Permohonan selesai
                                </p>
                            </div>

                        </div>

                    @endif

                    <div class="border-t border-slate-100 mt-5 pt-5">

                        <p class="text-xs text-slate-400">
                            Terakhir diperbarui
                        </p>

                        <p class="text-sm font-semibold text-slate-700 mt-1">
                            {{ $letterRequest->updated_at?->format('d M Y, H:i') ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>

            {{-- AKSI ADMIN --}}
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                    <h2 class="font-bold text-slate-800">
                        Tindakan Admin
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        Kelola proses permohonan surat.
                    </p>

                </div>

                <div class="p-5 sm:p-6">

                    @if($status === 'MENUNGGU VERIFIKASI')

                        {{-- VERIFIKASI --}}
                        <form action="{{ route('admin.permohonan.verify', $letterRequest) }}"
                              method="POST"
                              class="mb-5">

                            @csrf

                            <button type="submit"
                                    onclick="return confirm('Yakin ingin memverifikasi permohonan ini?')"
                                    class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-xl font-semibold transition">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M5 13l4 4L19 7"/>

                                </svg>

                                Verifikasi Permohonan
                            </button>

                        </form>

                        {{-- REVISION --}}
                        <form action="{{ route('admin.permohonan.revision', $letterRequest) }}"
                              method="POST"
                              class="border border-orange-200 bg-orange-50 rounded-xl p-4 mb-4">

                            @csrf

                            <label class="block font-semibold text-orange-800 mb-2">
                                Minta Perbaikan
                            </label>

                            <p class="text-sm text-orange-700 mb-3">
                                Jelaskan data atau dokumen yang harus diperbaiki warga.
                            </p>

                            <textarea name="admin_note"
                                      rows="4"
                                      required
                                      placeholder="Contoh: Foto KTP kurang jelas, silakan upload ulang."
                                      class="w-full resize-none border border-orange-200 bg-white rounded-xl px-4 py-3 text-sm outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100">{{ old('admin_note') }}</textarea>

                            <button type="submit"
                                    onclick="return confirm('Kirim permohonan ini kembali kepada warga?')"
                                    class="w-full mt-3 bg-orange-500 hover:bg-orange-600 text-white px-5 py-3 rounded-xl font-semibold transition">

                                Minta Perbaikan
                            </button>

                        </form>

                        {{-- REJECT --}}
                        <form action="{{ route('admin.permohonan.reject', $letterRequest) }}"
                              method="POST"
                              class="border border-red-200 bg-red-50 rounded-xl p-4">

                            @csrf

                            <label class="block font-semibold text-red-800 mb-2">
                                Tolak Permohonan
                            </label>

                            <p class="text-sm text-red-700 mb-3">
                                Tuliskan alasan permohonan tidak dapat diproses.
                            </p>

                            <textarea name="admin_note"
                                      rows="4"
                                      required
                                      placeholder="Contoh: Data NIK tidak sesuai dengan dokumen."
                                      class="w-full resize-none border border-red-200 bg-white rounded-xl px-4 py-3 text-sm outline-none focus:border-red-400 focus:ring-4 focus:ring-red-100"></textarea>

                            <button type="submit"
                                    onclick="return confirm('Yakin ingin menolak permohonan ini?')"
                                    class="w-full mt-3 bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-xl font-semibold transition">

                                Tolak Permohonan
                            </button>

                        </form>

                    @elseif($status === 'DIPROSES')

                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-5">

                            <p class="font-semibold text-blue-800">
                                Permohonan sudah diverifikasi
                            </p>

                            <p class="text-sm text-blue-700 mt-1">
                                Pilih metode penyerahan setelah surat selesai.
                            </p>

                        </div>

                        <form action="{{ route('admin.permohonan.complete', $letterRequest) }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Metode Penyerahan
                            </label>

                            <select name="final_delivery_method"
                                    id="final_delivery_method"
                                    required
                                    onchange="togglePdf()"
                                    class="w-full border border-slate-300 rounded-xl px-4 py-3 mb-5 outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100">

                                <option value="">
                                    -- Pilih Metode --
                                </option>

                                <option value="pdf">
                                    PDF / Download Online
                                </option>

                                <option value="pickup">
                                    Ambil di Balai Desa
                                </option>

                            </select>

                            <div id="pdf_upload" class="hidden mb-5">

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Upload Surat PDF
                                </label>

                                <div class="border-2 border-dashed border-slate-300 rounded-xl p-4 bg-slate-50">

                                    <input type="file"
                                           name="result_pdf"
                                           accept=".pdf"
                                           class="w-full text-sm">

                                </div>

                                <p class="text-xs text-slate-400 mt-2">
                                    Upload surat yang sudah selesai dan siap diberikan kepada warga.
                                </p>

                            </div>

                            <button type="submit"
                                    onclick="return confirm('Yakin surat ini sudah selesai?')"
                                    class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-xl font-semibold transition">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M5 13l4 4L19 7"/>

                                </svg>

                                Tandai Selesai
                            </button>

                        </form>

                    @elseif($status === 'PERLU PERBAIKAN')

                        <div class="bg-orange-50 border border-orange-200 rounded-xl p-5">

                            <p class="font-semibold text-orange-800">
                                Menunggu perbaikan warga
                            </p>

                            @if($letterRequest->admin_note)

                                <div class="border-t border-orange-200 mt-4 pt-4">

                                    <p class="text-xs uppercase font-semibold text-orange-600">
                                        Catatan
                                    </p>

                                    <p class="text-sm text-orange-800 mt-2">
                                        {{ $letterRequest->admin_note }}
                                    </p>

                                </div>

                            @endif

                        </div>

                    @elseif($status === 'DITOLAK')

                        <div class="bg-red-50 border border-red-200 rounded-xl p-5">

                            <p class="font-semibold text-red-800">
                                Permohonan Ditolak
                            </p>

                            @if($letterRequest->admin_note)

                                <div class="border-t border-red-200 mt-4 pt-4">

                                    <p class="text-xs uppercase font-semibold text-red-600">
                                        Alasan
                                    </p>

                                    <p class="text-sm text-red-800 mt-2">
                                        {{ $letterRequest->admin_note }}
                                    </p>

                                </div>

                            @endif

                        </div>

                    @elseif($status === 'SELESAI')

                        @if($letterRequest->final_delivery_method === 'pdf')

                            <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-5">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                        <svg class="w-5 h-5"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-width="2"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>

                                    <div>
                                        <p class="font-semibold text-emerald-800">
                                            Permohonan Selesai
                                        </p>

                                        <p class="text-sm text-emerald-700 mt-1">
                                            Surat tersedia dalam bentuk PDF.
                                        </p>
                                    </div>

                                </div>

                                @if($letterRequest->result_file_path)

                                    <a href="{{ asset('storage/' . $letterRequest->result_file_path) }}"
                                       target="_blank"
                                       class="w-full inline-flex items-center justify-center gap-2 mt-5 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-3 rounded-xl font-semibold transition">

                                        Lihat PDF Surat
                                    </a>

                                @endif

                            </div>

                        @elseif($letterRequest->final_delivery_method === 'pickup')

                            <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">

                                <p class="font-semibold text-blue-800">
                                    Surat Siap Diambil
                                </p>

                                <p class="text-sm text-blue-700 mt-2">
                                    Status:
                                    <strong>
                                        {{ $letterRequest->pickup_status ?? 'SIAP DIAMBIL' }}
                                    </strong>
                                </p>

                            </div>

                            @if($letterRequest->pickup_status !== 'SUDAH DIAMBIL')

                                <form action="{{ route('admin.permohonan.picked-up', $letterRequest) }}"
                                      method="POST"
                                      class="mt-4">

                                    @csrf

                                    <button type="submit"
                                            onclick="return confirm('Yakin surat sudah diambil warga?')"
                                            class="w-full bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-xl font-semibold transition">

                                        Tandai Sudah Diambil
                                    </button>

                                </form>

                            @else

                                <div class="mt-4 bg-emerald-50 border border-emerald-200 rounded-xl p-4">

                                    <p class="font-semibold text-emerald-700">
                                        Surat sudah diambil oleh warga.
                                    </p>

                                </div>

                            @endif

                        @else

                            <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-5">

                                <p class="font-semibold text-emerald-700">
                                    Permohonan telah selesai.
                                </p>

                            </div>

                        @endif

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    function togglePdf() {
        const method = document.getElementById('final_delivery_method').value;
        const upload = document.getElementById('pdf_upload');

        upload.classList.toggle('hidden', method !== 'pdf');
    }
</script>

</body>
</html>