<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
<div class="max-w-7xl mx-auto py-10 px-4">

    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Data Warga</h1>
            <p class="text-gray-500 mt-1">Daftar warga yang terdaftar dalam sistem.</p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg">
            Kembali ke Dashboard
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">No</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Nama</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">NIK</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">No. HP</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($residents as $resident)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>

                            <td class="px-6 py-4 font-semibold text-gray-800">
                                {{ $resident->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $resident->resident->nik ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $resident->email }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $resident->resident->phone ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.warga.show', $resident) }}"
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                Belum ada data warga.
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