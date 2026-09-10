<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Pengumuman</title>

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
                    Kelola Pengumuman
                </h1>

                <p class="text-blue-100 mt-2 max-w-2xl">
                    Kelola informasi dan pemberitahuan penting yang tampil di website Desa Sidorejo.
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

                <a href="{{ route('admin.announcements.create') }}"
                   class="inline-flex items-center justify-center gap-2 bg-white text-blue-700 hover:bg-blue-50 px-5 py-3 rounded-xl font-bold transition shadow-sm">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 5v14M5 12h14"/>

                    </svg>

                    Tambah Pengumuman

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


    {{-- LIST CARD --}}
    <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

        <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center flex-shrink-0">

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

                        <h2 class="font-bold text-lg">
                            Daftar Pengumuman
                        </h2>

                        <p class="text-sm text-slate-400 mt-0.5">
                            Semua pengumuman yang telah dibuat.
                        </p>

                    </div>

                </div>

                <span class="inline-flex items-center gap-2 w-fit bg-orange-50 text-orange-700 border border-orange-100 text-xs font-bold px-3 py-2 rounded-full">

                    <span class="w-2 h-2 bg-orange-500 rounded-full"></span>

                    {{ $announcements->total() }} Pengumuman

                </span>

            </div>

        </div>


        {{-- LIST --}}
        <div class="divide-y divide-slate-100">

            @forelse($announcements as $announcement)

                <div class="p-5 sm:p-6 hover:bg-orange-50/30 transition">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                        <div class="flex gap-4 min-w-0">

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

                            <div class="min-w-0">

                                <div class="flex items-center gap-2 flex-wrap">

                                    <h3 class="font-bold text-slate-800 break-words">
                                        {{ $announcement->title }}
                                    </h3>

                                    @if($announcement->status === 'published')

                                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-2.5 py-1 rounded-full">

                                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>

                                            Published

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-2.5 py-1 rounded-full">

                                            <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>

                                            Draft

                                        </span>

                                    @endif

                                </div>

                                <p class="text-sm text-slate-500 mt-2 leading-relaxed break-words">
                                    {{ \Illuminate\Support\Str::limit($announcement->content, 170) }}
                                </p>

                                <div class="flex items-center gap-2 text-xs text-slate-400 mt-3">

                                    <svg class="w-4 h-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <circle cx="12" cy="12" r="9" stroke-width="2"/>
                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M12 7v5l3 2"/>

                                    </svg>

                                    {{ ($announcement->published_at ?? $announcement->created_at)->format('d M Y, H:i') }}

                                </div>

                            </div>

                        </div>


                        <div class="flex items-center gap-2 lg:flex-shrink-0">

                            <a href="{{ route('admin.announcements.edit', $announcement) }}"
                               class="flex-1 lg:flex-none inline-flex items-center justify-center gap-2 bg-orange-50 hover:bg-orange-100 text-orange-700 border border-orange-100 px-4 py-2.5 rounded-xl text-sm font-semibold transition">

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

                            <form action="{{ route('admin.announcements.destroy', $announcement) }}"
                                  method="POST"
                                  class="flex-1 lg:flex-none">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus pengumuman ini?')"
                                        class="w-full inline-flex items-center justify-center gap-2 bg-red-50 hover:bg-red-100 text-red-700 border border-red-100 px-4 py-2.5 rounded-xl text-sm font-semibold transition">

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

                </div>

            @empty

                <div class="py-16 px-6 text-center">

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

                    <h3 class="font-bold text-lg text-slate-700 mt-4">
                        Belum Ada Pengumuman
                    </h3>

                    <p class="text-sm text-slate-400 mt-2">
                        Tambahkan pengumuman pertama untuk website desa.
                    </p>

                </div>

            @endforelse

        </div>


        {{-- PAGINATION --}}
        @if($announcements->hasPages())

            <div class="px-5 sm:px-6 py-4 border-t border-slate-200">
                {{ $announcements->links() }}
            </div>

        @endif

    </div>

</div>

</body>

</html>
