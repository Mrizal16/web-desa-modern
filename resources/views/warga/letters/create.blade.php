@extends('layouts.warga')

@section('title', 'Ajukan Surat')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div>
        <p class="text-sm font-semibold text-sky-600">
            Administrasi Surat
        </p>

        <h1 class="text-3xl font-bold text-slate-800 mt-1">
            Ajukan Surat
        </h1>

        <p class="text-slate-500 mt-1">
            Pilih jenis surat yang ingin Anda ajukan.
        </p>
    </div>

    @if($letterTypes->isEmpty())

        {{-- EMPTY STATE --}}
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm px-6 py-14 text-center">

            <div class="w-16 h-16 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v4m0 4h.01M10.3 3.7L2.7 17a2 2 0 001.7 3h15.2a2 2 0 001.7-3L13.7 3.7a2 2 0 00-3.4 0z"/>
                </svg>
            </div>

            <h2 class="font-bold text-slate-700">
                Belum ada jenis surat
            </h2>

            <p class="text-sm text-slate-400 mt-2">
                Jenis surat yang tersedia akan tampil di halaman ini.
            </p>

        </div>

    @else

        {{-- INFO --}}
        <div class="flex items-start gap-3 bg-sky-50 border border-sky-200 rounded-2xl p-4">

            <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9h.01M11 12h1v4h1m8-4a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>

            <div>
                <p class="font-semibold text-sky-800">
                    Pilih layanan surat
                </p>

                <p class="text-sm text-sky-700 mt-1">
                    Klik salah satu jenis surat di bawah untuk melanjutkan proses pengajuan.
                </p>
            </div>

        </div>

        {{-- CARD SURAT --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">

            @foreach($letterTypes as $letterType)

                <div class="group bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md hover:border-sky-300 transition overflow-hidden">

                    {{-- HEADER CARD --}}
                    <div class="p-6">

                        <div class="flex items-start justify-between gap-4">

                            <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center group-hover:bg-sky-600 group-hover:text-white transition">

                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>
                                </svg>

                            </div>

                            <div class="w-8 h-8 rounded-lg bg-slate-50 text-slate-400 flex items-center justify-center group-hover:bg-sky-50 group-hover:text-sky-600 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 18l6-6-6-6"/>
                                </svg>
                            </div>

                        </div>

                        <div class="mt-5">

                            <h2 class="text-lg font-bold text-slate-800 group-hover:text-sky-700 transition">
                                {{ $letterType->name }}
                            </h2>

                            <p class="text-sm text-slate-500 mt-2 leading-relaxed min-h-[42px]">
                                {{ $letterType->description }}
                            </p>

                        </div>

                        {{-- METODE HASIL --}}
                        <div class="mt-5">

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-3">
                                Metode Penerimaan
                            </p>

                            <div class="flex flex-wrap gap-2">

                                @if($letterType->allow_pdf)

                                    <span class="inline-flex items-center gap-1.5 bg-sky-50 text-sky-700 border border-sky-100 text-xs font-semibold px-3 py-1.5 rounded-full">

                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                  d="M7 3h7l5 5v13H7z"/>
                                        </svg>

                                        PDF
                                    </span>

                                @endif

                                @if($letterType->allow_pickup)

                                    <span class="inline-flex items-center gap-1.5 bg-indigo-50 text-indigo-700 border border-indigo-100 text-xs font-semibold px-3 py-1.5 rounded-full">

                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                  d="M3 21h18M5 21V9l7-5 7 5v12"/>
                                        </svg>

                                        Ambil di Balai Desa
                                    </span>

                                @endif

                                @if(!$letterType->allow_pdf && !$letterType->allow_pickup)

                                    <span class="inline-flex bg-slate-100 text-slate-500 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Metode belum tersedia
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                    {{-- FOOTER --}}
                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-200">

                        <a href="{{ route('warga.letters.form', $letterType) }}"
                           class="w-full inline-flex items-center justify-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl font-semibold transition shadow-sm">

                            Ajukan Surat

                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 18l6-6-6-6"/>
                            </svg>

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection