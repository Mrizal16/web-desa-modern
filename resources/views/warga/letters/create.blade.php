@extends('layouts.warga')

@section('title', 'Ajukan Surat')

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
                    Ajukan Surat
                </h1>

                <p class="text-blue-100 mt-3 leading-relaxed">
                    Pilih jenis surat yang ingin Anda ajukan dan lanjutkan proses administrasi secara online.
                </p>

            </div>

            <div class="inline-flex items-center gap-3 bg-white/10 border border-white/20 rounded-2xl px-4 py-3">

                <div class="w-11 h-11 rounded-xl bg-white/15 flex items-center justify-center">

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

                    <p class="text-xs text-blue-100">
                        Layanan tersedia
                    </p>

                    <p class="font-semibold">
                        {{ $letterTypes->count() }} Jenis Surat
                    </p>

                </div>

            </div>

        </div>

    </section>


    @if($letterTypes->isEmpty())

        {{-- EMPTY STATE --}}
        <div class="bg-white border border-slate-200 rounded-3xl shadow-sm px-6 py-16 text-center">

            <div class="w-16 h-16 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center mx-auto mb-4">

                <svg class="w-7 h-7"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
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

            <div class="w-10 h-10 rounded-xl bg-white text-sky-600 flex items-center justify-center flex-shrink-0">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
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
        <section>

            <div class="mb-4">

                <p class="text-xs uppercase tracking-[0.18em] font-bold text-sky-600">
                    Layanan
                </p>

                <h2 class="text-xl sm:text-2xl font-bold text-slate-900 mt-1">
                    Jenis Surat Tersedia
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Pilih surat sesuai kebutuhan administrasi Anda.
                </p>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">

                @foreach($letterTypes as $letterType)

                    <article class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl shadow-sm hover:shadow-xl hover:border-sky-300 hover:-translate-y-1 transition duration-300">

                        <div class="absolute -right-12 -top-12 w-36 h-36 rounded-full bg-sky-50"></div>

                        <div class="relative p-6">

                            <div class="flex items-start justify-between gap-4">

                                <div class="w-12 h-12 rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center group-hover:bg-sky-600 group-hover:text-white transition">

                                    <svg class="w-6 h-6"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                                    </svg>

                                </div>

                                <span class="inline-flex items-center bg-slate-50 border border-slate-200 text-slate-500 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    Layanan Surat
                                </span>

                            </div>


                            <div class="mt-5">

                                <h2 class="text-lg font-bold text-slate-900 group-hover:text-sky-700 transition">
                                    {{ $letterType->name }}
                                </h2>

                                <p class="text-sm text-slate-500 mt-2 leading-relaxed min-h-[42px]">
                                    {{ $letterType->description }}
                                </p>

                            </div>


                            {{-- METODE HASIL --}}
                            <div class="mt-5 pt-5 border-t border-slate-100">

                                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-3">
                                    Metode Penerimaan
                                </p>

                                <div class="flex flex-wrap gap-2">

                                    @if($letterType->allow_pdf)

                                        <span class="inline-flex items-center gap-1.5 bg-sky-50 text-sky-700 border border-sky-100 text-xs font-semibold px-3 py-1.5 rounded-full">

                                            <svg class="w-3.5 h-3.5"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-width="2"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M7 3h7l5 5v13H7z"/>

                                            </svg>

                                            PDF

                                        </span>

                                    @endif


                                    @if($letterType->allow_pickup)

                                        <span class="inline-flex items-center gap-1.5 bg-indigo-50 text-indigo-700 border border-indigo-100 text-xs font-semibold px-3 py-1.5 rounded-full">

                                            <svg class="w-3.5 h-3.5"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-width="2"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
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
                        <div class="relative px-6 py-4 bg-slate-50 border-t border-slate-200">

                            <a href="{{ route('warga.letters.form', $letterType) }}"
                               class="w-full inline-flex items-center justify-center bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl font-semibold transition shadow-sm">

                                Ajukan Surat

                            </a>

                        </div>

                    </article>

                @endforeach

            </div>

        </section>

    @endif

</div>

@endsection
