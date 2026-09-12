<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Warga</title>
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
                    Layanan Pengaduan
                </div>

                <h1 class="text-3xl sm:text-4xl font-bold mt-4">
                    Pengaduan Warga
                </h1>

                <p class="text-blue-100 mt-2 max-w-2xl">
                    Kelola dan tindak lanjuti pengaduan yang dikirim oleh warga Desa Sidorejo.
                </p>

            </div>

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

        </div>

    </div>


    {{-- LIST --}}
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

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
                                  d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                        </svg>

                    </div>

                    <div>

                        <h2 class="font-bold text-lg">
                            Semua Pengaduan
                        </h2>

                        <p class="text-sm text-slate-400 mt-0.5">
                            Daftar laporan dan pengaduan dari warga.
                        </p>

                    </div>

                </div>

                <span class="inline-flex items-center gap-2 w-fit bg-orange-50 text-orange-700 border border-orange-100 text-xs font-bold px-3 py-2 rounded-full">

                    <span class="w-2 h-2 bg-orange-500 rounded-full"></span>

                    {{ $complaints->count() }} Pengaduan

                </span>

            </div>

        </div>


        {{-- DESKTOP --}}
        <div class="hidden md:block overflow-x-auto">

            <table class="w-full min-w-[950px]">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Warga
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Judul
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Kategori
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Tanggal
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($complaints as $complaint)

                        @php
                            $status = strtoupper($complaint->status ?? '');
                        @endphp

                        <tr class="hover:bg-orange-50/30 transition">

                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold text-sm flex-shrink-0">
                                        {{ strtoupper(substr($complaint->user->name ?? '-', 0, 1)) }}
                                    </div>

                                    <div>

                                        <p class="font-semibold text-sm text-slate-800">
                                            {{ $complaint->user->name ?? '-' }}
                                        </p>

                                        <p class="text-xs text-slate-400 mt-1">
                                            Warga
                                        </p>

                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-4">

                                <p class="font-semibold text-sm text-slate-800">
                                    {{ $complaint->title }}
                                </p>

                            </td>

                            <td class="px-6 py-4">

                                <span class="inline-flex bg-slate-100 text-slate-600 border border-slate-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    {{ $complaint->category }}
                                </span>

                            </td>

                            <td class="px-6 py-4">

                                @if($status === 'MENUNGGU')

                                    <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                        Menunggu
                                    </span>

                                @elseif($status === 'DIPROSES')

                                    <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                        Diproses
                                    </span>

                                @elseif($status === 'SELESAI')

                                    <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                                        Selesai
                                    </span>

                                @else

                                    <span class="inline-flex bg-slate-100 text-slate-600 border border-slate-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        {{ $complaint->status ?? '-' }}
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <p class="text-sm text-slate-700">
                                    {{ $complaint->created_at->format('d M Y') }}
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    {{ $complaint->created_at->format('H:i') }}
                                </p>

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-end">

                                    <a href="{{ route('admin.complaints.show', $complaint) }}"
                                       class="inline-flex items-center justify-center gap-2 bg-orange-600 hover:bg-orange-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition">

                                        <svg class="w-4 h-4"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-width="2"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M15 12H9m3-3l3 3-3 3"/>

                                        </svg>

                                        Detail

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="px-6 py-16 text-center">

                                <div class="w-14 h-14 bg-orange-50 text-orange-400 rounded-2xl flex items-center justify-center mx-auto mb-4">

                                    <svg class="w-6 h-6"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                                    </svg>

                                </div>

                                <p class="font-semibold text-slate-600">
                                    Belum ada pengaduan
                                </p>

                                <p class="text-sm text-slate-400 mt-1">
                                    Pengaduan dari warga akan tampil di halaman ini.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- MOBILE --}}
        <div class="md:hidden divide-y divide-slate-100">

            @forelse($complaints as $complaint)

                @php
                    $status = strtoupper($complaint->status ?? '');
                @endphp

                <div class="p-4 sm:p-5">

                    <div class="flex items-start gap-3">

                        <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold flex-shrink-0">
                            {{ strtoupper(substr($complaint->user->name ?? '-', 0, 1)) }}
                        </div>

                        <div class="min-w-0 flex-1">

                            <p class="font-bold text-slate-800 truncate">
                                {{ $complaint->user->name ?? '-' }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Warga
                            </p>

                        </div>

                    </div>


                    <div class="mt-4">

                        <h3 class="font-semibold text-slate-800">
                            {{ $complaint->title }}
                        </h3>

                        <div class="flex flex-wrap items-center gap-2 mt-3">

                            <span class="inline-flex bg-slate-100 text-slate-600 border border-slate-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                {{ $complaint->category }}
                            </span>

                            @if($status === 'MENUNGGU')

                                <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                    Menunggu
                                </span>

                            @elseif($status === 'DIPROSES')

                                <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                    Diproses
                                </span>

                            @elseif($status === 'SELESAI')

                                <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                                    Selesai
                                </span>

                            @else

                                <span class="inline-flex bg-slate-100 text-slate-600 border border-slate-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    {{ $complaint->status ?? '-' }}
                                </span>

                            @endif

                        </div>

                    </div>


                    <div class="bg-slate-50 border border-slate-100 rounded-xl p-3 mt-4">

                        <p class="text-xs text-slate-400">
                            Tanggal Pengaduan
                        </p>

                        <p class="font-semibold text-slate-700 mt-1">
                            {{ $complaint->created_at->format('d M Y') }}
                        </p>

                        <p class="text-xs text-slate-400 mt-0.5">
                            {{ $complaint->created_at->format('H:i') }}
                        </p>

                    </div>


                    <a href="{{ route('admin.complaints.show', $complaint) }}"
                       class="w-full inline-flex items-center justify-center gap-2 bg-orange-600 hover:bg-orange-700 text-white text-sm font-semibold px-4 py-3 rounded-xl mt-4 transition">

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M15 12H9m3-3l3 3-3 3"/>

                        </svg>
                        Lihat Detail Pengaduan
                    </a>
                </div>

            @empty

                <div class="py-16 px-6 text-center">

                    <div class="w-14 h-14 bg-orange-50 text-orange-400 rounded-2xl flex items-center justify-center mx-auto mb-4">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                        </svg>
                    </div>

                    <p class="font-semibold text-slate-600">
                        Belum ada pengaduan
                    </p>

                    <p class="text-sm text-slate-400 mt-1">
                        Pengaduan dari warga akan tampil di halaman ini.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

</body>

</html>
