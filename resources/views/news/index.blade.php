<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Berita Desa Sidorejo</title>

    <meta name="description"
          content="Berita dan informasi terbaru dari Pemerintah Desa Sidorejo.">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 overflow-x-hidden">

{{-- ========================================================= --}}
{{-- NAVBAR --}}
{{-- ========================================================= --}}
<header class="bg-white/95 backdrop-blur border-b border-slate-200 sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="h-20 flex items-center justify-between gap-4">

            {{-- BRAND --}}
            <a href="{{ route('home') }}"
               class="flex items-center gap-3 min-w-0">

                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-sky-500 to-blue-700 text-white flex items-center justify-center shadow-md shadow-sky-100 flex-shrink-0">

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

                <div class="min-w-0">

                    <h1 class="font-bold text-lg text-slate-800 leading-tight truncate">
                        Desa Sidorejo
                    </h1>

                    <p class="text-[11px] sm:text-xs text-slate-400 mt-0.5 truncate">
                        Website Resmi Pemerintah Desa
                    </p>

                </div>

            </a>


            {{-- DESKTOP MENU --}}
            <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-slate-600">

                <a href="{{ route('home') }}"
                   class="hover:text-sky-600 transition">
                    Beranda
                </a>

                <a href="{{ route('home') }}#profil"
                   class="hover:text-sky-600 transition">
                    Profil
                </a>

                <a href="{{ route('home') }}#layanan"
                   class="hover:text-sky-600 transition">
                    Layanan
                </a>

                <a href="{{ route('news.index') }}"
                   class="text-sky-600">
                    Berita
                </a>

                <a href="{{ route('announcements.index') }}"
                   class="hover:text-orange-600 transition">
                    Pengumuman
                </a>

                <a href="{{ route('home') }}#potensi"
                   class="hover:text-sky-600 transition">
                    Potensi
                </a>

                <a href="{{ route('home') }}#aparatur"
                   class="hover:text-sky-600 transition">
                    Pemerintahan
                </a>

            </nav>


            {{-- AUTH --}}
            <div class="flex items-center gap-3 flex-shrink-0">

                @auth

                    <a href="{{ route('dashboard') }}"
                       class="hidden sm:inline-flex items-center justify-center bg-sky-600 hover:bg-sky-700 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition">
                        Dashboard
                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="hidden sm:inline-flex text-slate-600 hover:text-sky-600 font-semibold text-sm transition">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="inline-flex items-center justify-center bg-sky-600 hover:bg-sky-700 text-white px-4 sm:px-5 py-2.5 rounded-xl font-semibold text-sm transition">
                        Portal Warga
                    </a>

                @endauth

            </div>

        </div>

    </div>

</header>


{{-- ========================================================= --}}
{{-- HERO --}}
{{-- ========================================================= --}}
<section class="relative overflow-hidden bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white">

    <div class="absolute -top-20 -right-20 w-72 h-72 bg-white/10 rounded-full"></div>
    <div class="absolute -bottom-28 left-[10%] w-80 h-80 bg-white/10 rounded-full"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-14 sm:py-16 lg:py-20">

        <div class="max-w-3xl">

            <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 backdrop-blur px-4 py-2 rounded-full">

                <div class="w-8 h-8 rounded-lg bg-white/10 text-sky-100 flex items-center justify-center">

                    <svg class="w-4 h-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M4 5h16v14H4zM8 9h8M8 13h8M8 17h5"/>

                    </svg>

                </div>

                <span class="text-xs sm:text-sm uppercase tracking-widest font-bold text-blue-100">
                    Informasi Desa
                </span>

            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight mt-5">
                Berita
                <span class="text-sky-100">
                    Desa Sidorejo
                </span>
            </h1>

            <p class="text-blue-100 text-base sm:text-lg leading-relaxed mt-5 max-w-2xl">
                Ikuti perkembangan, kegiatan, pelayanan, dan informasi terbaru dari Pemerintah Desa Sidorejo.
            </p>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- CONTENT --}}
{{-- ========================================================= --}}
<main class="max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-14">

    {{-- BREADCRUMB --}}
    <div class="flex items-center gap-2 text-sm text-slate-400 mb-8">

        <a href="{{ route('home') }}"
           class="hover:text-sky-600 transition">
            Beranda
        </a>

        <svg class="w-4 h-4"
             fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24">
            <path stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M9 18l6-6-6-6"/>
        </svg>

        <span class="text-slate-600 font-medium">
            Berita
        </span>

    </div>


    {{-- HEADER CONTENT --}}
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">

        <div>

            <p class="text-sm uppercase tracking-widest font-bold text-sky-600">
                Kabar Terbaru
            </p>

            <h2 class="text-2xl sm:text-3xl font-bold text-slate-800 mt-2">
                Berita Terbaru
            </h2>

            <p class="text-slate-500 mt-2">
                Menampilkan berita terbaru yang telah dipublikasikan.
            </p>

        </div>

        <div class="inline-flex items-center gap-2 w-fit bg-white border border-slate-200 text-slate-600 text-sm font-semibold px-4 py-2.5 rounded-xl shadow-sm">

            <svg class="w-4 h-4 text-sky-500"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M4 5h16v14H4zM8 9h8M8 13h8M8 17h5"/>

            </svg>

            {{ $news->total() }} Berita

        </div>

    </div>


    {{-- NEWS GRID --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($news as $item)

            <article class="group bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                {{-- IMAGE --}}
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


                {{-- BODY --}}
                <div class="p-5">

                    <div class="flex items-center gap-2 flex-wrap">

                        <span class="bg-sky-50 text-sky-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                            {{ $item->category ?: 'Berita Desa' }}
                        </span>

                        <span class="text-xs text-slate-400">
                            {{ ($item->published_at ?? $item->created_at)->format('d M Y') }}
                        </span>

                    </div>


                    <a href="{{ route('news.show', $item->slug) }}">

                        <h2 class="text-lg font-bold text-slate-800 leading-snug mt-4 group-hover:text-sky-600 transition">
                            {{ $item->title }}
                        </h2>

                    </a>


                    <p class="text-sm text-slate-500 leading-relaxed mt-3">

                        @if($item->excerpt)

                            {{ \Illuminate\Support\Str::limit($item->excerpt, 135) }}

                        @else

                            {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 135) }}

                        @endif

                    </p>


                    <a href="{{ route('news.show', $item->slug) }}"
                       class="inline-flex items-center gap-2 text-sm font-semibold text-sky-600 hover:text-sky-700 mt-5">

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

                <div class="bg-white border border-slate-200 rounded-3xl py-16 px-6 text-center shadow-sm">

                    <div class="w-16 h-16 rounded-2xl bg-sky-50 text-sky-500 mx-auto flex items-center justify-center">

                        <svg class="w-7 h-7"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M4 5h16v14H4zM8 9h8M8 13h5"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-lg text-slate-800 mt-4">
                        Belum Ada Berita
                    </h3>

                    <p class="text-sm text-slate-400 mt-2">
                        Berita terbaru Desa Sidorejo akan ditampilkan di halaman ini.
                    </p>

                </div>

            </div>

        @endforelse

    </div>


    {{-- PAGINATION --}}
    @if($news->hasPages())

        <div class="mt-10 bg-white border border-slate-200 rounded-2xl px-5 py-4 shadow-sm">
            {{ $news->links() }}
        </div>

    @endif

</main>


{{-- ========================================================= --}}
{{-- CTA --}}
{{-- ========================================================= --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 pb-16 sm:pb-20">

    <div class="relative overflow-hidden bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700 rounded-3xl px-6 py-10 sm:px-10 sm:py-12 text-white">

        <div class="absolute -right-16 -top-16 w-56 h-56 bg-white/10 rounded-full"></div>

        <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>

                <p class="text-xs uppercase tracking-widest font-bold text-blue-100">
                    Portal Warga
                </p>

                <h2 class="text-2xl sm:text-3xl font-bold mt-2">
                    Butuh Pelayanan Desa?
                </h2>

                <p class="text-blue-100 mt-2 max-w-xl">
                    Pengajuan surat dan pengaduan warga dapat dilakukan secara online melalui Portal Warga Desa Sidorejo.
                </p>

            </div>

            <div class="flex flex-col sm:flex-row gap-3">

                @auth

                    <a href="{{ route('dashboard') }}"
                       class="inline-flex justify-center bg-white text-blue-700 font-bold px-6 py-3 rounded-xl">
                        Dashboard
                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="inline-flex justify-center bg-white text-blue-700 font-bold px-6 py-3 rounded-xl">
                        Login Warga
                    </a>

                    <a href="{{ route('register') }}"
                       class="inline-flex justify-center bg-white/10 border border-white/20 text-white font-bold px-6 py-3 rounded-xl">
                        Daftar
                    </a>

                @endauth

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- FOOTER --}}
{{-- ========================================================= --}}
<footer class="bg-slate-900 text-slate-400">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-10">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>

                <p class="font-bold text-white">
                    Desa Sidorejo
                </p>

                <p class="text-sm mt-1">
                    Website Resmi Pemerintah Desa
                </p>

            </div>

            <p class="text-sm">
                © {{ date('Y') }} Pemerintah Desa Sidorejo
            </p>

        </div>

    </div>

</footer>

</body>

</html>
