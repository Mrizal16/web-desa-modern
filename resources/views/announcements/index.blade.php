<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengumuman Desa Sidorejo</title>

    <meta name="description"
          content="Pengumuman dan informasi penting dari Pemerintah Desa Sidorejo.">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-800">

{{-- NAVBAR --}}
<header class="bg-white border-b border-slate-200 sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="h-20 flex items-center justify-between">

            <a href="{{ route('home') }}"
               class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-sky-500 to-blue-700 text-white flex items-center justify-center">

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

                    <h1 class="font-bold text-slate-800">
                        Desa Sidorejo
                    </h1>

                    <p class="text-xs text-slate-400 mt-0.5">
                        Website Resmi Pemerintah Desa
                    </p>

                </div>

            </a>


            <div class="flex items-center gap-3">

                <a href="{{ route('home') }}"
                   class="hidden sm:inline-flex text-sm font-semibold text-slate-600 hover:text-sky-600">
                    Beranda
                </a>

                @auth

                    <a href="{{ route('dashboard') }}"
                       class="bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl">

                        Dashboard

                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl">

                        Portal Warga

                    </a>

                @endauth

            </div>

        </div>

    </div>

</header>


{{-- HERO --}}
<section class="bg-gradient-to-br from-orange-400 via-orange-500 to-amber-600 text-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 sm:py-20">

        <div class="max-w-3xl">

            <p class="text-sm uppercase tracking-widest font-bold text-orange-100">
                Informasi Penting
            </p>

            <h1 class="text-4xl sm:text-5xl font-bold mt-3">
                Pengumuman Desa Sidorejo
            </h1>

            <p class="text-orange-100 text-base sm:text-lg leading-relaxed mt-5 max-w-2xl">
                Informasi pelayanan, kegiatan masyarakat, bantuan sosial,
                serta pemberitahuan penting dari Pemerintah Desa Sidorejo.
            </p>

        </div>

    </div>

</section>


{{-- BREADCRUMB --}}
<div class="max-w-5xl mx-auto px-4 sm:px-6 pt-7">

    <div class="flex items-center gap-2 text-sm text-slate-400">

        <a href="{{ route('home') }}"
           class="hover:text-orange-600">
            Beranda
        </a>

        <span>/</span>

        <span class="text-slate-600">
            Pengumuman
        </span>

    </div>

</div>


{{-- CONTENT --}}
<main class="max-w-5xl mx-auto px-4 sm:px-6 py-8 sm:py-12">

    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">

        <div>

            <h2 class="text-2xl sm:text-3xl font-bold text-slate-800">
                Pengumuman Terbaru
            </h2>

            <p class="text-slate-500 mt-2">
                Daftar pengumuman yang telah dipublikasikan.
            </p>

        </div>

        <span class="inline-flex w-fit bg-white border border-slate-200 text-slate-600 text-sm font-semibold px-4 py-2 rounded-xl">

            {{ $announcements->total() }} Pengumuman

        </span>

    </div>


    <div class="space-y-4">

        @forelse($announcements as $announcement)

            <article class="group bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 shadow-sm hover:shadow-md hover:border-orange-200 transition">

                <div class="flex gap-4">

                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center flex-shrink-0">

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

                            <span class="text-xs uppercase tracking-wider font-bold text-orange-600">
                                Pengumuman
                            </span>

                            <span class="text-xs text-slate-400">
                                {{ ($announcement->published_at ?? $announcement->created_at)->format('d M Y, H:i') }}
                            </span>

                        </div>

                        <h2 class="text-lg sm:text-xl font-bold text-slate-800 mt-2 group-hover:text-orange-600 transition">
                            {{ $announcement->title }}
                        </h2>

                        <div class="text-sm sm:text-base text-slate-600 leading-relaxed whitespace-pre-line mt-3">
                            {{ $announcement->content }}
                        </div>

                    </div>

                </div>

            </article>

        @empty

            <div class="bg-white border border-slate-200 rounded-2xl py-16 px-6 text-center">

                <div class="w-16 h-16 rounded-2xl bg-orange-50 text-orange-500 flex items-center justify-center mx-auto">

                    <svg class="w-7 h-7"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M18 8a6 6 0 00-12 0c0 7-3 7-3 7h18s-3 0-3-7M10 19h4"/>

                    </svg>

                </div>

                <h3 class="font-bold text-lg text-slate-800 mt-4">
                    Belum Ada Pengumuman
                </h3>

                <p class="text-sm text-slate-400 mt-2">
                    Pengumuman terbaru Desa Sidorejo akan ditampilkan di halaman ini.
                </p>

            </div>

        @endforelse

    </div>


    @if($announcements->hasPages())

        <div class="mt-8 bg-white border border-slate-200 rounded-2xl px-5 py-4">

            {{ $announcements->links() }}

        </div>

    @endif

</main>


{{-- CTA --}}
<section class="max-w-5xl mx-auto px-4 sm:px-6 pb-16">

    <div class="bg-gradient-to-r from-sky-500 to-blue-700 rounded-3xl px-6 py-10 sm:px-10 text-white">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

            <div>

                <h2 class="text-2xl font-bold">
                    Butuh Pelayanan Desa?
                </h2>

                <p class="text-sky-100 mt-2">
                    Ajukan surat atau pengaduan melalui Portal Warga Desa Sidorejo.
                </p>

            </div>

            @auth

                <a href="{{ route('dashboard') }}"
                   class="inline-flex justify-center bg-white text-blue-700 font-bold px-6 py-3 rounded-xl">

                    Dashboard

                </a>

            @else

                <a href="{{ route('login') }}"
                   class="inline-flex justify-center bg-white text-blue-700 font-bold px-6 py-3 rounded-xl">

                    Portal Warga

                </a>

            @endauth

        </div>

    </div>

</section>


{{-- FOOTER --}}
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