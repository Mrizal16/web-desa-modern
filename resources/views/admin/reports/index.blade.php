<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-8 px-4">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
        <div>
            <p class="text-sm text-slate-400">Rekap Pelayanan Desa</p>
            <h1 class="text-3xl font-bold mt-1">Laporan Administrasi</h1>
            <p class="text-slate-500 mt-1">
                Pantau rekap permohonan surat, pengaduan, dan data warga.
            </p>
        </div>

        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.reports.print', [
                'start_date' => $startDate ?? '',
                'end_date' => $endDate ?? ''
            ]) }}"
               target="_blank"
               class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-xl transition">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2M6 14h12v8H6z"/>
                </svg>

                Cetak / PDF
            </a>

            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-900 text-white px-5 py-2.5 rounded-xl transition">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>

                Dashboard
            </a>
        </div>
    </div>

    {{-- FILTER --}}
    <div class="bg-white border border-slate-200 rounded-2xl p-6 mb-8 shadow-sm">
        <div class="mb-5">
            <h2 class="font-bold text-lg">Filter Laporan</h2>
            <p class="text-sm text-slate-400 mt-1">
                Pilih periode untuk menampilkan rekap tertentu.
            </p>
        </div>

        <form method="GET"
              action="{{ route('admin.reports.index') }}"
              class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

            <div>
                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Dari Tanggal
                </label>

                <input type="date"
                       name="start_date"
                       value="{{ $startDate ?? '' }}"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:border-purple-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Sampai Tanggal
                </label>

                <input type="date"
                       name="end_date"
                       value="{{ $endDate ?? '' }}"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:border-purple-400">
            </div>

            <button type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2.5 rounded-xl font-semibold transition">
                Tampilkan
            </button>

            <a href="{{ route('admin.reports.index') }}"
               class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-5 py-2.5 rounded-xl text-center font-semibold transition">
                Reset
            </a>
        </form>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">

        <div class="bg-white border border-slate-200 rounded-2xl p-5">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-slate-500">Total Warga</p>
                    <h2 class="text-3xl font-bold mt-2">
                        {{ $stats['total_residents'] }}
                    </h2>
                </div>

                <div class="w-11 h-11 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m7-10a4 4 0 100-8 4 4 0 000 8"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-5">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-slate-500">Total Permohonan</p>
                    <h2 class="text-3xl font-bold mt-2">
                        {{ $stats['total_letters'] }}
                    </h2>
                </div>

                <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-5">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-slate-500">Surat Selesai</p>
                    <h2 class="text-3xl font-bold text-green-600 mt-2">
                        {{ $stats['completed_letters'] }}
                    </h2>
                </div>

                <div class="w-11 h-11 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">
                    ✓
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-5">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-slate-500">Surat Ditolak</p>
                    <h2 class="text-3xl font-bold text-red-600 mt-2">
                        {{ $stats['rejected_letters'] }}
                    </h2>
                </div>

                <div class="w-11 h-11 rounded-xl bg-red-100 text-red-600 flex items-center justify-center">
                    ×
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-5">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-slate-500">Total Pengaduan</p>
                    <h2 class="text-3xl font-bold mt-2">
                        {{ $stats['total_complaints'] }}
                    </h2>
                </div>

                <div class="w-11 h-11 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-5">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-slate-500">Pengaduan Selesai</p>
                    <h2 class="text-3xl font-bold text-green-600 mt-2">
                        {{ $stats['completed_complaints'] }}
                    </h2>
                </div>

                <div class="w-11 h-11 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center">
                    ✓
                </div>
            </div>
        </div>

    </div>

    {{-- PERMOHONAN SURAT --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm mb-8">
        <div class="px-6 py-5 border-b border-slate-200">
            <h2 class="font-bold text-lg">Permohonan Surat</h2>
            <p class="text-sm text-slate-400 mt-1">
                Daftar permohonan berdasarkan periode laporan.
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[850px]">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-5 py-4 text-left text-xs uppercase tracking-wider text-slate-500">Nomor</th>
                        <th class="px-5 py-4 text-left text-xs uppercase tracking-wider text-slate-500">Warga</th>
                        <th class="px-5 py-4 text-left text-xs uppercase tracking-wider text-slate-500">Jenis Surat</th>
                        <th class="px-5 py-4 text-left text-xs uppercase tracking-wider text-slate-500">Status</th>
                        <th class="px-5 py-4 text-left text-xs uppercase tracking-wider text-slate-500">Tanggal</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($latestLetters as $request)
                        @php
                            $status = strtoupper($request->status ?? '');
                        @endphp

                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-4 font-semibold text-sm">
                                {{ $request->request_number }}
                            </td>

                            <td class="px-5 py-4 text-sm">
                                {{ $request->user->name ?? '-' }}
                            </td>

                            <td class="px-5 py-4 text-sm text-slate-600">
                                {{ $request->letterType->name ?? '-' }}
                            </td>

                            <td class="px-5 py-4">
                                @if($status === 'SELESAI')
                                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Selesai
                                    </span>
                                @elseif($status === 'DITOLAK')
                                    <span class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Ditolak
                                    </span>
                                @elseif($status === 'DIPROSES')
                                    <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Diproses
                                    </span>
                                @elseif($status === 'PERLU PERBAIKAN')
                                    <span class="bg-orange-100 text-orange-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Perlu Perbaikan
                                    </span>
                                @else
                                    <span class="bg-amber-100 text-amber-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $request->status }}
                                    </span>
                                @endif
                            </td>

                            <td class="px-5 py-4">
                                <p class="text-sm">{{ $request->created_at->format('d M Y') }}</p>
                                <p class="text-xs text-slate-400 mt-1">{{ $request->created_at->format('H:i') }}</p>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-12 text-center text-slate-400">
                                Belum ada permohonan pada periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- PENGADUAN --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="px-6 py-5 border-b border-slate-200">
            <h2 class="font-bold text-lg">Pengaduan Warga</h2>
            <p class="text-sm text-slate-400 mt-1">
                Daftar pengaduan berdasarkan periode laporan.
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[850px]">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-5 py-4 text-left text-xs uppercase tracking-wider text-slate-500">Warga</th>
                        <th class="px-5 py-4 text-left text-xs uppercase tracking-wider text-slate-500">Judul</th>
                        <th class="px-5 py-4 text-left text-xs uppercase tracking-wider text-slate-500">Kategori</th>
                        <th class="px-5 py-4 text-left text-xs uppercase tracking-wider text-slate-500">Status</th>
                        <th class="px-5 py-4 text-left text-xs uppercase tracking-wider text-slate-500">Tanggal</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($latestComplaints as $complaint)
                        @php
                            $status = strtoupper($complaint->status ?? '');
                        @endphp

                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-4 font-semibold text-sm">
                                {{ $complaint->user->name ?? '-' }}
                            </td>

                            <td class="px-5 py-4 text-sm">
                                {{ $complaint->title }}
                            </td>

                            <td class="px-5 py-4">
                                <span class="bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $complaint->category }}
                                </span>
                            </td>

                            <td class="px-5 py-4">
                                @if($status === 'MENUNGGU')
                                    <span class="bg-amber-100 text-amber-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Menunggu
                                    </span>
                                @elseif($status === 'DIPROSES')
                                    <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Diproses
                                    </span>
                                @elseif($status === 'SELESAI')
                                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Selesai
                                    </span>
                                @else
                                    <span class="bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $complaint->status }}
                                    </span>
                                @endif
                            </td>

                            <td class="px-5 py-4">
                                <p class="text-sm">{{ $complaint->created_at->format('d M Y') }}</p>
                                <p class="text-xs text-slate-400 mt-1">{{ $complaint->created_at->format('H:i') }}</p>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-12 text-center text-slate-400">
                                Belum ada pengaduan pada periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>