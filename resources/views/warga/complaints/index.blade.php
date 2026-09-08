@extends('layouts.warga')

@section('title', 'Pengaduan')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <div>
            <p class="text-sm text-sky-600 font-semibold">Layanan Pengaduan</p>

            <h1 class="text-3xl font-bold text-slate-800 mt-1">
                Pengaduan Saya
            </h1>

            <p class="text-slate-500 mt-1">
                Pantau dan kirim pengaduan kepada pemerintah desa.
            </p>
        </div>

        <a href="{{ route('warga.complaints.create') }}"
           class="inline-flex items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl font-semibold shadow-sm transition">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      d="M12 4v16m8-8H4"/>
            </svg>

            Buat Pengaduan
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
                <p class="font-semibold">Berhasil</p>
                <p class="text-sm mt-1">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    {{-- TABLE --}}
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200">
            <h2 class="font-bold text-lg text-slate-800">
                Riwayat Pengaduan
            </h2>

            <p class="text-sm text-slate-400 mt-1">
                Total {{ $complaints->count() }} pengaduan
            </p>
        </div>

        <div class="overflow-x-auto">
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

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                  d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>
                                        </svg>
                                    </div>

                                    <div>
                                        <p class="font-semibold text-slate-800">
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
                                    <span class="inline-flex items-center gap-2 bg-sky-50 text-sky-700 border border-sky-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
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
                                   class="inline-flex items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">

                                    <span>Detail</span>

                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M9 18l6-6-6-6"/>
                                    </svg>
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">

                                <div class="w-14 h-14 bg-sky-50 text-sky-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                                   class="inline-flex items-center gap-2 mt-5 text-sky-600 font-semibold hover:text-sky-700">
                                    Buat Pengaduan Pertama
                                    <span>→</span>
                                </a>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection