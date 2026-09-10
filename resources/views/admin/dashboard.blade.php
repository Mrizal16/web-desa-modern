<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-6 sm:py-8 px-4 sm:px-6">

    {{-- HERO --}}
    <section class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-sky-600 via-blue-600 to-indigo-700 text-white shadow-xl shadow-blue-100 mb-8">

        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-24 -right-20 w-72 h-72 bg-white/10 rounded-full"></div>
            <div class="absolute -bottom-28 left-1/3 w-80 h-80 bg-white/10 rounded-full"></div>
            <div class="absolute top-10 right-1/3 w-20 h-20 border border-white/10 rounded-3xl rotate-12"></div>
        </div>

        <div class="relative p-6 sm:p-8 lg:p-10">

            <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-8">

                <div class="max-w-3xl">

                    <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-blue-100">

                        <span class="w-2 h-2 rounded-full bg-emerald-300"></span>

                        Sistem Informasi Desa Sidorejo

                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight mt-5">
                        Dashboard Admin
                    </h1>

                    <p class="text-blue-100 mt-3 text-base sm:text-lg">
                        Selamat datang,
                        <span class="font-bold text-white">
                            {{ auth()->user()->name }}
                        </span>
                    </p>

                    <p class="text-blue-100/90 mt-3 max-w-2xl leading-relaxed">
                        Pantau pelayanan warga, kelola konten website, dan akses seluruh kebutuhan administrasi desa dari satu halaman.
                    </p>

                </div>

                <div class="flex flex-col sm:flex-row xl:flex-col gap-3 xl:min-w-[220px]">

                    <a href="{{ route('home') }}"
                       target="_blank"
                       class="inline-flex items-center justify-center gap-2 bg-white text-blue-700 hover:bg-blue-50 px-5 py-3.5 rounded-2xl font-bold transition shadow-sm">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M14 3h7v7m0-7L10 14M5 7v12h12v-5"/>

                        </svg>

                        Lihat Website

                    </a>

                    <form action="{{ route('logout') }}"
                          method="POST"
                          class="w-full">

                        @csrf

                        <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 border border-white/20 text-white px-5 py-3.5 rounded-2xl font-semibold transition">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/>

                            </svg>

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>


    {{-- RINGKASAN --}}
    <section class="mb-8">

        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3 mb-4">

            <div>

                <p class="text-xs uppercase tracking-[0.18em] font-bold text-sky-600">
                    Ringkasan
                </p>

                <h2 class="text-xl sm:text-2xl font-bold text-slate-900 mt-1">
                    Statistik Pelayanan
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Ringkasan data utama yang sedang berjalan di sistem.
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

            {{-- TOTAL WARGA --}}
            <div class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 shadow-sm hover:shadow-lg transition">

                <div class="absolute inset-x-0 top-0 h-1 bg-emerald-500"></div>

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Total Warga
                        </p>

                        <h3 class="text-3xl font-black text-slate-900 mt-2">
                            {{ $stats['total_warga'] }}
                        </h3>

                        <p class="text-xs text-slate-400 mt-2">
                            Warga terdaftar
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zm11 10v-2a4 4 0 00-3-3.87"/>

                        </svg>

                    </div>

                </div>

            </div>


            {{-- MENUNGGU --}}
            <div class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 shadow-sm hover:shadow-lg transition">

                <div class="absolute inset-x-0 top-0 h-1 bg-amber-500"></div>

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Menunggu Verifikasi
                        </p>

                        <h3 class="text-3xl font-black text-amber-600 mt-2">
                            {{ $stats['menunggu'] }}
                        </h3>

                        <p class="text-xs text-slate-400 mt-2">
                            Perlu ditinjau
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center">

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

                </div>

            </div>


            {{-- DIPROSES --}}
            <div class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 shadow-sm hover:shadow-lg transition">

                <div class="absolute inset-x-0 top-0 h-1 bg-blue-500"></div>

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Sedang Diproses
                        </p>

                        <h3 class="text-3xl font-black text-blue-600 mt-2">
                            {{ $stats['diproses'] }}
                        </h3>

                        <p class="text-xs text-slate-400 mt-2">
                            Dalam pengerjaan
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">

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

                </div>

            </div>


            {{-- SELESAI --}}
            <div class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 shadow-sm hover:shadow-lg transition">

                <div class="absolute inset-x-0 top-0 h-1 bg-indigo-500"></div>

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Selesai
                        </p>

                        <h3 class="text-3xl font-black text-emerald-600 mt-2">
                            {{ $stats['selesai'] }}
                        </h3>

                        <p class="text-xs text-slate-400 mt-2">
                            Pelayanan selesai
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">

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

                </div>

            </div>

        </div>


        {{-- STATUS TAMBAHAN --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-5">

            <div class="bg-gradient-to-br from-orange-50 to-white border border-orange-100 rounded-3xl p-5 shadow-sm">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-sm font-semibold text-slate-600">
                            Perlu Perbaikan
                        </p>

                        <h3 class="text-2xl font-black text-orange-600 mt-2">
                            {{ $stats['perbaikan'] }}
                        </h3>

                    </div>

                    <div class="w-11 h-11 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 9v4m0 4h.01"/>

                        </svg>

                    </div>

                </div>

            </div>


            <div class="bg-gradient-to-br from-red-50 to-white border border-red-100 rounded-3xl p-5 shadow-sm">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-sm font-semibold text-slate-600">
                            Ditolak
                        </p>

                        <h3 class="text-2xl font-black text-red-600 mt-2">
                            {{ $stats['ditolak'] }}
                        </h3>

                    </div>

                    <div class="w-11 h-11 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M6 18L18 6M6 6l12 12"/>

                        </svg>

                    </div>

                </div>

            </div>


            <div class="bg-gradient-to-br from-indigo-50 to-white border border-indigo-100 rounded-3xl p-5 shadow-sm">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-sm font-semibold text-slate-600">
                            Total Pengaduan
                        </p>

                        <h3 class="text-2xl font-black text-indigo-600 mt-2">
                            {{ $stats['pengaduan'] }}
                        </h3>

                    </div>

                    <div class="w-11 h-11 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center">

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

                </div>

            </div>

        </div>

    </section>


    {{-- MENU PELAYANAN --}}
    <section class="mb-8">

        <div class="mb-4">

            <p class="text-xs uppercase tracking-[0.18em] font-bold text-slate-400">
                Pelayanan
            </p>

            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 mt-1">
                Akses Cepat Pelayanan
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Menu utama untuk mengelola layanan administrasi warga.
            </p>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <a href="{{ route('admin.permohonan.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-blue-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute -right-8 -top-8 w-28 h-28 rounded-full bg-blue-50"></div>

                <div class="relative">

                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

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

                    <h3 class="font-bold text-slate-900 group-hover:text-blue-600 mt-5 transition">
                        Permohonan Surat
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Verifikasi dan proses pengajuan surat warga.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 mt-5">
                        Kelola Permohonan

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>
                    </span>

                </div>

            </a>


            <a href="{{ route('admin.warga.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-emerald-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute -right-8 -top-8 w-28 h-28 rounded-full bg-emerald-50"></div>

                <div class="relative">

                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zm11 10v-2a4 4 0 00-3-3.87"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-slate-900 group-hover:text-emerald-600 mt-5 transition">
                        Data Warga
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Lihat data warga yang terdaftar dalam sistem.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-emerald-600 mt-5">
                        Kelola Warga

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>
                    </span>

                </div>

            </a>


            <a href="{{ route('admin.complaints.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-orange-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute -right-8 -top-8 w-28 h-28 rounded-full bg-orange-50"></div>

                <div class="relative">

                    <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center">

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

                    <h3 class="font-bold text-slate-900 group-hover:text-orange-600 mt-5 transition">
                        Pengaduan
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Tindak lanjuti laporan dan pengaduan dari warga.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-orange-600 mt-5">
                        Kelola Pengaduan

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>
                    </span>

                </div>

            </a>


            <a href="{{ route('admin.reports.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-indigo-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute -right-8 -top-8 w-28 h-28 rounded-full bg-indigo-50"></div>

                <div class="relative">

                    <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M4 19V9m5 10V5m5 14v-7m5 7V3"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-slate-900 group-hover:text-indigo-600 mt-5 transition">
                        Laporan
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Lihat rekap dan laporan pelayanan administrasi.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-indigo-600 mt-5">
                        Lihat Laporan

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>
                    </span>

                </div>

            </a>

        </div>

    </section>


    {{-- WEBSITE DESA --}}
    <section class="mb-8">

        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-4">

            <div>

                <p class="text-xs uppercase tracking-[0.18em] font-bold text-sky-600">
                    Website Desa
                </p>

                <h2 class="text-xl sm:text-2xl font-bold text-slate-900 mt-1">
                    Kelola Konten Website
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Kelola semua konten yang ditampilkan pada website publik Desa Sidorejo.
                </p>

            </div>

            <a href="{{ route('home') }}"
               target="_blank"
               class="inline-flex items-center gap-2 text-sm font-semibold text-sky-600 hover:text-sky-700">

                Lihat Website

                <svg class="w-4 h-4"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M14 3h7v7m0-7L10 14M5 7v12h12v-5"/>

                </svg>

            </a>

        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">

            {{-- BERITA --}}
            <a href="{{ route('admin.news.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-sky-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute right-0 top-0 w-28 h-28 bg-sky-50 rounded-bl-full"></div>

                <div class="relative">

                    <div class="flex items-start justify-between gap-4">

                        <div class="w-12 h-12 bg-sky-100 text-sky-600 rounded-2xl flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M4 5h16v14H4zM8 9h8M8 13h8M8 17h5"/>

                            </svg>

                        </div>

                        <span class="bg-sky-100/80 text-sky-700 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full">
                            Aktif
                        </span>

                    </div>

                    <h3 class="font-bold text-slate-900 group-hover:text-sky-600 mt-5 transition">
                        Berita
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed min-h-[40px]">
                        Tambah, edit, publish, dan hapus berita desa.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-sky-600 mt-5">
                        Kelola Berita

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>
                    </span>

                </div>

            </a>


            {{-- PENGUMUMAN --}}
            <a href="{{ route('admin.announcements.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-orange-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute right-0 top-0 w-28 h-28 bg-orange-50 rounded-bl-full"></div>

                <div class="relative">

                    <div class="flex items-start justify-between gap-4">

                        <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M18 8a6 6 0 00-12 0c0 7-3 7-3 7h18s-3 0-3-7M10 19h4"/>

                            </svg>

                        </div>

                        <span class="bg-orange-100/80 text-orange-700 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full">
                            Aktif
                        </span>

                    </div>

                    <h3 class="font-bold text-slate-900 group-hover:text-orange-600 mt-5 transition">
                        Pengumuman
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed min-h-[40px]">
                        Kelola pemberitahuan dan informasi penting desa.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-orange-600 mt-5">
                        Kelola Pengumuman

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>
                    </span>

                </div>

            </a>


            {{-- APARATUR --}}
            <a href="{{ route('admin.apparatuses.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-emerald-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute right-0 top-0 w-28 h-28 bg-emerald-50 rounded-bl-full"></div>

                <div class="relative">

                    <div class="flex items-start justify-between gap-4">

                        <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M20 21a8 8 0 10-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>

                            </svg>

                        </div>

                        <span class="bg-emerald-100/80 text-emerald-700 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full">
                            Aktif
                        </span>

                    </div>

                    <h3 class="font-bold text-slate-900 group-hover:text-emerald-600 mt-5 transition">
                        Aparatur Desa
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed min-h-[40px]">
                        Kelola nama, jabatan, foto, dan urutan aparatur desa.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-emerald-600 mt-5">
                        Kelola Aparatur

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>
                    </span>

                </div>

            </a>


            {{-- GALERI --}}
            <a href="{{ route('admin.galleries.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-indigo-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute right-0 top-0 w-28 h-28 bg-indigo-50 rounded-bl-full"></div>

                <div class="relative">

                    <div class="flex items-start justify-between gap-4">

                        <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M4 5h16v14H4zM8 14l3-3 2 2 3-4 4 5"/>

                            </svg>

                        </div>

                        <span class="bg-indigo-100/80 text-indigo-700 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full">
                            Aktif
                        </span>

                    </div>

                    <h3 class="font-bold text-slate-900 group-hover:text-indigo-600 mt-5 transition">
                        Galeri Desa
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed min-h-[40px]">
                        Kelola dokumentasi foto kegiatan desa.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-indigo-600 mt-5">
                        Kelola Galeri

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>
                    </span>

                </div>

            </a>


            {{-- POTENSI --}}
            <a href="{{ route('admin.potentials.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-teal-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute right-0 top-0 w-28 h-28 bg-teal-50 rounded-bl-full"></div>

                <div class="relative">

                    <div class="flex items-start justify-between gap-4">

                        <div class="w-12 h-12 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 21V9m0 0C9 9 6 7 6 4c3 0 6 2 6 5zm0 0c3 0 6-2 6-5-3 0-6 2-6 5z"/>

                            </svg>

                        </div>

                        <span class="bg-teal-100/80 text-teal-700 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full">
                            Aktif
                        </span>

                    </div>

                    <h3 class="font-bold text-slate-900 group-hover:text-teal-600 mt-5 transition">
                        Potensi Desa
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed min-h-[40px]">
                        Kelola data potensi desa yang ditampilkan pada website publik.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-teal-600 mt-5">
                        Kelola Potensi

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>
                    </span>

                </div>

            </a>


            {{-- PROFIL --}}
            <a href="{{ route('admin.village-profile.edit') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-cyan-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute right-0 top-0 w-28 h-28 bg-cyan-50 rounded-bl-full"></div>

                <div class="relative">

                    <div class="flex items-start justify-between gap-4">

                        <div class="w-12 h-12 bg-cyan-100 text-cyan-600 rounded-2xl flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/>

                            </svg>

                        </div>

                        <span class="bg-cyan-100/80 text-cyan-700 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full">
                            Aktif
                        </span>

                    </div>

                    <h3 class="font-bold text-slate-900 group-hover:text-cyan-600 mt-5 transition">
                        Profil Desa
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed min-h-[40px]">
                        Kelola profil, visi, misi, foto, dan statistik desa.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-cyan-600 mt-5">
                        Kelola Profil

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>
                    </span>

                </div>

            </a>

        </div>

    </section>


    {{-- DATA TERBARU --}}
    <section>

        <div class="mb-4">

            <p class="text-xs uppercase tracking-[0.18em] font-bold text-slate-400">
                Aktivitas Terbaru
            </p>

            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 mt-1">
                Data Terbaru
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Pantau pengajuan dan pengaduan terbaru dari warga.
            </p>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- PERMOHONAN TERBARU --}}
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                <div class="p-5 sm:p-6 border-b border-slate-200 bg-gradient-to-r from-white to-blue-50/40 flex items-center justify-between gap-4">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">

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

                            <h3 class="font-bold text-lg text-slate-900">
                                Permohonan Terbaru
                            </h3>

                            <p class="text-xs text-slate-400 mt-1">
                                Pengajuan surat terbaru warga
                            </p>

                        </div>

                    </div>

                    <a href="{{ route('admin.permohonan.index') }}"
                       class="text-sm text-blue-600 hover:text-blue-700 font-semibold whitespace-nowrap">
                        Lihat Semua
                    </a>

                </div>

                <div class="divide-y divide-slate-100">

                    @forelse($latestRequests as $request)

                        <a href="{{ route('admin.permohonan.show', $request) }}"
                           class="block p-5 hover:bg-blue-50/40 transition">

                            <div class="flex items-start justify-between gap-4">

                                <div class="min-w-0">

                                    <p class="font-semibold text-slate-900 truncate">
                                        {{ $request->user->name ?? '-' }}
                                    </p>

                                    <p class="text-sm text-slate-500 mt-1 truncate">
                                        {{ $request->letterType->name ?? '-' }}
                                    </p>

                                    <p class="text-xs text-slate-400 mt-2">
                                        {{ $request->created_at->format('d-m-Y H:i') }}
                                    </p>

                                </div>

                                <div class="flex-shrink-0">

                                    @if($request->status === 'MENUNGGU VERIFIKASI')

                                        <span class="inline-flex bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                            Menunggu
                                        </span>

                                    @elseif($request->status === 'DIPROSES')

                                        <span class="inline-flex bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                            Diproses
                                        </span>

                                    @elseif($request->status === 'SELESAI')

                                        <span class="inline-flex bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                            Selesai
                                        </span>

                                    @elseif($request->status === 'DITOLAK')

                                        <span class="inline-flex bg-red-50 text-red-700 border border-red-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                            Ditolak
                                        </span>

                                    @else

                                        <span class="inline-flex bg-orange-50 text-orange-700 border border-orange-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                            {{ $request->status }}
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </a>

                    @empty

                        <div class="px-6 py-12 text-center">

                            <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">

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

                            <p class="font-semibold text-slate-600 mt-3">
                                Belum ada permohonan
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>


            {{-- PENGADUAN TERBARU --}}
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                <div class="p-5 sm:p-6 border-b border-slate-200 bg-gradient-to-r from-white to-orange-50/40 flex items-center justify-between gap-4">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center">

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

                        <div>

                            <h3 class="font-bold text-lg text-slate-900">
                                Pengaduan Terbaru
                            </h3>

                            <p class="text-xs text-slate-400 mt-1">
                                Pengaduan terbaru dari warga
                            </p>

                        </div>

                    </div>

                    <a href="{{ route('admin.complaints.index') }}"
                       class="text-sm text-orange-600 hover:text-orange-700 font-semibold whitespace-nowrap">
                        Lihat Semua
                    </a>

                </div>

                <div class="divide-y divide-slate-100">

                    @forelse($latestComplaints as $complaint)

                        <a href="{{ route('admin.complaints.show', $complaint) }}"
                           class="block p-5 hover:bg-orange-50/40 transition">

                            <div class="flex items-start justify-between gap-4">

                                <div class="min-w-0">

                                    <p class="font-semibold text-slate-900 truncate">
                                        {{ $complaint->title }}
                                    </p>

                                    <p class="text-sm text-slate-500 mt-1 truncate">
                                        {{ $complaint->user->name ?? '-' }}
                                        ·
                                        {{ $complaint->category }}
                                    </p>

                                    <p class="text-xs text-slate-400 mt-2">
                                        {{ $complaint->created_at->format('d-m-Y H:i') }}
                                    </p>

                                </div>

                                <div class="flex-shrink-0">

                                    @if($complaint->status === 'MENUNGGU')

                                        <span class="inline-flex bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                            Menunggu
                                        </span>

                                    @elseif($complaint->status === 'DIPROSES')

                                        <span class="inline-flex bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                            Diproses
                                        </span>

                                    @elseif($complaint->status === 'SELESAI')

                                        <span class="inline-flex bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                            Selesai
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </a>

                    @empty

                        <div class="px-6 py-12 text-center">

                            <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">

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

                            <p class="font-semibold text-slate-600 mt-3">
                                Belum ada pengaduan
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </section>

</div>

</body>

</html>
