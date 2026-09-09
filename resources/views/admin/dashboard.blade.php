<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">

        <div>

            <p class="text-sm font-semibold text-sky-600 mb-1">
                Sistem Informasi Desa Sidorejo
            </p>

            <h1 class="text-3xl font-bold text-slate-800">
                Dashboard Admin
            </h1>

            <p class="text-slate-500 mt-1">
                Selamat datang,
                <span class="font-semibold text-slate-700">
                    {{ auth()->user()->name }}
                </span>
            </p>

        </div>

        <form action="{{ route('logout') }}"
              method="POST">

            @csrf

            <button type="submit"
                    class="inline-flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white px-5 py-2.5 rounded-xl font-semibold transition">

                <svg class="w-4 h-4"
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


    {{-- STATISTIK UTAMA --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

        {{-- TOTAL WARGA --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">

            <div class="flex justify-between items-start">

                <div>

                    <p class="text-slate-500 text-sm">
                        Total Warga
                    </p>

                    <h2 class="text-3xl font-bold mt-2">
                        {{ $stats['total_warga'] }}
                    </h2>

                </div>

                <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zm11 10v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>

                    </svg>

                </div>

            </div>

        </div>


        {{-- MENUNGGU --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">

            <div class="flex justify-between items-start">

                <div>

                    <p class="text-slate-500 text-sm">
                        Menunggu Verifikasi
                    </p>

                    <h2 class="text-3xl font-bold mt-2 text-amber-600">
                        {{ $stats['menunggu'] }}
                    </h2>

                </div>

                <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">

                    <svg class="w-5 h-5"
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
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">

            <div class="flex justify-between items-start">

                <div>

                    <p class="text-slate-500 text-sm">
                        Diproses
                    </p>

                    <h2 class="text-3xl font-bold mt-2 text-blue-600">
                        {{ $stats['diproses'] }}
                    </h2>

                </div>

                <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">

                    <svg class="w-5 h-5"
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
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">

            <div class="flex justify-between items-start">

                <div>

                    <p class="text-slate-500 text-sm">
                        Selesai
                    </p>

                    <h2 class="text-3xl font-bold mt-2 text-emerald-600">
                        {{ $stats['selesai'] }}
                    </h2>

                </div>

                <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">

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

            </div>

        </div>

    </div>


    {{-- STATUS TAMBAHAN --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">

            <p class="text-slate-500 text-sm">
                Perlu Perbaikan
            </p>

            <h2 class="text-2xl font-bold text-orange-600 mt-2">
                {{ $stats['perbaikan'] }}
            </h2>

        </div>


        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">

            <p class="text-slate-500 text-sm">
                Ditolak
            </p>

            <h2 class="text-2xl font-bold text-red-600 mt-2">
                {{ $stats['ditolak'] }}
            </h2>

        </div>


        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">

            <p class="text-slate-500 text-sm">
                Total Pengaduan
            </p>

            <h2 class="text-2xl font-bold text-indigo-600 mt-2">
                {{ $stats['pengaduan'] }}
            </h2>

        </div>

    </div>


    {{-- MENU PELAYANAN --}}
    <div class="mb-8">

        <div class="mb-4">

            <p class="text-xs uppercase tracking-widest font-bold text-slate-400">
                Pelayanan
            </p>

            <h2 class="text-xl font-bold text-slate-800 mt-1">
                Menu Pelayanan
            </h2>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            {{-- PERMOHONAN --}}
            <a href="{{ route('admin.permohonan.index') }}"
               class="group bg-white border border-slate-200 rounded-2xl p-5 hover:border-blue-200 hover:shadow-lg transition">

                <div class="w-11 h-11 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-4">

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

                <h3 class="font-bold text-slate-800 group-hover:text-blue-600 transition">
                    Permohonan Surat
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Verifikasi dan proses pengajuan surat warga.
                </p>

            </a>


            {{-- WARGA --}}
            <a href="{{ route('admin.warga.index') }}"
               class="group bg-white border border-slate-200 rounded-2xl p-5 hover:border-emerald-200 hover:shadow-lg transition">

                <div class="w-11 h-11 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-4">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zm11 10v-2a4 4 0 00-3-3.87"/>

                    </svg>

                </div>

                <h3 class="font-bold text-slate-800 group-hover:text-emerald-600 transition">
                    Data Warga
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Lihat data warga yang terdaftar.
                </p>

            </a>


            {{-- PENGADUAN --}}
            <a href="{{ route('admin.complaints.index') }}"
               class="group bg-white border border-slate-200 rounded-2xl p-5 hover:border-orange-200 hover:shadow-lg transition">

                <div class="w-11 h-11 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center mb-4">

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

                <h3 class="font-bold text-slate-800 group-hover:text-orange-600 transition">
                    Pengaduan
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Tindak lanjuti pengaduan warga.
                </p>

            </a>


            {{-- LAPORAN --}}
            <a href="{{ route('admin.reports.index') }}"
               class="group bg-white border border-slate-200 rounded-2xl p-5 hover:border-indigo-200 hover:shadow-lg transition">

                <div class="w-11 h-11 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mb-4">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M4 19V9m5 10V5m5 14v-7m5 7V3"/>

                    </svg>

                </div>

                <h3 class="font-bold text-slate-800 group-hover:text-indigo-600 transition">
                    Laporan
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Lihat rekap pelayanan administrasi.
                </p>

            </a>

        </div>

    </div>


    {{-- WEBSITE DESA --}}
    <div class="mb-8">

        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3 mb-4">

            <div>

                <p class="text-xs uppercase tracking-widest font-bold text-sky-600">
                    Website Desa
                </p>

                <h2 class="text-xl font-bold text-slate-800 mt-1">
                    Kelola Konten Website
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Kelola konten yang ditampilkan di halaman publik Desa Sidorejo.
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


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            {{-- BERITA --}}
            <a href="{{ route('admin.news.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-2xl p-5 hover:border-sky-300 hover:shadow-lg transition">

                <div class="absolute right-0 top-0 w-24 h-24 bg-sky-50 rounded-bl-full"></div>

                <div class="relative">

                    <div class="w-11 h-11 bg-sky-100 text-sky-600 rounded-xl flex items-center justify-center mb-4">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M4 5h16v14H4zM8 9h8M8 13h8M8 17h5"/>

                        </svg>

                    </div>

                    <div class="flex items-center gap-2">

                        <h3 class="font-bold text-slate-800 group-hover:text-sky-600 transition">
                            Berita
                        </h3>

                        <span class="bg-sky-50 text-sky-600 text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-full">
                            Aktif
                        </span>

                    </div>

                    <p class="text-sm text-slate-500 mt-2">
                        Tambah, edit, publish dan hapus berita desa.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-sky-600 mt-4">

                        Kelola Berita

                        <svg class="w-4 h-4"
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
            @if(Route::has('admin.announcements.index'))

                <a href="{{ route('admin.announcements.index') }}"
                   class="group bg-white border border-slate-200 rounded-2xl p-5 hover:border-orange-300 hover:shadow-lg transition">

                    <div class="w-11 h-11 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center mb-4">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M18 8a6 6 0 00-12 0c0 7-3 7-3 7h18s-3 0-3-7M10 19h4"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-slate-800 group-hover:text-orange-600 transition">
                        Pengumuman
                    </h3>

                    <p class="text-sm text-slate-500 mt-2">
                        Kelola pemberitahuan dan informasi penting desa.
                    </p>

                </a>

            @else

                <div class="bg-white border border-dashed border-slate-300 rounded-2xl p-5 opacity-70">

                    <div class="w-11 h-11 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center mb-4">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M18 8a6 6 0 00-12 0c0 7-3 7-3 7h18s-3 0-3-7M10 19h4"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-slate-700">
                        Pengumuman
                    </h3>

                    <p class="text-sm text-slate-400 mt-2">
                        Fitur pengumuman akan tersedia setelah dibuat.
                    </p>

                </div>

            @endif


            {{-- APARATUR --}}
            <a href="{{ route('admin.apparatuses.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-2xl p-5 hover:border-emerald-300 hover:shadow-lg transition">

                <div class="absolute right-0 top-0 w-24 h-24 bg-emerald-50 rounded-bl-full"></div>

                <div class="relative">

                    <div class="w-11 h-11 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-4">

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

                    <div class="flex items-center gap-2">

                        <h3 class="font-bold text-slate-800 group-hover:text-emerald-600 transition">
                            Aparatur Desa
                        </h3>

                        <span class="bg-emerald-50 text-emerald-600 text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-full">
                            Aktif
                        </span>

                    </div>

                    <p class="text-sm text-slate-500 mt-2">
                        Kelola nama, jabatan, foto dan urutan aparatur.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-emerald-600 mt-4">

                        Kelola Aparatur

                        <svg class="w-4 h-4"
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
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-2xl p-5 hover:border-indigo-300 hover:shadow-lg transition">

                <div class="absolute right-0 top-0 w-24 h-24 bg-indigo-50 rounded-bl-full"></div>

                <div class="relative">

                    <div class="w-11 h-11 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mb-4">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M4 5h16v14H4zM8 14l3-3 2 2 3-4 4 5"/>

                        </svg>

                    </div>

                    <div class="flex items-center gap-2">

                        <h3 class="font-bold text-slate-800 group-hover:text-indigo-600 transition">
                            Galeri Desa
                        </h3>

                        <span class="bg-indigo-50 text-indigo-600 text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-full">
                            Aktif
                        </span>

                    </div>

                    <p class="text-sm text-slate-500 mt-2">
                        Kelola dokumentasi foto kegiatan desa.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-indigo-600 mt-4">

                        Kelola Galeri

                        <svg class="w-4 h-4"
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


            {{-- POTENSI DESA --}}
            <a href="{{ route('admin.potentials.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-2xl p-5 hover:border-emerald-300 hover:shadow-lg transition">

                <div class="absolute right-0 top-0 w-24 h-24 bg-emerald-50 rounded-bl-full"></div>

                <div class="relative">

                    <div class="w-11 h-11 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-4">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 21V9m0 0C9 9 6 7 6 4c3 0 6 2 6 5zm0 0c3 0 6-2 6-5-3 0-6 2-6 5z"/>

                        </svg>

                    </div>

                    <div class="flex items-center gap-2">

                        <h3 class="font-bold text-slate-800 group-hover:text-emerald-600 transition">
                            Potensi Desa
                        </h3>

                        <span class="bg-emerald-50 text-emerald-600 text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-full">
                            Aktif
                        </span>

                    </div>

                    <p class="text-sm text-slate-500 mt-2">
                        Kelola potensi seperti pertanian, UMKM, perdagangan dan peternakan.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-emerald-600 mt-4">

                        Kelola Potensi

                        <svg class="w-4 h-4"
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


            {{-- PROFIL DESA --}}
            <a href="{{ route('admin.village-profile.edit') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-2xl p-5 hover:border-cyan-300 hover:shadow-lg transition">

                <div class="absolute right-0 top-0 w-24 h-24 bg-cyan-50 rounded-bl-full"></div>

                <div class="relative">

                    <div class="w-11 h-11 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center mb-4">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/>

                        </svg>

                    </div>

                    <div class="flex items-center gap-2">

                        <h3 class="font-bold text-slate-800 group-hover:text-cyan-600 transition">
                            Profil Desa
                        </h3>

                        <span class="bg-cyan-50 text-cyan-600 text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-full">
                            Aktif
                        </span>

                    </div>

                    <p class="text-sm text-slate-500 mt-2">
                        Kelola profil, visi, misi, foto dan statistik desa.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-cyan-600 mt-4">

                        Kelola Profil

                        <svg class="w-4 h-4"
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

    </div>


    {{-- DATA TERBARU --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- PERMOHONAN TERBARU --}}
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

            <div class="p-5 border-b border-slate-200 flex justify-between items-center">

                <div>

                    <h2 class="font-bold text-lg text-slate-800">
                        Permohonan Terbaru
                    </h2>

                    <p class="text-xs text-slate-400 mt-1">
                        Pengajuan surat terbaru warga
                    </p>

                </div>

                <a href="{{ route('admin.permohonan.index') }}"
                   class="text-sm text-blue-600 hover:text-blue-700 font-semibold">
                    Lihat Semua
                </a>

            </div>

            <div class="divide-y divide-slate-100">

                @forelse($latestRequests as $request)

                    <a href="{{ route('admin.permohonan.show', $request) }}"
                       class="block p-5 hover:bg-slate-50 transition">

                        <div class="flex justify-between gap-4">

                            <div class="min-w-0">

                                <p class="font-semibold text-slate-800">
                                    {{ $request->user->name ?? '-' }}
                                </p>

                                <p class="text-sm text-slate-500 mt-1">
                                    {{ $request->letterType->name ?? '-' }}
                                </p>

                                <p class="text-xs text-slate-400 mt-2">
                                    {{ $request->created_at->format('d-m-Y H:i') }}
                                </p>

                            </div>

                            <div class="flex-shrink-0">

                                @if($request->status === 'MENUNGGU VERIFIKASI')

                                    <span class="bg-amber-100 text-amber-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Menunggu
                                    </span>

                                @elseif($request->status === 'DIPROSES')

                                    <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Diproses
                                    </span>

                                @elseif($request->status === 'SELESAI')

                                    <span class="bg-emerald-100 text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Selesai
                                    </span>

                                @elseif($request->status === 'DITOLAK')

                                    <span class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Ditolak
                                    </span>

                                @else

                                    <span class="bg-orange-100 text-orange-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        {{ $request->status }}
                                    </span>

                                @endif

                            </div>

                        </div>

                    </a>

                @empty

                    <div class="p-10 text-center text-slate-400">
                        Belum ada permohonan.
                    </div>

                @endforelse

            </div>

        </div>


        {{-- PENGADUAN TERBARU --}}
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

            <div class="p-5 border-b border-slate-200 flex justify-between items-center">

                <div>

                    <h2 class="font-bold text-lg text-slate-800">
                        Pengaduan Terbaru
                    </h2>

                    <p class="text-xs text-slate-400 mt-1">
                        Pengaduan terbaru dari warga
                    </p>

                </div>

                <a href="{{ route('admin.complaints.index') }}"
                   class="text-sm text-orange-600 hover:text-orange-700 font-semibold">
                    Lihat Semua
                </a>

            </div>

            <div class="divide-y divide-slate-100">

                @forelse($latestComplaints as $complaint)

                    <a href="{{ route('admin.complaints.show', $complaint) }}"
                       class="block p-5 hover:bg-slate-50 transition">

                        <div class="flex justify-between gap-4">

                            <div class="min-w-0">

                                <p class="font-semibold text-slate-800">
                                    {{ $complaint->title }}
                                </p>

                                <p class="text-sm text-slate-500 mt-1">
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

                                    <span class="bg-amber-100 text-amber-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Menunggu
                                    </span>

                                @elseif($complaint->status === 'DIPROSES')

                                    <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Diproses
                                    </span>

                                @elseif($complaint->status === 'SELESAI')

                                    <span class="bg-emerald-100 text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Selesai
                                    </span>

                                @endif

                            </div>

                        </div>

                    </a>

                @empty

                    <div class="p-10 text-center text-slate-400">
                        Belum ada pengaduan.
                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

</body>
</html>