<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Desa Sidorejo - Website Resmi Pemerintah Desa</title>

    <meta name="description"
          content="Website resmi Pemerintah Desa Sidorejo. Informasi desa, berita, pengumuman, pelayanan administrasi dan pengaduan warga.">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .hero-pattern {
            background-image:
                radial-gradient(circle at 20% 20%, rgba(255,255,255,.12) 0, transparent 30%),
                radial-gradient(circle at 80% 70%, rgba(255,255,255,.10) 0, transparent 30%);
        }
    </style>
</head>

<body class="bg-white text-slate-800">

{{-- ========================================================= --}}
{{-- TOP BAR --}}
{{-- ========================================================= --}}
<div class="hidden md:block bg-slate-900 text-slate-300 text-sm">

    <div class="max-w-7xl mx-auto px-6 py-2.5 flex items-center justify-between gap-6">

        <div class="flex items-center gap-6">

            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-sky-400"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 2a7 7 0 00-7 7c0 5 7 13 7 13s7-8 7-13a7 7 0 00-7-7z"/>
                    <circle cx="12" cy="9" r="2.5" stroke-width="2"/>
                </svg>

                <span>
                    Kantor Desa Sidorejo
                </span>
            </div>

            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-sky-400"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                </svg>

                <span>
                    desasidorejo@example.com
                </span>
            </div>

        </div>

        <div>
            Senin - Jumat, 08.00 - 15.00 WIB
        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- NAVBAR --}}
{{-- ========================================================= --}}
<header id="navbar"
        class="bg-white/95 backdrop-blur border-b border-slate-200 sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="h-20 flex items-center justify-between">

            {{-- LOGO --}}
            <a href="#beranda"
               class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-sky-500 to-blue-700 text-white flex items-center justify-center shadow-md shadow-sky-100">

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

                <div>

                    <h1 class="font-bold text-lg text-slate-800 leading-tight">
                        Desa Sidorejo
                    </h1>

                    <p class="text-[11px] sm:text-xs text-slate-400 mt-0.5">
                        Website Resmi Pemerintah Desa
                    </p>

                </div>

            </a>


            {{-- DESKTOP MENU --}}
            <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-slate-600">

                <a href="#beranda"
                   class="hover:text-sky-600 transition">
                    Beranda
                </a>

                <a href="#profil"
                   class="hover:text-sky-600 transition">
                    Profil
                </a>

                <a href="#layanan"
                   class="hover:text-sky-600 transition">
                    Layanan
                </a>

                <a href="#berita"
                   class="hover:text-sky-600 transition">
                    Berita
                </a>

                <a href="#pengumuman"
                   class="hover:text-orange-600 transition">
                    Pengumuman
                </a>

                <a href="#potensi"
                   class="hover:text-sky-600 transition">
                    Potensi
                </a>

                <a href="#aparatur"
                   class="hover:text-sky-600 transition">
                    Pemerintahan
                </a>

                <a href="#galeri"
                   class="hover:text-sky-600 transition">
                    Galeri
                </a>

                <a href="#kontak"
                   class="hover:text-sky-600 transition">
                    Kontak
                </a>

            </nav>


            {{-- AUTH DESKTOP --}}
            <div class="hidden lg:flex items-center gap-3">

                @auth

                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition">

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M4 6h7v7H4zM13 6h7v4h-7zM13 12h7v8h-7zM4 15h7v5H4z"/>
                        </svg>

                        Dashboard
                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="text-slate-600 hover:text-sky-600 font-semibold text-sm transition">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="inline-flex items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition">

                        Portal Warga

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M5 12h14M13 6l6 6-6 6"/>
                        </svg>

                    </a>

                @endauth

            </div>


            {{-- MOBILE BUTTON --}}
            <button type="button"
                    onclick="toggleMobileMenu()"
                    class="lg:hidden w-11 h-11 rounded-xl border border-slate-200 text-slate-700 flex items-center justify-center">

                <svg id="menuOpenIcon"
                     class="w-6 h-6"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          d="M4 7h16M4 12h16M4 17h16"/>

                </svg>

                <svg id="menuCloseIcon"
                     class="w-6 h-6 hidden"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          d="M6 6l12 12M18 6L6 18"/>

                </svg>

            </button>

        </div>


        {{-- MOBILE MENU --}}
        <div id="mobileMenu"
             class="hidden lg:hidden border-t border-slate-100 pb-5">

            <nav class="pt-4 space-y-1">

                <a href="#beranda"
                   onclick="closeMobileMenu()"
                   class="block px-4 py-3 rounded-xl text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium">
                    Beranda
                </a>

                <a href="#profil"
                   onclick="closeMobileMenu()"
                   class="block px-4 py-3 rounded-xl text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium">
                    Profil Desa
                </a>

                <a href="#layanan"
                   onclick="closeMobileMenu()"
                   class="block px-4 py-3 rounded-xl text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium">
                    Layanan
                </a>

                <a href="#berita"
                   onclick="closeMobileMenu()"
                   class="block px-4 py-3 rounded-xl text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium">
                    Berita
                </a>

                <a href="#pengumuman"
                   onclick="closeMobileMenu()"
                   class="block px-4 py-3 rounded-xl text-slate-700 hover:bg-orange-50 hover:text-orange-700 font-medium">
                    Pengumuman
                </a>

                <a href="#potensi"
                   onclick="closeMobileMenu()"
                   class="block px-4 py-3 rounded-xl text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium">
                    Potensi Desa
                </a>

                <a href="#aparatur"
                   onclick="closeMobileMenu()"
                   class="block px-4 py-3 rounded-xl text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium">
                    Pemerintahan
                </a>

                <a href="#galeri"
                   onclick="closeMobileMenu()"
                   class="block px-4 py-3 rounded-xl text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium">
                    Galeri
                </a>

                <a href="#kontak"
                   onclick="closeMobileMenu()"
                   class="block px-4 py-3 rounded-xl text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium">
                    Kontak
                </a>

            </nav>

            <div class="grid grid-cols-2 gap-3 mt-4">

                @auth

                    <a href="{{ route('dashboard') }}"
                       class="col-span-2 bg-sky-600 text-white text-center font-semibold px-4 py-3 rounded-xl">
                        Buka Dashboard
                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="border border-slate-200 text-slate-700 text-center font-semibold px-4 py-3 rounded-xl">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="bg-sky-600 text-white text-center font-semibold px-4 py-3 rounded-xl">
                        Daftar
                    </a>

                @endauth

            </div>

        </div>

    </div>

</header>


{{-- ========================================================= --}}
{{-- HERO --}}
{{-- ========================================================= --}}
<section id="beranda"
         class="relative overflow-hidden bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white hero-pattern">

    <div class="absolute -top-20 -right-20 w-72 h-72 bg-white/10 rounded-full"></div>
    <div class="absolute bottom-[-150px] left-[15%] w-96 h-96 bg-white/10 rounded-full"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-20 sm:py-24 lg:py-28">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- LEFT --}}
            <div>

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 backdrop-blur px-4 py-2 rounded-full text-sm font-medium">

                    <span class="w-2 h-2 rounded-full bg-emerald-300"></span>

                    Website Resmi Pemerintah Desa

                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mt-6">
                    Selamat Datang di
                    <span class="text-sky-100">
                        Desa Sidorejo
                    </span>
                </h1>

                <p class="text-base sm:text-lg text-blue-100 leading-relaxed max-w-xl mt-6">
                    Pusat informasi dan pelayanan digital Desa Sidorejo yang transparan,
                    mudah diakses, dan hadir untuk memberikan pelayanan terbaik kepada masyarakat.
                </p>

                <div class="flex flex-col sm:flex-row gap-3 mt-8">

                    <a href="#layanan"
                       class="inline-flex items-center justify-center gap-2 bg-white text-blue-700 hover:bg-blue-50 px-6 py-3.5 rounded-xl font-bold transition">

                        Lihat Layanan

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M5 12h14M13 6l6 6-6 6"/>
                        </svg>

                    </a>

                    <a href="#profil"
                       class="inline-flex items-center justify-center bg-white/10 hover:bg-white/20 border border-white/20 px-6 py-3.5 rounded-xl font-semibold transition">
                        Mengenal Desa
                    </a>

                </div>

            </div>


            {{-- RIGHT --}}
            <div class="lg:flex justify-end">

                <div class="w-full max-w-lg bg-white/10 border border-white/20 backdrop-blur-xl rounded-3xl p-5 sm:p-6">

                    <div class="bg-white rounded-2xl p-5 text-slate-800">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-xs uppercase tracking-wider font-bold text-sky-600">
                                    Portal Warga
                                </p>

                                <h2 class="text-xl font-bold mt-1">
                                    Pelayanan Desa Online
                                </h2>

                                <p class="text-sm text-slate-500 mt-2">
                                    Urus kebutuhan administrasi tanpa harus selalu datang ke kantor desa.
                                </p>

                            </div>

                            <div class="w-14 h-14 rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">

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

                        </div>

                        <div class="grid grid-cols-2 gap-3 mt-5">

                            <div class="bg-slate-50 border border-slate-100 rounded-xl p-4">

                                <div class="text-sky-600">
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

                                <p class="font-semibold text-sm mt-3">
                                    Ajukan Surat
                                </p>

                            </div>

                            <div class="bg-slate-50 border border-slate-100 rounded-xl p-4">

                                <div class="text-indigo-600">
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

                                <p class="font-semibold text-sm mt-3">
                                    Pengaduan
                                </p>

                            </div>

                        </div>

                        @auth

                            <a href="{{ route('dashboard') }}"
                               class="mt-4 w-full inline-flex items-center justify-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl font-semibold transition">

                                Masuk Dashboard

                            </a>

                        @else

                            <a href="{{ route('login') }}"
                               class="mt-4 w-full inline-flex items-center justify-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl font-semibold transition">

                                Masuk Portal Warga

                                <svg class="w-4 h-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M5 12h14M13 6l6 6-6 6"/>
                                </svg>

                            </a>

                            <p class="text-xs text-center text-slate-400 mt-3">
                                Belum punya akun?
                                <a href="{{ route('register') }}"
                                   class="font-bold text-sky-600">
                                    Daftar warga
                                </a>
                            </p>

                        @endauth

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- QUICK SERVICES --}}
{{-- ========================================================= --}}
<section id="layanan"
         class="relative z-10 -mt-8 sm:-mt-10">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="bg-white border border-slate-200 shadow-xl shadow-slate-200/40 rounded-3xl p-5 sm:p-7">

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">

                {{-- SURAT --}}
                @auth

                    @if(auth()->user()->resident)

                        <a href="{{ route('warga.letters.create') }}"
                           class="group border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-sky-300 hover:bg-sky-50 transition">

                    @else

                        <a href="{{ route('dashboard') }}"
                           class="group border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-sky-300 hover:bg-sky-50 transition">

                    @endif

                @else

                    <a href="{{ route('login') }}"
                       class="group border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-sky-300 hover:bg-sky-50 transition">

                @endauth

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

                    <h3 class="font-bold text-slate-800 mt-4">
                        Ajukan Surat
                    </h3>

                    <p class="hidden sm:block text-sm text-slate-500 mt-1">
                        Ajukan administrasi surat secara online.
                    </p>

                </a>


                {{-- COMPLAINT --}}
                @auth

                    @if(auth()->user()->resident)

                        <a href="{{ route('warga.complaints.create') }}"
                           class="group border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-indigo-300 hover:bg-indigo-50 transition">

                    @else

                        <a href="{{ route('dashboard') }}"
                           class="group border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-indigo-300 hover:bg-indigo-50 transition">

                    @endif

                @else

                    <a href="{{ route('login') }}"
                       class="group border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-indigo-300 hover:bg-indigo-50 transition">

                @endauth

                    <div class="w-11 h-11 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">

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

                    <h3 class="font-bold text-slate-800 mt-4">
                        Pengaduan
                    </h3>

                    <p class="hidden sm:block text-sm text-slate-500 mt-1">
                        Sampaikan keluhan dan aspirasi warga.
                    </p>

                </a>


                {{-- STATUS --}}
                @auth

                    @if(auth()->user()->resident)

                        <a href="{{ route('warga.letters.index') }}"
                           class="group border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-emerald-300 hover:bg-emerald-50 transition">

                    @else

                        <a href="{{ route('dashboard') }}"
                           class="group border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-emerald-300 hover:bg-emerald-50 transition">

                    @endif

                @else

                    <a href="{{ route('login') }}"
                       class="group border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-emerald-300 hover:bg-emerald-50 transition">

                @endauth

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

                    <h3 class="font-bold text-slate-800 mt-4">
                        Cek Status
                    </h3>

                    <p class="hidden sm:block text-sm text-slate-500 mt-1">
                        Pantau perkembangan permohonan surat.
                    </p>

                </a>


                {{-- INFO --}}
                <a href="#berita"
                   class="group border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-orange-300 hover:bg-orange-50 transition">

                    <div class="w-11 h-11 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M4 5h16v14H4zM8 9h8M8 13h5"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-slate-800 mt-4">
                        Informasi
                    </h3>

                    <p class="hidden sm:block text-sm text-slate-500 mt-1">
                        Berita dan informasi terbaru desa.
                    </p>

                </a>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- PROFILE --}}
{{-- ========================================================= --}}
<section id="profil"
         class="py-20 sm:py-24">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- IMAGE --}}
            <div class="relative">

                <div class="aspect-[4/3] rounded-3xl overflow-hidden bg-gradient-to-br from-sky-100 to-blue-100">

                    <div class="w-full h-full flex items-center justify-center">

                        <div class="text-center text-sky-700">

                            <svg class="w-20 h-20 mx-auto opacity-60"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="1.5"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/>

                            </svg>

                            <p class="font-bold text-lg mt-4">
                                Foto Desa Sidorejo
                            </p>

                            <p class="text-sm opacity-70 mt-1">
                                Nantinya bisa diganti melalui admin
                            </p>

                        </div>

                    </div>

                </div>

                <div class="absolute -bottom-5 -right-3 sm:right-6 bg-white shadow-xl border border-slate-100 rounded-2xl p-5 max-w-[230px]">

                    <p class="text-xs uppercase tracking-wider font-bold text-sky-600">
                        Komitmen Kami
                    </p>

                    <p class="font-bold text-slate-800 mt-2">
                        Pelayanan Cepat, Transparan & Digital
                    </p>

                </div>

            </div>


            {{-- CONTENT --}}
            <div>

                <p class="text-sm uppercase tracking-widest font-bold text-sky-600">
                    Tentang Desa
                </p>

                <h2 class="text-3xl sm:text-4xl font-bold text-slate-800 leading-tight mt-3">
                    Mengenal Lebih Dekat
                    <span class="text-sky-600">
                        Desa Sidorejo
                    </span>
                </h2>

                <p class="text-slate-500 leading-relaxed mt-6">
                    Desa Sidorejo merupakan desa yang terus berkembang dengan semangat
                    kebersamaan, pelayanan masyarakat, serta pembangunan yang berkelanjutan.
                    Pemerintah desa berkomitmen menghadirkan pelayanan yang mudah diakses
                    oleh seluruh masyarakat.
                </p>

                <p class="text-slate-500 leading-relaxed mt-4">
                    Melalui website ini, masyarakat dapat memperoleh informasi mengenai
                    kegiatan desa, pelayanan administrasi, berita, pengumuman, potensi desa,
                    serta menyampaikan aspirasi secara digital.
                </p>

                <div class="grid grid-cols-2 gap-4 mt-8">

                    <div class="bg-slate-50 rounded-2xl p-4">

                        <p class="font-bold text-slate-800">
                            Visi Desa
                        </p>

                        <p class="text-sm text-slate-500 mt-2">
                            Mewujudkan desa yang maju, mandiri dan sejahtera.
                        </p>

                    </div>

                    <div class="bg-slate-50 rounded-2xl p-4">

                        <p class="font-bold text-slate-800">
                            Pelayanan
                        </p>

                        <p class="text-sm text-slate-500 mt-2">
                            Memberikan pelayanan publik yang mudah dan transparan.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- STATISTICS --}}
{{-- ========================================================= --}}
<section class="bg-slate-900 py-14">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

            <div class="text-center border border-white/10 rounded-2xl p-5">

                <p class="text-3xl sm:text-4xl font-bold text-white">
                    —
                </p>

                <p class="text-sm text-slate-400 mt-2">
                    Jumlah Penduduk
                </p>

            </div>

            <div class="text-center border border-white/10 rounded-2xl p-5">

                <p class="text-3xl sm:text-4xl font-bold text-white">
                    —
                </p>

                <p class="text-sm text-slate-400 mt-2">
                    Kepala Keluarga
                </p>

            </div>

            <div class="text-center border border-white/10 rounded-2xl p-5">

                <p class="text-3xl sm:text-4xl font-bold text-white">
                    —
                </p>

                <p class="text-sm text-slate-400 mt-2">
                    Dusun
                </p>

            </div>

            <div class="text-center border border-white/10 rounded-2xl p-5">

                <p class="text-3xl sm:text-4xl font-bold text-white">
                    —
                </p>

                <p class="text-sm text-slate-400 mt-2">
                    RT / RW
                </p>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- NEWS --}}
{{-- ========================================================= --}}
<section id="berita"
         class="bg-slate-50 py-20 sm:py-24">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-10">

            <div>

                <p class="text-sm uppercase tracking-widest font-bold text-sky-600">
                    Informasi Desa
                </p>

                <h2 class="text-3xl sm:text-4xl font-bold text-slate-800 mt-2">
                    Berita Terbaru
                </h2>

                <p class="text-slate-500 mt-2">
                    Ikuti perkembangan dan kegiatan terbaru Desa Sidorejo.
                </p>

            </div>

            <a href="{{ route('news.index') }}"
               class="text-sky-600 font-semibold text-sm hover:text-sky-700">
                Lihat Semua Berita
            </a>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($latestNews as $item)

                <article class="group bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                    <a href="{{ route('news.show', $item->slug) }}"
                    class="block">

                        <div class="aspect-[16/10] bg-slate-100 overflow-hidden">

                            @if($item->image)

                                <img src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                            @else

                                <div class="w-full h-full bg-gradient-to-br from-sky-100 to-blue-100 flex items-center justify-center text-sky-400">

                                    <svg class="w-12 h-12"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M4 5h16v14H4zM8 9h8M8 13h5"/>

                                    </svg>

                                </div>

                            @endif

                        </div>

                    </a>


                    <div class="p-5">

                        <div class="flex items-center gap-2 flex-wrap text-xs">

                            <span class="bg-sky-50 text-sky-600 font-semibold px-2.5 py-1 rounded-full">
                                {{ $item->category ?: 'Berita Desa' }}
                            </span>

                            <span class="text-slate-400">
                                {{ ($item->published_at ?? $item->created_at)->format('d M Y') }}
                            </span>

                        </div>


                        <a href="{{ route('news.show', $item->slug) }}">

                            <h3 class="text-lg font-bold text-slate-800 mt-4 leading-snug group-hover:text-sky-600 transition">
                                {{ $item->title }}
                            </h3>

                        </a>


                        <p class="text-sm text-slate-500 leading-relaxed mt-3">

                            @if($item->excerpt)

                                {{ \Illuminate\Support\Str::limit($item->excerpt, 130) }}

                            @else

                                {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 130) }}

                            @endif

                        </p>


                        <a href="{{ route('news.show', $item->slug) }}"
                        class="inline-flex items-center gap-2 text-sm font-semibold text-sky-600 hover:text-sky-700 mt-4">

                            Baca Selengkapnya

                            <svg class="w-4 h-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 12h14M13 6l6 6-6 6"/>

                            </svg>

                        </a>

                    </div>

                </article>

            @empty

                <div class="md:col-span-2 lg:col-span-3">

                    <div class="bg-white border border-slate-200 rounded-2xl py-14 px-6 text-center">

                        <div class="w-14 h-14 bg-sky-50 text-sky-500 rounded-2xl flex items-center justify-center mx-auto">

                            <svg class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 5h16v14H4zM8 9h8M8 13h5"/>

                            </svg>

                        </div>

                        <h3 class="font-bold text-slate-800 mt-4">
                            Belum Ada Berita
                        </h3>

                        <p class="text-sm text-slate-400 mt-2">
                            Berita terbaru Desa Sidorejo akan ditampilkan di bagian ini.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- ANNOUNCEMENT --}}
{{-- ========================================================= --}}
<section id="pengumuman"
         class="py-20">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div>

                <p class="text-sm uppercase tracking-widest font-bold text-orange-600">
                    Informasi Penting
                </p>

                <h2 class="text-3xl font-bold text-slate-800 mt-2">
                    Pengumuman Desa
                </h2>

                <p class="text-slate-500 leading-relaxed mt-4">
                    Informasi pelayanan, kegiatan masyarakat, bantuan sosial dan
                    pemberitahuan penting lainnya.
                </p>

                <a href="{{ route('announcements.index') }}"
                   class="inline-flex items-center gap-2 text-sm font-semibold text-orange-600 hover:text-orange-700 mt-5 transition">

                    Lihat Semua Pengumuman

                    <svg class="w-4 h-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M5 12h14M13 6l6 6-6 6"/>

                    </svg>

                </a>

            </div>

            <div class="lg:col-span-2 space-y-3">

                @forelse($latestAnnouncements as $announcement)

                    <div class="group flex gap-4 bg-white border border-slate-200 rounded-2xl p-5 hover:border-orange-200 hover:shadow-md transition">

                        <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center flex-shrink-0">

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

                        <div class="min-w-0 flex-1">

                            <div class="flex items-center gap-2 flex-wrap">

                                <span class="text-xs font-bold text-orange-600 uppercase tracking-wider">
                                    Pengumuman
                                </span>

                                <span class="text-xs text-slate-400">
                                    {{ ($announcement->published_at ?? $announcement->created_at)->format('d M Y') }}
                                </span>

                            </div>

                            <h3 class="font-bold text-slate-800 mt-1 group-hover:text-orange-600 transition">
                                {{ $announcement->title }}
                            </h3>

                            <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                                {{ \Illuminate\Support\Str::limit($announcement->content, 180) }}
                            </p>

                        </div>

                    </div>

                @empty

                    <div class="bg-white border border-slate-200 rounded-2xl py-12 px-6 text-center">

                        <div class="w-14 h-14 rounded-2xl bg-orange-50 text-orange-500 flex items-center justify-center mx-auto">

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

                        <h3 class="font-bold text-slate-700 mt-4">
                            Belum Ada Pengumuman
                        </h3>

                        <p class="text-sm text-slate-400 mt-1">
                            Pengumuman terbaru Desa Sidorejo akan tampil di bagian ini.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- POTENTIAL --}}
{{-- ========================================================= --}}
<section id="potensi"
         class="bg-slate-50 py-20 sm:py-24">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="text-center max-w-2xl mx-auto">

            <p class="text-sm uppercase tracking-widest font-bold text-emerald-600">
                Keunggulan Wilayah
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold text-slate-800 mt-2">
                Potensi Desa Sidorejo
            </h2>

            <p class="text-slate-500 mt-4">
                Berbagai sektor yang menjadi potensi dan penggerak perekonomian masyarakat.
            </p>

        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mt-10">

            @forelse($potentials as $potential)

                <div class="group bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300">

                    @if($potential->image)

                        <div class="aspect-[16/10] bg-slate-100 overflow-hidden">

                            <img src="{{ asset('storage/' . $potential->image) }}"
                                 alt="{{ $potential->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                        </div>

                    @endif

                    <div class="p-5 sm:p-6">

                        <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">

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

                        <h3 class="font-bold text-slate-800 mt-4">
                            {{ $potential->title }}
                        </h3>

                        @if($potential->description)

                            <p class="hidden sm:block text-sm text-slate-500 mt-2">
                                {{ \Illuminate\Support\Str::limit($potential->description, 120) }}
                            </p>

                        @endif

                    </div>

                </div>

            @empty

                <div class="col-span-2 lg:col-span-4">

                    <div class="bg-white border border-slate-200 rounded-2xl py-14 px-6 text-center">

                        <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center mx-auto">

                            <svg class="w-8 h-8"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="1.5"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 21V9m0 0C9 9 6 7 6 4c3 0 6 2 6 5zm0 0c3 0 6-2 6-5-3 0-6 2-6 5z"/>

                            </svg>

                        </div>

                        <h3 class="font-bold text-slate-800 mt-4">
                            Belum Ada Potensi Desa
                        </h3>

                        <p class="text-sm text-slate-400 mt-2">
                            Potensi unggulan Desa Sidorejo akan ditampilkan di bagian ini.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>
        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- GOVERNMENT --}}
{{-- ========================================================= --}}
<section id="aparatur"
         class="py-20 sm:py-24">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="text-center max-w-2xl mx-auto">

            <p class="text-sm uppercase tracking-widest font-bold text-sky-600">
                Pemerintahan Desa
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold text-slate-800 mt-2">
                Aparatur Desa
            </h2>

            <p class="text-slate-500 mt-4">
                Struktur pemerintahan yang melayani masyarakat Desa Sidorejo.
            </p>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-10">

            @forelse($apparatuses as $apparatus)

                <div class="group bg-white border border-slate-200 rounded-2xl overflow-hidden text-center shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                    <div class="h-56 bg-gradient-to-br from-slate-100 to-slate-200 overflow-hidden flex items-center justify-center">

                        @if($apparatus->photo)

                            <img src="{{ asset('storage/' . $apparatus->photo) }}"
                                 alt="{{ $apparatus->name }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                        @else

                            <div class="w-full h-full flex items-center justify-center">

                                <svg class="w-20 h-20 text-slate-300"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="1.5"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M20 21a8 8 0 10-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>

                                </svg>

                            </div>

                        @endif

                    </div>

                    <div class="p-5">

                        <p class="text-xs uppercase tracking-wider font-bold text-sky-600">
                            {{ $apparatus->position }}
                        </p>

                        <h3 class="font-bold text-slate-800 mt-2">
                            {{ $apparatus->name }}
                        </h3>

                    </div>

                </div>

            @empty

                <div class="sm:col-span-2 lg:col-span-4">

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl py-14 px-6 text-center">

                        <div class="w-16 h-16 rounded-2xl bg-sky-50 text-sky-500 flex items-center justify-center mx-auto">

                            <svg class="w-8 h-8"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="1.5"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M20 21a8 8 0 10-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>

                            </svg>

                        </div>

                        <h3 class="font-bold text-slate-800 mt-4">
                            Belum Ada Data Aparatur
                        </h3>

                        <p class="text-sm text-slate-400 mt-2">
                            Data aparatur Desa Sidorejo akan ditampilkan di bagian ini.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- GALLERY --}}
{{-- ========================================================= --}}
<section id="galeri"
         class="bg-slate-50 py-20 sm:py-24">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="flex items-end justify-between gap-4 mb-10">

            <div>

                <p class="text-sm uppercase tracking-widest font-bold text-indigo-600">
                    Dokumentasi
                </p>

                <h2 class="text-3xl sm:text-4xl font-bold text-slate-800 mt-2">
                    Galeri Desa
                </h2>

                <p class="text-slate-500 mt-2">
                    Dokumentasi kegiatan masyarakat dan pemerintahan desa.
                </p>

            </div>

        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">

            @forelse($galleries as $gallery)

                <div class="group relative aspect-square bg-slate-100 rounded-2xl overflow-hidden shadow-sm">

                    <img src="{{ asset('storage/' . $gallery->image) }}"
                         alt="{{ $gallery->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>

                    <div class="absolute inset-x-0 bottom-0 p-4 translate-y-3 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition duration-300">

                        <h3 class="text-white font-bold text-sm sm:text-base leading-snug">
                            {{ $gallery->title }}
                        </h3>

                        @if($gallery->description)

                            <p class="hidden sm:block text-xs text-slate-200 mt-1 line-clamp-2">
                                {{ $gallery->description }}
                            </p>

                        @endif

                    </div>

                </div>

            @empty

                <div class="col-span-2 lg:col-span-4">

                    <div class="bg-white border border-slate-200 rounded-2xl py-14 px-6 text-center">

                        <div class="w-16 h-16 rounded-2xl bg-indigo-50 text-indigo-500 flex items-center justify-center mx-auto">

                            <svg class="w-8 h-8"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="1.5"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M4 5h16v14H4zM8 14l3-3 2 2 3-4 4 5"/>

                            </svg>

                        </div>

                        <h3 class="font-bold text-slate-800 mt-4">
                            Belum Ada Galeri
                        </h3>

                        <p class="text-sm text-slate-400 mt-2">
                            Dokumentasi kegiatan Desa Sidorejo akan ditampilkan di bagian ini.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- CTA --}}
{{-- ========================================================= --}}
<section class="py-20">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="relative overflow-hidden bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700 rounded-3xl px-6 py-12 sm:px-12 sm:py-14 text-white">

            <div class="absolute -right-20 -top-20 w-72 h-72 bg-white/10 rounded-full"></div>

            <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                <div>

                    <p class="text-sm uppercase tracking-widest font-bold text-blue-100">
                        Portal Warga
                    </p>

                    <h2 class="text-3xl sm:text-4xl font-bold mt-3">
                        Butuh Pelayanan Administrasi?
                    </h2>

                    <p class="text-blue-100 leading-relaxed mt-4 max-w-xl">
                        Ajukan surat atau sampaikan pengaduan secara online.
                        Buat akun warga untuk mengakses seluruh layanan digital Desa Sidorejo.
                    </p>

                </div>

                <div class="flex flex-col sm:flex-row lg:justify-end gap-3">

                    @auth

                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center justify-center bg-white text-blue-700 px-6 py-3.5 rounded-xl font-bold">
                            Buka Dashboard
                        </a>

                    @else

                        <a href="{{ route('login') }}"
                           class="inline-flex items-center justify-center bg-white text-blue-700 px-6 py-3.5 rounded-xl font-bold">
                            Login Warga
                        </a>

                        <a href="{{ route('register') }}"
                           class="inline-flex items-center justify-center bg-white/10 border border-white/20 text-white px-6 py-3.5 rounded-xl font-bold">
                            Buat Akun
                        </a>

                    @endauth

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- CONTACT --}}
{{-- ========================================================= --}}
<section id="kontak"
         class="bg-slate-900 text-white py-20">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            <div>

                <p class="text-sm uppercase tracking-widest font-bold text-sky-400">
                    Kontak Desa
                </p>

                <h2 class="text-3xl sm:text-4xl font-bold mt-2">
                    Hubungi Pemerintah Desa Sidorejo
                </h2>

                <p class="text-slate-400 leading-relaxed mt-4 max-w-lg">
                    Silakan hubungi atau datang langsung ke kantor desa apabila
                    membutuhkan informasi dan pelayanan lebih lanjut.
                </p>

                <div class="space-y-4 mt-8">

                    <div class="flex gap-4">

                        <div class="w-11 h-11 rounded-xl bg-white/10 text-sky-400 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 2a7 7 0 00-7 7c0 5 7 13 7 13s7-8 7-13a7 7 0 00-7-7z"/>
                            </svg>
                        </div>

                        <div>
                            <p class="font-semibold">
                                Alamat
                            </p>

                            <p class="text-sm text-slate-400 mt-1">
                                Kantor Desa Sidorejo
                            </p>
                        </div>

                    </div>

                    <div class="flex gap-4">

                        <div class="w-11 h-11 rounded-xl bg-white/10 text-sky-400 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                            </svg>
                        </div>

                        <div>
                            <p class="font-semibold">
                                Email
                            </p>

                            <p class="text-sm text-slate-400 mt-1">
                                desasidorejo@example.com
                            </p>
                        </div>

                    </div>

                    <div class="flex gap-4">

                        <div class="w-11 h-11 rounded-xl bg-white/10 text-sky-400 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 5a2 2 0 012-2h3l2 5-2 1a15 15 0 007 7l1-2 5 2v3a2 2 0 01-2 2C10 21 3 14 3 5z"/>
                            </svg>
                        </div>

                        <div>
                            <p class="font-semibold">
                                Telepon / WhatsApp
                            </p>

                            <p class="text-sm text-slate-400 mt-1">
                                08xxxxxxxxxx
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            {{-- MAP --}}
            <div class="min-h-[330px] bg-slate-800 border border-slate-700 rounded-3xl flex items-center justify-center">

                <div class="text-center px-6">

                    <div class="w-16 h-16 mx-auto rounded-2xl bg-sky-500/10 text-sky-400 flex items-center justify-center">

                        <svg class="w-8 h-8"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 2a7 7 0 00-7 7c0 5 7 13 7 13s7-8 7-13a7 7 0 00-7-7z"/>

                            <circle cx="12"
                                    cy="9"
                                    r="2.5"
                                    stroke-width="2"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-lg mt-4">
                        Google Maps
                    </h3>

                    <p class="text-sm text-slate-400 mt-2">
                        Embed lokasi Kantor Desa Sidorejo dapat dipasang di bagian ini.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- FOOTER --}}
{{-- ========================================================= --}}
<footer class="bg-slate-950 text-slate-400">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

            <div>

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl bg-sky-600 text-white flex items-center justify-center">

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

                    <div>

                        <h3 class="font-bold text-white">
                            Desa Sidorejo
                        </h3>

                        <p class="text-xs mt-1">
                            Website Resmi Pemerintah Desa
                        </p>

                    </div>

                </div>

                <p class="text-sm leading-relaxed mt-5">
                    Media informasi dan pelayanan digital untuk masyarakat Desa Sidorejo.
                </p>

            </div>


            <div>

                <h3 class="font-bold text-white">
                    Menu
                </h3>

                <div class="space-y-3 text-sm mt-5">

                    <a href="#profil"
                       class="block hover:text-white">
                        Profil Desa
                    </a>

                    <a href="#berita"
                       class="block hover:text-white">
                        Berita
                    </a>

                    <a href="#potensi"
                       class="block hover:text-white">
                        Potensi Desa
                    </a>

                    <a href="#aparatur"
                       class="block hover:text-white">
                        Pemerintahan
                    </a>

                </div>

            </div>


            <div>

                <h3 class="font-bold text-white">
                    Layanan
                </h3>

                <div class="space-y-3 text-sm mt-5">

                    <a href="{{ route('login') }}"
                       class="block hover:text-white">
                        Ajukan Surat
                    </a>

                    <a href="{{ route('login') }}"
                       class="block hover:text-white">
                        Pengaduan Warga
                    </a>

                    <a href="{{ route('login') }}"
                       class="block hover:text-white">
                        Cek Status Surat
                    </a>

                    <a href="{{ route('login') }}"
                       class="block hover:text-white">
                        Portal Warga
                    </a>

                </div>

            </div>


            <div>

                <h3 class="font-bold text-white">
                    Jam Pelayanan
                </h3>

                <div class="text-sm mt-5 space-y-3">

                    <div class="flex justify-between gap-4">
                        <span>Senin - Kamis</span>
                        <span class="text-white">08.00 - 15.00</span>
                    </div>

                    <div class="flex justify-between gap-4">
                        <span>Jumat</span>
                        <span class="text-white">08.00 - 11.30</span>
                    </div>

                    <div class="flex justify-between gap-4">
                        <span>Sabtu - Minggu</span>
                        <span class="text-slate-500">Tutup</span>
                    </div>

                </div>

            </div>

        </div>

        <div class="border-t border-slate-800 mt-10 pt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-sm">

            <p>
                © {{ date('Y') }} Pemerintah Desa Sidorejo.
            </p>

            <p>
                Sistem Informasi Desa
            </p>

        </div>

    </div>

</footer>


{{-- ========================================================= --}}
{{-- MOBILE MENU SCRIPT --}}
{{-- ========================================================= --}}
<script>

    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        const openIcon = document.getElementById('menuOpenIcon');
        const closeIcon = document.getElementById('menuCloseIcon');

        menu.classList.toggle('hidden');
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    }

    function closeMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        const openIcon = document.getElementById('menuOpenIcon');
        const closeIcon = document.getElementById('menuCloseIcon');

        menu.classList.add('hidden');
        openIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
    }

</script>

</body>
</html>