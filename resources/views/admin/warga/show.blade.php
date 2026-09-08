<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Warga</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <p class="text-sm font-semibold text-emerald-600">
                Data Kependudukan
            </p>

            <h1 class="text-3xl font-bold text-slate-800 mt-1">
                Detail Warga
            </h1>

            <p class="text-slate-500 mt-1">
                Informasi identitas dan riwayat pelayanan warga.
            </p>
        </div>

        <a href="{{ route('admin.warga.index') }}"
           class="inline-flex items-center justify-center gap-2 bg-slate-800 hover:bg-slate-900 text-white px-5 py-2.5 rounded-xl font-semibold transition">

            <svg class="w-4 h-4"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M15 19l-7-7 7-7"/>
            </svg>

            Kembali
        </a>

    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- SIDEBAR PROFILE --}}
        <div class="space-y-6">

            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                <div class="h-24 bg-gradient-to-r from-emerald-500 to-teal-600"></div>

                <div class="px-6 pb-6">

                    <div class="-mt-10">

                        <div class="w-20 h-20 rounded-2xl bg-white p-1 shadow-md">

                            <div class="w-full h-full rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white flex items-center justify-center text-2xl font-bold">
                                {{ strtoupper(substr($user->name ?? '-', 0, 1)) }}
                            </div>

                        </div>

                    </div>

                    <div class="mt-4">

                        <h2 class="text-xl font-bold text-slate-800">
                            {{ $user->name }}
                        </h2>

                        <p class="text-sm text-slate-400 mt-1">
                            Warga Desa Sidorejo
                        </p>

                    </div>

                    <div class="border-t border-slate-100 mt-5 pt-5 space-y-4">

                        <div>
                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                                NIK
                            </p>

                            <p class="text-sm font-semibold text-slate-700 mt-1">
                                {{ $user->resident->nik ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                                Email
                            </p>

                            <p class="text-sm font-semibold text-slate-700 mt-1 break-all">
                                {{ $user->email ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                                Nomor HP
                            </p>

                            <p class="text-sm font-semibold text-slate-700 mt-1">
                                {{ $user->resident->phone ?? '-' }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            {{-- RINGKASAN --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">

                <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                    Ringkasan Pelayanan
                </p>

                <div class="flex items-center justify-between mt-4">

                    <div>
                        <p class="text-sm text-slate-500">
                            Total Permohonan
                        </p>

                        <p class="text-3xl font-bold text-slate-800 mt-1">
                            {{ $user->letterRequests->count() }}
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                        </svg>

                    </div>

                </div>

            </div>

        </div>

        {{-- MAIN CONTENT --}}
        <div class="xl:col-span-2 space-y-6">

            {{-- DATA PRIBADI --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 bg-slate-50/60">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M20 21a8 8 0 10-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>

                            </svg>

                        </div>

                        <div>
                            <h2 class="font-bold text-lg text-slate-800">
                                Data Pribadi
                            </h2>

                            <p class="text-sm text-slate-400 mt-1">
                                Informasi identitas warga yang tersimpan di sistem.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="border border-slate-200 rounded-xl p-4">

                            <p class="text-xs text-slate-400">
                                Nama Lengkap
                            </p>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $user->name }}
                            </p>

                        </div>

                        <div class="border border-slate-200 rounded-xl p-4">

                            <p class="text-xs text-slate-400">
                                Email
                            </p>

                            <p class="font-semibold text-slate-800 mt-1 break-all">
                                {{ $user->email }}
                            </p>

                        </div>

                        <div class="border border-slate-200 rounded-xl p-4">

                            <p class="text-xs text-slate-400">
                                NIK
                            </p>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $user->resident->nik ?? '-' }}
                            </p>

                        </div>

                        <div class="border border-slate-200 rounded-xl p-4">

                            <p class="text-xs text-slate-400">
                                Nomor KK
                            </p>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $user->resident->no_kk ?? '-' }}
                            </p>

                        </div>

                        <div class="border border-slate-200 rounded-xl p-4">

                            <p class="text-xs text-slate-400">
                                No. HP / WhatsApp
                            </p>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $user->resident->phone ?? '-' }}
                            </p>

                        </div>

                        <div class="border border-slate-200 rounded-xl p-4">

                            <p class="text-xs text-slate-400">
                                Alamat
                            </p>

                            <p class="font-semibold text-slate-800 mt-1 leading-relaxed">
                                {{ $user->resident->address ?? '-' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            {{-- RIWAYAT PERMOHONAN --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">

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
                                <h2 class="font-bold text-lg text-slate-800">
                                    Riwayat Permohonan Surat
                                </h2>

                                <p class="text-sm text-slate-400 mt-1">
                                    Daftar pelayanan surat yang pernah diajukan warga.
                                </p>
                            </div>

                        </div>

                        <span class="inline-flex w-fit bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                            {{ $user->letterRequests->count() }} Permohonan
                        </span>

                    </div>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[760px]">

                        <thead class="bg-slate-50 border-b border-slate-200">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-semibold text-slate-500">
                                    Nomor
                                </th>

                                <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-semibold text-slate-500">
                                    Jenis Surat
                                </th>

                                <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-semibold text-slate-500">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-semibold text-slate-500">
                                    Tanggal
                                </th>

                                <th class="px-6 py-4 text-right text-xs uppercase tracking-wider font-semibold text-slate-500">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @forelse($user->letterRequests as $request)

                                @php
                                    $requestStatus = strtoupper($request->status ?? '');
                                @endphp

                                <tr class="hover:bg-slate-50 transition">

                                    <td class="px-6 py-4">

                                        <p class="font-semibold text-slate-800">
                                            {{ $request->request_number }}
                                        </p>

                                    </td>

                                    <td class="px-6 py-4">

                                        <p class="text-sm text-slate-700">
                                            {{ $request->letterType->name ?? '-' }}
                                        </p>

                                    </td>

                                    <td class="px-6 py-4">

                                        @if($requestStatus === 'MENUNGGU VERIFIKASI')

                                            <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-3 py-1.5 rounded-full">

                                                <span class="w-2 h-2 bg-amber-500 rounded-full"></span>

                                                Menunggu Verifikasi
                                            </span>

                                        @elseif($requestStatus === 'DIPROSES')

                                            <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-3 py-1.5 rounded-full">

                                                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>

                                                Diproses
                                            </span>

                                        @elseif($requestStatus === 'PERLU PERBAIKAN')

                                            <span class="inline-flex items-center gap-2 bg-orange-50 text-orange-700 border border-orange-200 text-xs font-semibold px-3 py-1.5 rounded-full">

                                                <span class="w-2 h-2 bg-orange-500 rounded-full"></span>

                                                Perlu Perbaikan
                                            </span>

                                        @elseif($requestStatus === 'DITOLAK')

                                            <span class="inline-flex items-center gap-2 bg-red-50 text-red-700 border border-red-200 text-xs font-semibold px-3 py-1.5 rounded-full">

                                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>

                                                Ditolak
                                            </span>

                                        @elseif($requestStatus === 'SELESAI')

                                            <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">

                                                <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>

                                                Selesai
                                            </span>

                                        @else

                                            <span class="inline-flex bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                                                {{ $request->status ?? '-' }}
                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-2 text-sm text-slate-500">

                                            <svg class="w-4 h-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-width="2"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M8 7V3m8 4V3M5 11h14M5 5h14v16H5z"/>

                                            </svg>

                                            {{ $request->created_at->format('d M Y') }}

                                        </div>

                                    </td>

                                    <td class="px-6 py-4 text-right">

                                        <a href="{{ route('admin.permohonan.show', $request) }}"
                                           class="inline-flex items-center justify-center gap-2 bg-slate-100 hover:bg-emerald-50 text-slate-600 hover:text-emerald-700 border border-slate-200 hover:border-emerald-200 px-3 py-2 rounded-lg text-sm font-semibold transition">

                                            Detail

                                            <svg class="w-4 h-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-width="2"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M9 18l6-6-6-6"/>

                                            </svg>

                                        </a>

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
                                                      d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                                            </svg>

                                        </div>

                                        <p class="font-semibold text-slate-700 mt-4">
                                            Belum Ada Permohonan
                                        </p>

                                        <p class="text-sm text-slate-400 mt-1">
                                            Warga ini belum pernah mengajukan surat.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>