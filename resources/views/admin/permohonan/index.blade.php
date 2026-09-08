<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Permohonan Surat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-8 px-4">

    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
        <div>
            <p class="text-sm text-slate-400">Administrasi Surat</p>
            <h1 class="text-3xl font-bold mt-1">Daftar Permohonan Surat</h1>
            <p class="text-slate-500 mt-1">
                Periksa dan kelola permohonan surat yang diajukan warga.
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

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200 flex justify-between items-center">
            <div>
                <h2 class="font-bold text-lg">Semua Permohonan</h2>
                <p class="text-sm text-slate-400 mt-1">
                    Total {{ $requests->count() }} permohonan
                </p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px]">

                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">No. Permohonan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Nama Warga</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Jenis Surat</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Status</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($requests as $request)

                        @php
                            $status = strtolower($request->status ?? '');
                        @endphp

                        <tr class="hover:bg-slate-50 transition">

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
                                    <div class="w-9 h-9 rounded-full bg-green-100 text-green-700 flex items-center justify-center font-bold text-sm">
                                        {{ strtoupper(substr($request->user->name ?? '-', 0, 1)) }}
                                    </div>
                                    <span class="text-sm font-medium">
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
                                    <span class="inline-flex items-center gap-2 bg-green-50 text-green-700 border border-green-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                        Selesai
                                    </span>

                                @else
                                    <span class="inline-flex bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                                        {{ $request->status ?? 'Tidak diketahui' }}
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.permohonan.show', $request) }}"
                                   class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m3-3l3 3-3 3"/>
                                    </svg>
                                    Detail
                                </a>
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <div class="w-14 h-14 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>
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
    </div>

</div>

</body>
</html>