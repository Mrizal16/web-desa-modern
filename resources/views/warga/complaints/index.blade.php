@extends('layouts.warga')

@section('title', 'Pengaduan')

@section('content')

<div class="space-y-8">

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 rounded-[2rem] p-6 sm:p-8 text-white shadow-xl shadow-blue-100">

        <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-24 left-1/3 w-72 h-72 bg-white/10 rounded-full"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div class="max-w-2xl">

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-blue-100">
                    Layanan Pengaduan
                </div>

                <h1 class="text-3xl sm:text-4xl font-black tracking-tight mt-4">
                    Pengaduan Saya
                </h1>

                <p class="text-blue-100/90 mt-3 leading-relaxed">
                    Pantau status pengaduan dan kirim laporan baru kepada pemerintah desa dengan lebih mudah.
                </p>

            </div>

            <a href="{{ route('warga.complaints.create') }}"
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

                Buat Pengaduan

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


    {{-- CONTENT --}}
    <section class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

        <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-sky-50/40">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div>

                    <p class="text-xs uppercase tracking-[0.18em] font-bold text-blue-1000">
                        Riwayat
                    </p>

                    <h2 class="font-bold text-xl text-slate-900 mt-1">
                        Riwayat Pengaduan
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        Total {{ $complaints->count() }} pengaduan
                    </p>

                </div>

            </div>

        </div>


        {{-- DESKTOP TABLE --}}
        <div class="hidden md:block overflow-x-auto">

            <table class="w-full min-w-[850px]">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Judul
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Kategori
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

                    @forelse($complaints as $complaint)

                        @php
                            $status = strtoupper($complaint->status ?? '');
                        @endphp

                        <tr class="hover:bg-blue-50/30 transition">

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
                                                  d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                                        </svg>

                                    </div>

                                    <div class="min-w-0">

                                        <p class="font-semibold text-slate-900 truncate">
                                            {{ $complaint->title }}
                                        </p>

                                        <p class="text-xs text-slate-400 mt-1">
                                            Pengaduan warga
                                        </p>

                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-4">

                                <span class="inline-flex bg-indigo-50 text-indigo-700 border border-indigo-100 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    {{ $complaint->category }}
                                </span>

                            </td>

                            <td class="px-6 py-4">

                                <p class="text-sm text-slate-700">
                                    {{ $complaint->created_at->format('d M Y') }}
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    {{ $complaint->created_at->format('H:i') }}
                                </p>

                            </td>

                            <td class="px-6 py-4">

                                @if($status === 'MENUNGGU')

                                    <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                        Menunggu
                                    </span>

                                @elseif($status === 'DIPROSES')

                                    <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                        Diproses
                                    </span>

                                @elseif($status === 'SELESAI')

                                    <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                                        Selesai
                                    </span>

                                @else

                                    <span class="inline-flex bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        {{ $complaint->status ?? '-' }}
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4 text-center">

                                <a href="{{ route('warga.complaints.show', $complaint) }}"
                                   class="inline-flex items-center justify-center bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="px-6 py-16 text-center">

                                <div class="w-14 h-14 bg-sky-50 text-blue-1000 rounded-2xl flex items-center justify-center mx-auto mb-4">

                                    <svg class="w-6 h-6"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                                    </svg>

                                </div>

                                <p class="font-semibold text-slate-600">
                                    Belum ada pengaduan
                                </p>

                                <p class="text-sm text-slate-400 mt-1">
                                    Pengaduan yang Anda kirim akan tampil di sini.
                                </p>

                                <a href="{{ route('warga.complaints.create') }}"
                                   class="inline-flex items-center justify-center mt-5 bg-sky-600 hover:bg-sky-700 text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition">
                                    Buat Pengaduan Pertama
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- MOBILE CARDS --}}
        <div class="md:hidden divide-y divide-slate-100">

            @forelse($complaints as $complaint)

                @php
                    $status = strtoupper($complaint->status ?? '');
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
                                      d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                            </svg>

                        </div>

                        <div class="min-w-0 flex-1">

                            <h3 class="font-semibold text-slate-900">
                                {{ $complaint->title }}
                            </h3>

                            <div class="flex flex-wrap gap-2 mt-2">

                                <span class="inline-flex bg-indigo-50 text-indigo-700 border border-indigo-100 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    {{ $complaint->category }}
                                </span>

                                @if($status === 'MENUNGGU')

                                    <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                        Menunggu
                                    </span>

                                @elseif($status === 'DIPROSES')

                                    <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                        Diproses
                                    </span>

                                @elseif($status === 'SELESAI')

                                    <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                                        Selesai
                                    </span>

                                @else

                                    <span class="inline-flex bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        {{ $complaint->status ?? '-' }}
                                    </span>

                                @endif

                            </div>

                            <p class="text-xs text-slate-400 mt-3">
                                {{ $complaint->created_at->format('d M Y, H:i') }}
                            </p>

                            <a href="{{ route('warga.complaints.show', $complaint) }}"
                               class="inline-flex items-center justify-center mt-4 bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition">
                                Detail Pengaduan
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="px-6 py-14 text-center">

                    <div class="w-14 h-14 bg-sky-50 text-blue-1000 rounded-2xl flex items-center justify-center mx-auto mb-4">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                        </svg>

                    </div>

                    <p class="font-semibold text-slate-600">
                        Belum ada pengaduan
                    </p>

                    <p class="text-sm text-slate-400 mt-1">
                        Pengaduan yang Anda kirim akan tampil di sini.
                    </p>

                    <a href="{{ route('warga.complaints.create') }}"
                       class="inline-flex items-center justify-center mt-5 bg-sky-600 hover:bg-sky-700 text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition">
                        Buat Pengaduan Pertama
                    </a>

                </div>

            @endforelse

        </div>

    </section>

</div>

@endsection
