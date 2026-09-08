@extends('layouts.warga')

@section('title', 'Surat Saya')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

        <div>
            <p class="text-sm font-semibold text-sky-600">
                Administrasi Surat
            </p>

            <h1 class="text-3xl font-bold text-slate-800 mt-1">
                Surat Saya
            </h1>

            <p class="text-slate-500 mt-1">
                Pantau seluruh riwayat dan status permohonan surat Anda.
            </p>
        </div>

        <a href="{{ route('warga.letters.create') }}"
           class="inline-flex items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl font-semibold shadow-sm transition">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      d="M12 4v16m8-8H4"/>
            </svg>

            Ajukan Surat
        </a>

    </div>

    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="flex items-start gap-3 bg-sky-50 border border-sky-200 text-sky-700 p-4 rounded-xl">

            <div class="w-8 h-8 bg-sky-100 rounded-lg flex items-center justify-center flex-shrink-0">
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

    {{-- TABLE CARD --}}
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

            <div>
                <h2 class="font-bold text-lg text-slate-800">
                    Riwayat Permohonan
                </h2>

                <p class="text-sm text-slate-400 mt-1">
                    Total {{ $letterRequests->count() }} permohonan surat
                </p>
            </div>

        </div>

        @if($letterRequests->isEmpty())

            {{-- EMPTY STATE --}}
            <div class="px-6 py-16 text-center">

                <div class="w-16 h-16 bg-sky-50 text-sky-500 rounded-2xl flex items-center justify-center mx-auto mb-4">

                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>
                    </svg>

                </div>

                <h3 class="font-bold text-slate-700">
                    Belum ada pengajuan surat
                </h3>

                <p class="text-sm text-slate-400 mt-2">
                    Anda belum pernah mengajukan permohonan surat.
                </p>

                <a href="{{ route('warga.letters.create') }}"
                   class="inline-flex items-center gap-2 mt-5 text-sky-600 font-semibold hover:text-sky-700">

                    Ajukan Surat Pertama

                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M9 18l6-6-6-6"/>
                    </svg>

                </a>

            </div>

        @else

            <div class="overflow-x-auto">

                <table class="w-full min-w-[900px]">

                    <thead class="bg-slate-50 border-b border-slate-200">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Nomor
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Jenis Surat
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Tanggal
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Status
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @foreach($letterRequests as $letterRequest)

                            @php
                                $status = strtoupper($letterRequest->status ?? '');
                            @endphp

                            <tr class="hover:bg-slate-50 transition">

                                {{-- NOMOR --}}
                                <td class="px-6 py-4">

                                    <p class="font-semibold text-sm text-slate-800">
                                        {{ $letterRequest->request_number }}
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1">
                                        Nomor permohonan
                                    </p>

                                </td>

                                {{-- JENIS SURAT --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">

                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                      d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>
                                            </svg>

                                        </div>

                                        <div>
                                            <p class="font-semibold text-slate-700">
                                                {{ $letterRequest->letterType->name ?? '-' }}
                                            </p>

                                            <p class="text-xs text-slate-400 mt-1">
                                                Dokumen administrasi
                                            </p>
                                        </div>

                                    </div>

                                </td>

                                {{-- TANGGAL --}}
                                <td class="px-6 py-4">

                                    <p class="text-sm text-slate-700">
                                        {{ $letterRequest->created_at->format('d M Y') }}
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1">
                                        {{ $letterRequest->created_at->format('H:i') }}
                                    </p>

                                </td>

                                {{-- STATUS --}}
                                <td class="px-6 py-4">

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

                                        <span class="inline-flex items-center gap-2 bg-sky-50 text-sky-700 border border-sky-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                            <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
                                            Selesai
                                        </span>

                                    @else

                                        <span class="inline-flex items-center bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                                            {{ $letterRequest->status }}
                                        </span>

                                    @endif

                                </td>

                                {{-- AKSI --}}
                                <td class="px-6 py-4 text-center">

                                    <a href="{{ route('warga.letters.show', $letterRequest) }}"
                                       class="inline-flex items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">

                                        Detail

                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9 18l6-6-6-6"/>
                                        </svg>

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>

</div>

@endsection