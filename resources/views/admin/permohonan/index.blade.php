<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Permohonan Surat</title>

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
                    Administrasi Surat
                </div>

                <h1 class="text-3xl sm:text-4xl font-bold mt-4">
                    Daftar Permohonan Surat
                </h1>

                <p class="text-blue-100 mt-2 max-w-2xl">
                    Periksa dan kelola permohonan surat yang diajukan oleh warga Desa Sidorejo.
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


    {{-- LIST --}}
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                        </svg>

                    </div>

                    <div>

                        <h2 class="font-bold text-lg">
                            Semua Permohonan
                        </h2>

                        <p class="text-sm text-slate-400 mt-0.5">
                            Daftar permohonan surat dari warga.
                        </p>

                    </div>

                </div>

                <span class="inline-flex items-center gap-2 w-fit bg-sky-50 text-sky-700 border border-sky-100 text-xs font-bold px-3 py-2 rounded-full">

                    <span class="w-2 h-2 bg-sky-500 rounded-full"></span>

                    {{ $requests->count() }} Permohonan

                </span>

            </div>

        </div>


        {{-- DESKTOP --}}
        <div class="hidden md:block overflow-x-auto">

            <table class="w-full min-w-[1000px]">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            No
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            No. Permohonan
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Nama Warga
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Jenis Surat
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Tanggal
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($requests as $request)

                        @php
                            $status = strtolower($request->status ?? '');
                        @endphp

                        <tr class="hover:bg-sky-50/40 transition">

                            <td class="px-6 py-4 text-sm text-slate-500">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">

                                <p class="font-semibold text-sm text-slate-800">
                                    {{ $request->request_number ?? '-' }}
                                </p>

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold text-sm flex-shrink-0">
                                        {{ strtoupper(substr($request->user->name ?? '-', 0, 1)) }}
                                    </div>

                                    <span class="text-sm font-medium text-slate-700">
                                        {{ $request->user->name ?? '-' }}
                                    </span>

                                </div>

                            </td>

                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ $request->letterType->name ?? '-' }}
                            </td>

                            <td class="px-6 py-4">

                                <p class="text-sm text-slate-700">
                                    {{ $request->created_at?->format('d M Y') ?? '-' }}
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    {{ $request->created_at?->format('H:i') ?? '-' }}
                                </p>

                            </td>

                            <td class="px-6 py-4">

                                @if($status === 'menunggu verifikasi')

                                    <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                        Menunggu Verifikasi
                                    </span>

                                @elseif($status === 'diproses')

                                    <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                        Diproses
                                    </span>

                                @elseif($status === 'perlu perbaikan')

                                    <span class="inline-flex items-center gap-2 bg-orange-50 text-orange-700 border border-orange-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                                        Perlu Perbaikan
                                    </span>

                                @elseif($status === 'ditolak')

                                    <span class="inline-flex items-center gap-2 bg-red-50 text-red-700 border border-red-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                        Ditolak
                                    </span>

                                @elseif($status === 'selesai')

                                    <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                                        Selesai
                                    </span>

                                @else

                                    <span class="inline-flex bg-slate-100 text-slate-600 border border-slate-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        {{ $request->status ?? 'Tidak diketahui' }}
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-end">

                                    <a href="{{ route('admin.permohonan.show', $request) }}"
                                       class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition">

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

                            <td colspan="7" class="px-6 py-16 text-center">

                                <div class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-4">

                                    <svg class="w-6 h-6 text-slate-400"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                                    </svg>

                                </div>

                                <p class="font-semibold text-slate-600">
                                    Belum ada permohonan
                                </p>

                                <p class="text-sm text-slate-400 mt-1">
                                    Permohonan surat dari warga akan tampil di sini.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- MOBILE --}}
        <div class="md:hidden divide-y divide-slate-100">

            @forelse($requests as $request)

                @php
                    $status = strtolower($request->status ?? '');
                @endphp

                <div class="p-4 sm:p-5">

                    <div class="flex items-start gap-3">

                        <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold flex-shrink-0">
                            {{ strtoupper(substr($request->user->name ?? '-', 0, 1)) }}
                        </div>

                        <div class="min-w-0 flex-1">

                            <p class="font-bold text-slate-800 truncate">
                                {{ $request->user->name ?? '-' }}
                            </p>

                            <p class="text-sm text-slate-500 mt-1">
                                {{ $request->letterType->name ?? '-' }}
                            </p>

                        </div>

                    </div>


                    <div class="grid grid-cols-2 gap-3 mt-4 text-sm">

                        <div class="bg-slate-50 rounded-xl p-3">

                            <p class="text-xs text-slate-400">
                                No. Permohonan
                            </p>

                            <p class="font-semibold text-slate-700 mt-1 break-all">
                                {{ $request->request_number ?? '-' }}
                            </p>

                        </div>

                        <div class="bg-slate-50 rounded-xl p-3">

                            <p class="text-xs text-slate-400">
                                Tanggal
                            </p>

                            <p class="font-semibold text-slate-700 mt-1">
                                {{ $request->created_at?->format('d M Y') ?? '-' }}
                            </p>

                            <p class="text-xs text-slate-400 mt-0.5">
                                {{ $request->created_at?->format('H:i') ?? '-' }}
                            </p>

                        </div>

                    </div>


                    <div class="mt-4">

                        @if($status === 'menunggu verifikasi')

                            <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                Menunggu Verifikasi
                            </span>

                        @elseif($status === 'diproses')

                            <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                Diproses
                            </span>

                        @elseif($status === 'perlu perbaikan')

                            <span class="inline-flex items-center gap-2 bg-orange-50 text-orange-700 border border-orange-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                                Perlu Perbaikan
                            </span>

                        @elseif($status === 'ditolak')

                            <span class="inline-flex items-center gap-2 bg-red-50 text-red-700 border border-red-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                Ditolak
                            </span>

                        @elseif($status === 'selesai')

                            <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                                Selesai
                            </span>

                        @else

                            <span class="inline-flex bg-slate-100 text-slate-600 border border-slate-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                {{ $request->status ?? 'Tidak diketahui' }}
                            </span>

                        @endif

                    </div>


                    <a href="{{ route('admin.permohonan.show', $request) }}"
                       class="w-full inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-3 rounded-xl mt-4 transition">

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M15 12H9m3-3l3 3-3 3"/>

                        </svg>

                        Lihat Detail

                    </a>

                </div>

            @empty

                <div class="py-16 px-6 text-center">

                    <div class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-4">

                        <svg class="w-6 h-6 text-slate-400"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                        </svg>

                    </div>

                    <p class="font-semibold text-slate-600">
                        Belum ada permohonan
                    </p>

                    <p class="text-sm text-slate-400 mt-1">
                        Permohonan surat dari warga akan tampil di sini.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

</body>

</html>
