<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri Desa</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>
            <p class="text-sm font-semibold text-indigo-600">
                Website Desa
            </p>

            <h1 class="text-3xl font-bold mt-1">
                Galeri Desa
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola dokumentasi foto kegiatan Desa Sidorejo.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">

            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center justify-center bg-white border border-slate-200 text-slate-700 px-5 py-3 rounded-xl font-semibold">
                Dashboard
            </a>

            <a href="{{ route('admin.galleries.create') }}"
               class="inline-flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl font-semibold">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          d="M12 5v14M5 12h14"/>

                </svg>

                Tambah Foto

            </a>

        </div>

    </div>


    @if(session('success'))

        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl p-4 mb-6">

            <p class="font-semibold">
                Berhasil
            </p>

            <p class="text-sm mt-1">
                {{ session('success') }}
            </p>

        </div>

    @endif


    @if($galleries->count())

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">

            @foreach($galleries as $gallery)

                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">

                    <div class="aspect-square bg-slate-100 overflow-hidden">

                        <img src="{{ asset('storage/' . $gallery->image) }}"
                             alt="{{ $gallery->title }}"
                             class="w-full h-full object-cover">

                    </div>

                    <div class="p-5">

                        <div class="flex items-start justify-between gap-3">

                            <div class="min-w-0">

                                <h3 class="font-bold text-slate-800 truncate">
                                    {{ $gallery->title }}
                                </h3>

                                <p class="text-xs text-slate-400 mt-1">
                                    Urutan {{ $gallery->sort_order }}
                                </p>

                            </div>

                            @if($gallery->is_active)

                                <span class="bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase px-2.5 py-1 rounded-full">
                                    Aktif
                                </span>

                            @else

                                <span class="bg-slate-100 text-slate-500 text-[10px] font-bold uppercase px-2.5 py-1 rounded-full">
                                    Nonaktif
                                </span>

                            @endif

                        </div>

                        @if($gallery->description)

                            <p class="text-sm text-slate-500 mt-3 line-clamp-2">
                                {{ $gallery->description }}
                            </p>

                        @endif

                        <div class="grid grid-cols-2 gap-2 mt-5">

                            <a href="{{ route('admin.galleries.edit', $gallery) }}"
                               class="text-center bg-indigo-50 hover:bg-indigo-100 text-indigo-700 px-3 py-2.5 rounded-xl text-sm font-semibold">

                                Edit

                            </a>

                            <form action="{{ route('admin.galleries.destroy', $gallery) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus foto galeri ini?')"
                                        class="w-full bg-red-50 hover:bg-red-100 text-red-700 px-3 py-2.5 rounded-xl text-sm font-semibold">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-white border border-slate-200 rounded-2xl py-16 px-6 text-center">

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

            <h3 class="font-bold text-lg text-slate-800 mt-4">
                Belum Ada Foto Galeri
            </h3>

            <p class="text-sm text-slate-400 mt-2">
                Tambahkan dokumentasi kegiatan Desa Sidorejo.
            </p>

            <a href="{{ route('admin.galleries.create') }}"
               class="inline-flex mt-5 bg-indigo-600 text-white px-5 py-3 rounded-xl font-semibold">

                Tambah Foto Pertama

            </a>

        </div>

    @endif

</div>

</body>
</html>