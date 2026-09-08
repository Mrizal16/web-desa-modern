<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-7xl mx-auto py-8 px-4">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
        <div>
            <p class="text-sm text-gray-500 mb-1">Sistem Informasi Desa</p>
            <h1 class="text-3xl font-bold text-gray-800">
                Dashboard Admin
            </h1>
            <p class="text-gray-500 mt-1">
                Selamat datang,
                <span class="font-semibold text-gray-700">
                    {{ auth()->user()->name }}
                </span>
            </p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="bg-red-500 hover:bg-red-600 text-white px-5 py-2.5 rounded-lg">
                Logout
            </button>
        </form>
    </div>

    {{-- STATISTIK UTAMA --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

        <div class="bg-white border rounded-xl p-5 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Total Warga</p>
                    <h2 class="text-3xl font-bold mt-2">
                        {{ $stats['total_warga'] }}
                    </h2>
                </div>

                <div class="w-11 h-11 rounded-lg bg-green-100 text-green-600 flex items-center justify-center">
                    👥
                </div>
            </div>
        </div>

        <div class="bg-white border rounded-xl p-5 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Menunggu Verifikasi</p>
                    <h2 class="text-3xl font-bold mt-2 text-yellow-600">
                        {{ $stats['menunggu'] }}
                    </h2>
                </div>

                <div class="w-11 h-11 rounded-lg bg-yellow-100 flex items-center justify-center">
                    ⏳
                </div>
            </div>
        </div>

        <div class="bg-white border rounded-xl p-5 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Diproses</p>
                    <h2 class="text-3xl font-bold mt-2 text-blue-600">
                        {{ $stats['diproses'] }}
                    </h2>
                </div>

                <div class="w-11 h-11 rounded-lg bg-blue-100 flex items-center justify-center">
                    ⚙️
                </div>
            </div>
        </div>

        <div class="bg-white border rounded-xl p-5 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Selesai</p>
                    <h2 class="text-3xl font-bold mt-2 text-green-600">
                        {{ $stats['selesai'] }}
                    </h2>
                </div>

                <div class="w-11 h-11 rounded-lg bg-green-100 flex items-center justify-center">
                    ✓
                </div>
            </div>
        </div>

    </div>

    {{-- STATUS TAMBAHAN --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

        <div class="bg-white border rounded-xl p-5 shadow-sm">
            <p class="text-gray-500 text-sm">Perlu Perbaikan</p>
            <h2 class="text-2xl font-bold text-orange-600 mt-2">
                {{ $stats['perbaikan'] }}
            </h2>
        </div>

        <div class="bg-white border rounded-xl p-5 shadow-sm">
            <p class="text-gray-500 text-sm">Ditolak</p>
            <h2 class="text-2xl font-bold text-red-600 mt-2">
                {{ $stats['ditolak'] }}
            </h2>
        </div>

        <div class="bg-white border rounded-xl p-5 shadow-sm">
            <p class="text-gray-500 text-sm">Total Pengaduan</p>
            <h2 class="text-2xl font-bold text-purple-600 mt-2">
                {{ $stats['pengaduan'] }}
            </h2>
        </div>

    </div>

    {{-- MENU UTAMA --}}
    <div class="mb-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4">
            Menu Utama
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

            <a href="{{ route('admin.permohonan.index') }}"
               class="bg-white border rounded-xl p-5 hover:shadow-md transition">
                <div class="w-11 h-11 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4">
                    📄
                </div>
                <h3 class="font-bold text-gray-800">
                    Permohonan Surat
                </h3>
                <p class="text-sm text-gray-500 mt-2">
                    Verifikasi dan proses pengajuan surat warga.
                </p>
            </a>

            <a href="{{ route('admin.warga.index') }}"
               class="bg-white border rounded-xl p-5 hover:shadow-md transition">
                <div class="w-11 h-11 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mb-4">
                    👥
                </div>
                <h3 class="font-bold text-gray-800">
                    Data Warga
                </h3>
                <p class="text-sm text-gray-500 mt-2">
                    Lihat data warga yang terdaftar.
                </p>
            </a>

            <a href="{{ route('admin.complaints.index') }}"
               class="bg-white border rounded-xl p-5 hover:shadow-md transition">
                <div class="w-11 h-11 bg-orange-100 text-orange-600 rounded-lg flex items-center justify-center mb-4">
                    💬
                </div>
                <h3 class="font-bold text-gray-800">
                    Pengaduan
                </h3>
                <p class="text-sm text-gray-500 mt-2">
                    Tindak lanjuti pengaduan warga.
                </p>
            </a>

            <a href="{{ route('admin.reports.index') }}"
               class="bg-white border rounded-xl p-5 hover:shadow-md transition">
                <div class="w-11 h-11 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center mb-4">
                    📊
                </div>
                <h3 class="font-bold text-gray-800">
                    Laporan
                </h3>
                <p class="text-sm text-gray-500 mt-2">
                    Lihat rekap pelayanan administrasi.
                </p>
            </a>

        </div>
    </div>

    {{-- DATA TERBARU --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- PERMOHONAN TERBARU --}}
        <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
            <div class="p-5 border-b flex justify-between items-center">
                <h2 class="font-bold text-lg text-gray-800">
                    Permohonan Terbaru
                </h2>

                <a href="{{ route('admin.permohonan.index') }}"
                   class="text-sm text-blue-600 font-semibold">
                    Lihat Semua
                </a>
            </div>

            <div class="divide-y">
                @forelse($latestRequests as $request)

                    <a href="{{ route('admin.permohonan.show', $request) }}"
                       class="block p-5 hover:bg-gray-50">

                        <div class="flex justify-between gap-4">

                            <div>
                                <p class="font-semibold text-gray-800">
                                    {{ $request->user->name ?? '-' }}
                                </p>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $request->letterType->name ?? '-' }}
                                </p>

                                <p class="text-xs text-gray-400 mt-2">
                                    {{ $request->created_at->format('d-m-Y H:i') }}
                                </p>
                            </div>

                            <div>
                                @if($request->status === 'MENUNGGU VERIFIKASI')
                                    <span class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full">
                                        Menunggu
                                    </span>
                                @elseif($request->status === 'DIPROSES')
                                    <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full">
                                        Diproses
                                    </span>
                                @elseif($request->status === 'SELESAI')
                                    <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">
                                        Selesai
                                    </span>
                                @elseif($request->status === 'DITOLAK')
                                    <span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full">
                                        Ditolak
                                    </span>
                                @else
                                    <span class="bg-orange-100 text-orange-700 text-xs px-3 py-1 rounded-full">
                                        {{ $request->status }}
                                    </span>
                                @endif
                            </div>

                        </div>

                    </a>

                @empty

                    <div class="p-8 text-center text-gray-500">
                        Belum ada permohonan.
                    </div>

                @endforelse
            </div>
        </div>

        {{-- PENGADUAN TERBARU --}}
        <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
            <div class="p-5 border-b flex justify-between items-center">
                <h2 class="font-bold text-lg text-gray-800">
                    Pengaduan Terbaru
                </h2>

                <a href="{{ route('admin.complaints.index') }}"
                   class="text-sm text-orange-600 font-semibold">
                    Lihat Semua
                </a>
            </div>

            <div class="divide-y">
                @forelse($latestComplaints as $complaint)

                    <a href="{{ route('admin.complaints.show', $complaint) }}"
                       class="block p-5 hover:bg-gray-50">

                        <div class="flex justify-between gap-4">

                            <div>
                                <p class="font-semibold text-gray-800">
                                    {{ $complaint->title }}
                                </p>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $complaint->user->name ?? '-' }}
                                    ·
                                    {{ $complaint->category }}
                                </p>

                                <p class="text-xs text-gray-400 mt-2">
                                    {{ $complaint->created_at->format('d-m-Y H:i') }}
                                </p>
                            </div>

                            <div>
                                @if($complaint->status === 'MENUNGGU')
                                    <span class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full">
                                        Menunggu
                                    </span>
                                @elseif($complaint->status === 'DIPROSES')
                                    <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full">
                                        Diproses
                                    </span>
                                @elseif($complaint->status === 'SELESAI')
                                    <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">
                                        Selesai
                                    </span>
                                @endif
                            </div>

                        </div>

                    </a>

                @empty

                    <div class="p-8 text-center text-gray-500">
                        Belum ada pengaduan.
                    </div>

                @endforelse
            </div>
        </div>

    </div>

</div>

</body>
</html>