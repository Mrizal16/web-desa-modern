<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Berita</title>

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

                <h1 class="text-3xl sm:text-4xl font-bold mt-4">Kelola Berita</h1>

                <p class="text-blue-100 mt-2 max-w-2xl">
                    Tambah, edit, publikasikan, atau hapus berita yang tampil di website Desa Sidorejo.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('admin.dashboard') }}"
                   class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 border border-white/20 text-white px-5 py-3 rounded-xl font-semibold transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6"/>
                    </svg>
                    Kembali ke Dashboard
                </a>

                <a href="{{ route('admin.news.create') }}"
                   class="inline-flex items-center justify-center gap-2 bg-white text-blue-700 hover:bg-blue-50 px-5 py-3 rounded-xl font-bold transition shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                    </svg>
                    Tambah Berita
                </a>
            </div>

        </div>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 rounded-2xl mb-6">

            <p class="font-semibold">
                Berhasil
            </p>

            <p class="text-sm mt-1">
                {{ session('success') }}
            </p>

        </div>

    @endif


    {{-- TABLE CARD --}}
    <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

        <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

            <div class="flex items-center justify-between gap-4">

                <div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M4 5h16v14H4zM8 9h8M8 13h8M8 17h5"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Daftar Berita</h2>
                            <p class="text-sm text-slate-400 mt-0.5">Semua artikel berita yang telah dibuat.</p>
                        </div>
                    </div>

                </div>

                <span class="inline-flex items-center gap-2 bg-sky-50 text-sky-700 border border-sky-100 text-xs font-bold px-3 py-2 rounded-full">
                    <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
                    {{ $news->total() }} Berita
                </span>

            </div>

        </div>


        {{-- DESKTOP --}}
        <div class="hidden md:block overflow-x-auto">

            <table class="w-full min-w-[900px]">

                <thead class="bg-slate-50/80 border-b border-slate-200">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-slate-500">
                            Berita
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-slate-500">
                            Kategori
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-slate-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-slate-500">
                            Tanggal
                        </th>

                        <th class="px-6 py-4 text-right text-xs uppercase tracking-wider text-slate-500">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($news as $item)

                        <tr class="hover:bg-sky-50/40 transition">

                            <td class="px-6 py-4">

                                <div class="flex items-center gap-4">

                                    <div class="w-20 h-14 rounded-xl overflow-hidden bg-slate-100 flex-shrink-0">

                                        @if($item->image)

                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                 alt="{{ $item->title }}"
                                                 class="w-full h-full object-cover">

                                        @else

                                            <div class="w-full h-full flex items-center justify-center text-slate-300">

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

                                        @endif

                                    </div>

                                    <div class="min-w-0">

                                        <p class="font-semibold text-slate-800 line-clamp-2">
                                            {{ $item->title }}
                                        </p>

                                        <p class="text-xs text-slate-400 mt-1">
                                            {{ $item->slug }}
                                        </p>

                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-4">

                                <span class="inline-flex bg-sky-50 text-sky-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    {{ $item->category ?: 'Umum' }}
                                </span>

                            </td>

                            <td class="px-6 py-4">

                                @if($item->status === 'published')

                                    <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">

                                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>

                                        Published

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-3 py-1.5 rounded-full">

                                        <span class="w-2 h-2 bg-amber-500 rounded-full"></span>

                                        Draft

                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4 text-sm text-slate-500">

                                {{ $item->published_at?->format('d M Y, H:i') ?? $item->created_at->format('d M Y, H:i') }}

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    <a href="{{ route('admin.news.edit', $item) }}"
                                       class="inline-flex items-center justify-center bg-sky-50 hover:bg-sky-100 text-sky-700 px-3 py-2 rounded-lg text-sm font-semibold transition">

                                        Edit

                                    </a>

                                    <form action="{{ route('admin.news.destroy', $item) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus berita ini?')"
                                                class="inline-flex items-center justify-center bg-red-50 hover:bg-red-100 text-red-700 px-3 py-2 rounded-lg text-sm font-semibold transition">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="px-6 py-14 text-center">

                                <div class="w-14 h-14 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">

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

                                <p class="font-semibold text-slate-700 mt-4">
                                    Belum Ada Berita
                                </p>

                                <p class="text-sm text-slate-400 mt-1">
                                    Tambahkan berita pertama untuk website desa.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- MOBILE --}}
        <div class="md:hidden divide-y divide-slate-100">

            @forelse($news as $item)

                <div class="p-4">

                    <div class="flex gap-3">

                        <div class="w-24 h-20 rounded-xl overflow-hidden bg-slate-100 flex-shrink-0">

                            @if($item->image)

                                <img src="{{ asset('storage/' . $item->image) }}"
                                     alt="{{ $item->title }}"
                                     class="w-full h-full object-cover">

                            @else

                                <div class="w-full h-full flex items-center justify-center text-slate-300">

                                    <svg class="w-7 h-7"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M4 5h16v14H4zM8 14l3-3 2 2 3-4 4 5"/>

                                    </svg>

                                </div>

                            @endif

                        </div>

                        <div class="min-w-0 flex-1">

                            <p class="font-semibold text-slate-800 leading-snug">
                                {{ $item->title }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                {{ $item->created_at->format('d M Y') }}
                            </p>

                            <div class="flex items-center gap-2 mt-2 flex-wrap">

                                <span class="bg-sky-50 text-sky-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                    {{ $item->category ?: 'Umum' }}
                                </span>

                                @if($item->status === 'published')

                                    <span class="bg-emerald-50 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                        Published
                                    </span>

                                @else

                                    <span class="bg-amber-50 text-amber-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                        Draft
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-2 mt-4">

                        <a href="{{ route('admin.news.edit', $item) }}"
                           class="text-center bg-sky-50 text-sky-700 px-3 py-2.5 rounded-xl text-sm font-semibold">
                            Edit
                        </a>

                        <form action="{{ route('admin.news.destroy', $item) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus berita ini?')"
                                    class="w-full bg-red-50 text-red-700 px-3 py-2.5 rounded-xl text-sm font-semibold">

                                Hapus

                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="px-6 py-12 text-center text-slate-400">
                    Belum ada berita.
                </div>

            @endforelse

        </div>


        {{-- PAGINATION --}}
        @if($news->hasPages())

            <div class="px-6 py-4 border-t border-slate-200">

                {{ $news->links() }}

            </div>

        @endif

    </div>

</div>

</body>
</html>