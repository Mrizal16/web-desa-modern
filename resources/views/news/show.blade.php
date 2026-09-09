<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        {{ $news->title }} - Desa Sidorejo
    </title>

    <meta name="description"
          content="{{ $news->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($news->content), 150) }}">

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-slate-50 text-slate-800">


{{-- NAVBAR --}}
<header class="bg-white border-b border-slate-200 sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="h-20 flex items-center justify-between">

            <a href="{{ url('/') }}"
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

                <a href="{{ url('/') }}"
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


{{-- BREADCRUMB --}}
<div class="max-w-5xl mx-auto px-4 sm:px-6 pt-8">

    <div class="flex items-center gap-2 text-sm text-slate-400">

        <a href="{{ url('/') }}"
           class="hover:text-sky-600">
            Beranda
        </a>

        <span>/</span>

        <a href="{{ url('/#berita') }}"
           class="hover:text-sky-600">
            Berita
        </a>

        <span>/</span>

        <span class="text-slate-600">
            Detail
        </span>

    </div>

</div>


{{-- ARTICLE --}}
<main class="max-w-5xl mx-auto px-4 sm:px-6 py-8 sm:py-12">

    <article class="bg-white border border-slate-200 rounded-2xl sm:rounded-3xl overflow-hidden shadow-sm">

        {{-- IMAGE --}}
        @if($news->image)

            <div class="aspect-[16/8] bg-slate-100">

                <img src="{{ asset('storage/' . $news->image) }}"
                     alt="{{ $news->title }}"
                     class="w-full h-full object-cover">

            </div>

        @endif


        <div class="p-5 sm:p-8 lg:p-10">

            {{-- META --}}
            <div class="flex items-center gap-2 flex-wrap">

                <span class="bg-sky-50 text-sky-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                    {{ $news->category ?: 'Berita Desa' }}
                </span>

                <span class="text-sm text-slate-400">
                    {{ ($news->published_at ?? $news->created_at)->format('d M Y, H:i') }}
                </span>

            </div>


            {{-- TITLE --}}
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 leading-tight mt-5">
                {{ $news->title }}
            </h1>


            @if($news->excerpt)

                <p class="text-lg text-slate-500 leading-relaxed mt-5 border-l-4 border-sky-500 pl-4">
                    {{ $news->excerpt }}
                </p>

            @endif


            {{-- CONTENT --}}
            <div class="mt-8 text-slate-700 leading-8 text-base sm:text-lg whitespace-pre-line">
                {{ $news->content }}
            </div>


            {{-- BACK --}}
            <div class="border-t border-slate-100 mt-10 pt-6">

                <a href="{{ url('/#berita') }}"
                   class="inline-flex items-center gap-2 text-sky-600 hover:text-sky-700 font-semibold">

                    <svg class="w-4 h-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 19l-7-7 7-7"/>

                    </svg>

                    Kembali ke Berita

                </a>

            </div>

        </div>

    </article>


    {{-- SERVICE CTA --}}
    <div class="mt-8 bg-gradient-to-r from-sky-500 to-blue-700 rounded-2xl sm:rounded-3xl p-6 sm:p-8 text-white">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div>

                <h2 class="text-xl sm:text-2xl font-bold">
                    Butuh Pelayanan Desa?
                </h2>

                <p class="text-sky-100 mt-2">
                    Gunakan Portal Warga untuk pengajuan surat dan pengaduan secara online.
                </p>

            </div>

            @auth

                <a href="{{ route('dashboard') }}"
                   class="inline-flex justify-center bg-white text-blue-700 px-5 py-3 rounded-xl font-bold">
                    Dashboard
                </a>

            @else

                <a href="{{ route('login') }}"
                   class="inline-flex justify-center bg-white text-blue-700 px-5 py-3 rounded-xl font-bold">
                    Login Warga
                </a>

            @endauth

        </div>

    </div>

</main>


{{-- FOOTER --}}
<footer class="bg-slate-900 text-slate-400 mt-10">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <p>
                © {{ date('Y') }} Pemerintah Desa Sidorejo
            </p>

            <p>
                Sistem Informasi Desa
            </p>

        </div>

    </div>

</footer>


</body>

</html>