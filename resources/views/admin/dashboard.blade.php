<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<div class="max-w-6xl mx-auto py-10 px-4">

    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Dashboard Admin Desa</h1>
            <p class="text-gray-500 mt-1">
                Selamat datang,
                <span class="font-semibold text-gray-700">{{ auth()->user()->name }}</span>
            </p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg transition">
                Logout
            </button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        {{-- PERMOHONAN SURAT --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5V6.75A3.375 3.375 0 0011.25 3.375H8.25m0 0H5.625A1.875 1.875 0 003.75 5.25v13.5a1.875 1.875 0 001.875 1.875h12.75a1.875 1.875 0 001.875-1.875V14.25M8.25 3.375V8.25h4.875"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Permohonan Surat</h2>
            <p class="text-gray-500 mt-2 mb-6">
                Lihat, periksa, dan verifikasi permohonan surat warga.
            </p>
            <a href="{{ route('admin.permohonan.index') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition">
                Lihat Permohonan
            </a>
        </div>

        {{-- DATA WARGA --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198v.002c0 .504-.123.978-.34 1.395m.34-1.397a5.98 5.98 0 00-1.94-4.472M15 12a3 3 0 10-6 0 3 3 0 006 0zm6 8.25a8.96 8.96 0 01-9 0m9 0a8.96 8.96 0 00-9 0"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Data Warga</h2>
            <p class="text-gray-500 mt-2 mb-6">
                Kelola data warga yang terdaftar dalam sistem pelayanan desa.
            </p>
            <a href="{{ route('admin.warga.index') }}"
                class="inline-block bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition">
                Lihat Data Warga
            </a>
        </div>

        {{-- PENGADUAN --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-lg flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.625 9.75h.008v.008h-.008V9.75zm3.75 0h.008v.008h-.008V9.75zm3.75 0h.008v.008h-.008V9.75zM21 12c0 4.142-4.03 7.5-9 7.5a10.8 10.8 0 01-3.694-.638L3 20.25l1.305-3.48A6.968 6.968 0 013 12c0-4.142 4.03-7.5 9-7.5s9 3.358 9 7.5z"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Pengaduan Warga</h2>
            <p class="text-gray-500 mt-2 mb-6">
                Lihat dan tindak lanjuti pengaduan yang dikirim oleh warga.
            </p>
            <a href="{{ route('admin.complaints.index') }}"
                class="inline-block bg-orange-600 hover:bg-orange-700 text-white px-5 py-2 rounded-lg transition">
                Lihat Pengaduan
            </a>
        </div>

        {{-- LAPORAN --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Laporan</h2>
            <p class="text-gray-500 mt-2 mb-6">
                Lihat laporan dan rekap pelayanan administrasi desa.
            </p>
            <a href="{{ route('admin.reports.index') }}"
            class="inline-block bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-lg">
                Lihat Laporan
            </a>
        </div>

    </div>
</div>

</body>
</html>