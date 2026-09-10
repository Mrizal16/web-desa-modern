<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Potensi Desa</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-sky-600 via-blue-600 to-indigo-700 rounded-3xl p-6 sm:p-8 mb-8 text-white shadow-lg shadow-blue-100">

        <div class="absolute -top-16 -right-16 w-48 h-48 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-20 left-1/3 w-56 h-56 bg-white/10 rounded-full"></div>

        <div class="relative flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6">

            <div>

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-widest text-blue-100">
                    Website Desa
                </div>

                <h1 class="text-3xl sm:text-4xl font-bold mt-4">
                    Kelola Potensi Desa
                </h1>

                <p class="text-blue-100 mt-2 max-w-2xl">
                    Kelola potensi Desa Sidorejo yang akan ditampilkan di halaman website publik.
                </p>

            </div>

            <div class="flex flex-col sm:flex-row gap-3">

                <a href="{{ route('admin.dashboard') }}"
                   class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 border border-white/20 text-white px-5 py-3 rounded-xl font-semibold transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 18l-6-6 6-6"/>

                    </svg>

                    Kembali ke Dashboard

                </a>

                <a href="{{ route('admin.potentials.create') }}"
                   class="inline-flex items-center justify-center gap-2 bg-white text-blue-700 hover:bg-blue-50 px-5 py-3 rounded-xl font-bold transition shadow-sm">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              d="M12 5v14M5 12h14"/>

                    </svg>

                    Tambah Potensi

                </a>

            </div>

        </div>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl p-4 mb-6">

            <div class="flex items-start gap-3">

                <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">

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

                <div>

                    <p class="font-semibold">
                        Berhasil
                    </p>

                    <p class="text-sm mt-1">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        </div>

    @endif


    {{-- CONTENT CARD --}}
    <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

        <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">

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

                    <div>

                        <h2 class="font-bold text-lg">
                            Daftar Potensi
                        </h2>

                        <p class="text-sm text-slate-400 mt-0.5">
                            Semua potensi yang telah ditambahkan.
                        </p>

                    </div>

                </div>

                <span class="inline-flex items-center gap-2 w-fit bg-emerald-50 text-emerald-700 border border-emerald-100 text-xs font-bold px-3 py-2 rounded-full">

                    <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>

                    {{ $potentials->count() }} Potensi

                </span>

            </div>

        </div>


        @if($potentials->count())

            <div class="p-5 sm:p-6">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">

                    @foreach($potentials as $potential)

                        <article class="group bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                            <div class="relative aspect-[16/10] bg-slate-100 overflow-hidden flex items-center justify-center">

                                @if($potential->image)

                                    <img src="{{ asset('storage/' . $potential->image) }}"
                                         alt="{{ $potential->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                                @else

                                    <div class="w-full h-full bg-gradient-to-br from-emerald-50 to-teal-100 text-emerald-400 flex items-center justify-center">

                                        <svg class="w-14 h-14"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-width="1.5"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 21V9m0 0C9 9 6 7 6 4c3 0 6 2 6 5zm0 0c3 0 6-2 6-5-3 0-6 2-6 5z"/>

                                        </svg>

                                    </div>

                                @endif


                                <div class="absolute top-3 right-3">

                                    @if($potential->is_active)

                                        <span class="inline-flex items-center gap-1.5 bg-white/90 backdrop-blur text-emerald-700 border border-emerald-100 text-[10px] font-bold uppercase px-2.5 py-1.5 rounded-full shadow-sm">

                                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>

                                            Aktif

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5 bg-white/90 backdrop-blur text-slate-500 border border-slate-200 text-[10px] font-bold uppercase px-2.5 py-1.5 rounded-full shadow-sm">

                                            <span class="w-1.5 h-1.5 bg-slate-400 rounded-full"></span>

                                            Nonaktif

                                        </span>

                                    @endif

                                </div>

                            </div>


                            <div class="p-5">

                                <h3 class="font-bold text-slate-800 leading-snug">
                                    {{ $potential->title }}
                                </h3>

                                <div class="flex items-center gap-2 text-xs text-slate-400 mt-2">

                                    <svg class="w-4 h-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M8 7h8M8 12h8M8 17h5"/>

                                    </svg>

                                    Urutan {{ $potential->sort_order }}

                                </div>


                                @if($potential->description)

                                    <p class="text-sm text-slate-500 mt-3 line-clamp-3 leading-relaxed">
                                        {{ $potential->description }}
                                    </p>

                                @else

                                    <p class="text-sm text-slate-400 italic mt-3">
                                        Tidak ada deskripsi.
                                    </p>

                                @endif


                                <div class="grid grid-cols-2 gap-2 mt-5">

                                    <a href="{{ route('admin.potentials.edit', $potential) }}"
                                       class="inline-flex items-center justify-center gap-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-100 px-3 py-2.5 rounded-xl text-sm font-semibold transition">

                                        <svg class="w-4 h-4"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-width="2"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M4 20h4l10-10-4-4L4 16v4zM13 7l4 4"/>

                                        </svg>

                                        Edit

                                    </a>


                                    <form action="{{ route('admin.potentials.destroy', $potential) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus potensi ini?')"
                                                class="w-full inline-flex items-center justify-center gap-2 bg-red-50 hover:bg-red-100 text-red-700 border border-red-100 px-3 py-2.5 rounded-xl text-sm font-semibold transition">

                                            <svg class="w-4 h-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-width="2"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M6 7h12M9 7V4h6v3m-8 0l1 13h8l1-13"/>

                                            </svg>

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>

            </div>

        @else

            <div class="py-16 px-6 text-center">

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

                <h3 class="font-bold text-lg text-slate-800 mt-4">
                    Belum Ada Potensi Desa
                </h3>

                <p class="text-sm text-slate-400 mt-2">
                    Tambahkan potensi desa yang ingin ditampilkan pada website.
                </p>

                <a href="{{ route('admin.potentials.create') }}"
                   class="inline-flex items-center justify-center gap-2 mt-5 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-xl font-semibold transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              d="M12 5v14M5 12h14"/>

                    </svg>

                    Tambah Potensi Pertama

                </a>

            </div>

        @endif

    </div>

</div>

</body>

</html>
