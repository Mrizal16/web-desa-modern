@extends('layouts.warga')

@section('title', 'Surat Saya')

@section('content')

<div class="space-y-8">

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 rounded-[2rem] p-6 sm:p-8 text-white shadow-xl shadow-blue-100">

        <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-24 left-1/3 w-72 h-72 bg-white/10 rounded-full"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div class="max-w-2xl">

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-blue-100">
                    Administrasi Surat
                </div>

                <h1 class="text-3xl sm:text-4xl font-black tracking-tight mt-4">
                    Surat Saya
                </h1>

                <p class="text-blue-100 mt-3 leading-relaxed">
                    Pantau seluruh riwayat, status, dan perkembangan permohonan surat Anda dari satu halaman.
                </p>

            </div>

            <a href="{{ route('warga.letters.create') }}"
               class="inline-flex items-center justify-center gap-2 bg-white text-blue-700 hover:bg-blue-50 px-5 py-3.5 rounded-2xl font-bold transition shadow-sm">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 4v16m8-8H4"/>

                </svg>

                Ajukan Surat

            </a>

        </div>

    </section>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 rounded-2xl">

            <div class="w-9 h-9 bg-emerald-100 rounded-xl flex items-center justify-center flex-shrink-0">

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


    {{-- RIWAYAT --}}
    <section class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

        <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-sky-50/40">

            <div>

                <p class="text-xs uppercase tracking-[0.18em] font-bold text-sky-600">
                    Riwayat
                </p>

                <h2 class="font-bold text-xl text-slate-900 mt-1">
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

                    <svg class="w-7 h-7"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
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
                   class="inline-flex items-center justify-center mt-5 bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl text-sm font-semibold transition">

                    Ajukan Surat Pertama

                </a>

            </div>

        @else

            {{-- DESKTOP TABLE --}}
            <div class="hidden md:block overflow-x-auto">

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

                            <tr class="hover:bg-sky-50/30 transition">

                                {{-- NOMOR --}}
                                <td class="px-6 py-4">

                                    <p class="font-semibold text-sm text-slate-900">
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

                                            <p class="font-semibold text-slate-800">
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

                                        <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                            <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
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
                                       class="inline-flex items-center justify-center bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">

                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- MOBILE CARDS --}}
            <div class="md:hidden divide-y divide-slate-100">

                @foreach($letterRequests as $letterRequest)

                    @php
                        $status = strtoupper($letterRequest->status ?? '');
                    @endphp

                    <div class="p-5">

                        <div class="flex items-start gap-3">

                            <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">

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

                            <div class="min-w-0 flex-1">

                                <p class="text-xs font-semibold text-sky-600">
                                    {{ $letterRequest->request_number }}
                                </p>

                                <h3 class="font-semibold text-slate-900 mt-1">
                                    {{ $letterRequest->letterType->name ?? '-' }}
                                </h3>

                                <p class="text-xs text-slate-400 mt-2">
                                    {{ $letterRequest->created_at->format('d M Y, H:i') }}
                                </p>

                                <div class="mt-3">

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

                                        <span class="inline-flex items-center bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                                            {{ $letterRequest->status }}
                                        </span>

                                    @endif

                                </div>

                                <a href="{{ route('warga.letters.show', $letterRequest) }}"
                                   class="inline-flex items-center justify-center mt-4 bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition">

                                    Detail Permohonan

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </section>

</div>

@endsection
