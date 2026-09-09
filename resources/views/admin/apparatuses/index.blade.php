<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Aparatur Desa</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>

            <p class="text-sm font-semibold text-sky-600">
                Website Desa
            </p>

            <h1 class="text-3xl font-bold mt-1">
                Aparatur Desa
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola nama, jabatan, foto dan urutan aparatur Desa Sidorejo.
            </p>

        </div>

        <div class="flex flex-col sm:flex-row gap-3">

            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center justify-center bg-white border border-slate-200 text-slate-700 px-5 py-3 rounded-xl font-semibold">
                Dashboard
            </a>

            <a href="{{ route('admin.apparatuses.create') }}"
               class="inline-flex items-center justify-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl font-semibold">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          d="M12 5v14M5 12h14"/>

                </svg>

                Tambah Aparatur

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


    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between gap-4">

            <div>

                <h2 class="font-bold text-lg">
                    Daftar Aparatur
                </h2>

                <p class="text-sm text-slate-400 mt-1">
                    Urutan terkecil akan tampil lebih dulu di website.
                </p>

            </div>

            <span class="bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                {{ $apparatuses->count() }} Aparatur
            </span>

        </div>


        {{-- DESKTOP --}}
        <div class="hidden md:block overflow-x-auto">

            <table class="w-full min-w-[850px]">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-slate-500">
                            Aparatur
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-slate-500">
                            Jabatan
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-slate-500">
                            Urutan
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-slate-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right text-xs uppercase tracking-wider text-slate-500">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($apparatuses as $apparatus)

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-6 py-4">

                                <div class="flex items-center gap-4">

                                    <div class="w-14 h-14 rounded-xl overflow-hidden bg-slate-100 flex-shrink-0">

                                        @if($apparatus->photo)

                                            <img src="{{ asset('storage/' . $apparatus->photo) }}"
                                                 alt="{{ $apparatus->name }}"
                                                 class="w-full h-full object-cover">

                                        @else

                                            <div class="w-full h-full flex items-center justify-center text-slate-300">

                                                <svg class="w-7 h-7"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">

                                                    <path stroke-width="1.7"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          d="M20 21a8 8 0 10-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>

                                                </svg>

                                            </div>

                                        @endif

                                    </div>

                                    <div>

                                        <p class="font-semibold text-slate-800">
                                            {{ $apparatus->name }}
                                        </p>

                                        <p class="text-xs text-slate-400 mt-1">
                                            ID #{{ $apparatus->id }}
                                        </p>

                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-4">

                                <span class="text-sm font-medium text-slate-700">
                                    {{ $apparatus->position }}
                                </span>

                            </td>

                            <td class="px-6 py-4">

                                <span class="inline-flex min-w-9 justify-center bg-slate-100 text-slate-700 text-sm font-semibold px-3 py-1.5 rounded-lg">
                                    {{ $apparatus->sort_order }}
                                </span>

                            </td>

                            <td class="px-6 py-4">

                                @if($apparatus->is_active)

                                    <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                                        Aktif
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2 bg-slate-100 text-slate-500 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-slate-400 rounded-full"></span>
                                        Nonaktif
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-2">

                                    <a href="{{ route('admin.apparatuses.edit', $apparatus) }}"
                                       class="bg-sky-50 hover:bg-sky-100 text-sky-700 px-4 py-2 rounded-xl text-sm font-semibold">

                                        Edit

                                    </a>

                                    <form action="{{ route('admin.apparatuses.destroy', $apparatus) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus aparatur ini?')"
                                                class="bg-red-50 hover:bg-red-100 text-red-700 px-4 py-2 rounded-xl text-sm font-semibold">

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

                                <p class="font-semibold text-slate-700">
                                    Belum Ada Aparatur
                                </p>

                                <p class="text-sm text-slate-400 mt-1">
                                    Tambahkan aparatur pertama Desa Sidorejo.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- MOBILE --}}
        <div class="md:hidden divide-y divide-slate-100">

            @forelse($apparatuses as $apparatus)

                <div class="p-4">

                    <div class="flex gap-4">

                        <div class="w-20 h-20 rounded-2xl overflow-hidden bg-slate-100 flex-shrink-0">

                            @if($apparatus->photo)

                                <img src="{{ asset('storage/' . $apparatus->photo) }}"
                                     alt="{{ $apparatus->name }}"
                                     class="w-full h-full object-cover">

                            @else

                                <div class="w-full h-full flex items-center justify-center text-slate-300">

                                    <svg class="w-9 h-9"
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

                        <div class="min-w-0 flex-1">

                            <h3 class="font-bold text-slate-800">
                                {{ $apparatus->name }}
                            </h3>

                            <p class="text-sm text-sky-600 font-semibold mt-1">
                                {{ $apparatus->position }}
                            </p>

                            <div class="flex items-center gap-2 mt-3 flex-wrap">

                                <span class="bg-slate-100 text-slate-600 text-xs font-semibold px-2.5 py-1 rounded-full">
                                    Urutan {{ $apparatus->sort_order }}
                                </span>

                                @if($apparatus->is_active)

                                    <span class="bg-emerald-50 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                        Aktif
                                    </span>

                                @else

                                    <span class="bg-slate-100 text-slate-500 text-xs font-semibold px-2.5 py-1 rounded-full">
                                        Nonaktif
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-2 mt-4">

                        <a href="{{ route('admin.apparatuses.edit', $apparatus) }}"
                           class="text-center bg-sky-50 text-sky-700 px-3 py-2.5 rounded-xl text-sm font-semibold">
                            Edit
                        </a>

                        <form action="{{ route('admin.apparatuses.destroy', $apparatus) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus aparatur ini?')"
                                    class="w-full bg-red-50 text-red-700 px-3 py-2.5 rounded-xl text-sm font-semibold">

                                Hapus

                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="p-12 text-center text-slate-400">
                    Belum ada aparatur.
                </div>

            @endforelse

        </div>

    </div>

</div>

</body>
</html>