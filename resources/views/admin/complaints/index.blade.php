<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Warga</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-8 px-4">

    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
        <div>
            <p class="text-sm text-slate-400">Layanan Pengaduan</p>
            <h1 class="text-3xl font-bold mt-1">Pengaduan Warga</h1>
            <p class="text-slate-500 mt-1">
                Kelola dan tindak lanjuti pengaduan yang dikirim oleh warga.
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-900 text-white px-5 py-2.5 rounded-xl transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
            Dashboard
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
            <div>
                <h2 class="font-bold text-lg">Semua Pengaduan</h2>
                <p class="text-sm text-slate-400 mt-1">
                    Total {{ $complaints->count() }} pengaduan
                </p>
            </div>
        </div>

        <div class="overflow-x-auto">
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
                        <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($complaints as $complaint)

                        @php
                            $status = strtoupper($complaint->status ?? '');
                        @endphp

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-green-100 text-green-700 flex items-center justify-center font-bold text-sm">
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
                                <span class="inline-flex bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
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
                                    <span class="inline-flex items-center gap-2 bg-green-50 text-green-700 border border-green-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                        Selesai
                                    </span>

                                @else
                                    <span class="inline-flex bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
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

                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.complaints.show', $complaint) }}"
                                   class="inline-flex items-center gap-2 bg-orange-600 hover:bg-orange-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m3-3l3 3-3 3"/>
                                    </svg>
                                    Detail
                                </a>
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="w-14 h-14 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>
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
    </div>

</div>

</body>
</html>