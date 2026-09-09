<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Kelola Pengumuman</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>

            <p class="text-sm font-semibold text-orange-600">
                Website Desa
            </p>

            <h1 class="text-3xl font-bold mt-1">
                Kelola Pengumuman
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola informasi dan pemberitahuan Desa Sidorejo.
            </p>

        </div>

        <a href="{{ route('admin.announcements.create') }}"
           class="inline-flex items-center justify-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-5 py-3 rounded-xl font-semibold">

            <svg class="w-5 h-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-width="2"
                      stroke-linecap="round"
                      d="M12 5v14M5 12h14"/>

            </svg>

            Tambah Pengumuman

        </a>

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

        <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">

            <div>

                <h2 class="font-bold text-lg">
                    Daftar Pengumuman
                </h2>

                <p class="text-sm text-slate-400 mt-1">
                    Semua pengumuman yang telah dibuat.
                </p>

            </div>

            <span class="bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                {{ $announcements->total() }} Pengumuman
            </span>

        </div>


        <div class="divide-y divide-slate-100">

            @forelse($announcements as $announcement)

                <div class="p-5 sm:p-6">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                        <div class="flex gap-4">

                            <div class="w-11 h-11 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center flex-shrink-0">

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

                            <div>

                                <div class="flex items-center gap-2 flex-wrap">

                                    <h3 class="font-bold text-slate-800">
                                        {{ $announcement->title }}
                                    </h3>

                                    @if($announcement->status === 'published')

                                        <span class="bg-emerald-50 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                            Published
                                        </span>

                                    @else

                                        <span class="bg-amber-50 text-amber-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                            Draft
                                        </span>

                                    @endif

                                </div>

                                <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                                    {{ \Illuminate\Support\Str::limit($announcement->content, 170) }}
                                </p>

                                <p class="text-xs text-slate-400 mt-2">
                                    {{ ($announcement->published_at ?? $announcement->created_at)->format('d M Y, H:i') }}
                                </p>

                            </div>

                        </div>


                        <div class="flex items-center gap-2">

                            <a href="{{ route('admin.announcements.edit', $announcement) }}"
                               class="flex-1 lg:flex-none text-center bg-orange-50 hover:bg-orange-100 text-orange-700 px-4 py-2.5 rounded-xl text-sm font-semibold">

                                Edit

                            </a>

                            <form action="{{ route('admin.announcements.destroy', $announcement) }}"
                                  method="POST"
                                  class="flex-1 lg:flex-none">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus pengumuman ini?')"
                                        class="w-full bg-red-50 hover:bg-red-100 text-red-700 px-4 py-2.5 rounded-xl text-sm font-semibold">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="py-14 px-6 text-center">

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
                        Tambahkan pengumuman pertama untuk website desa.
                    </p>

                </div>

            @endforelse

        </div>


        @if($announcements->hasPages())

            <div class="px-6 py-4 border-t border-slate-200">

                {{ $announcements->links() }}

            </div>

        @endif

    </div>

</div>

</body>
</html>