<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Warga</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
<div class="max-w-6xl mx-auto py-10 px-4">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Detail Warga</h1>
            <p class="text-gray-500 mt-1">Informasi lengkap warga.</p>
        </div>

        <a href="{{ route('admin.warga.index') }}"
           class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg">
            Kembali
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 mb-6">
        <h2 class="text-xl font-bold text-gray-800 mb-5">Data Pribadi</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <p class="text-sm text-gray-500">Nama</p>
                <p class="font-semibold mt-1">{{ $user->name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Email</p>
                <p class="font-semibold mt-1">{{ $user->email }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">NIK</p>
                <p class="font-semibold mt-1">
                    {{ $user->resident->nik ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Nomor KK</p>
                <p class="font-semibold mt-1">
                    {{ $user->resident->no_kk ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">No. HP</p>
                <p class="font-semibold mt-1">
                    {{ $user->resident->phone ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Alamat</p>
                <p class="font-semibold mt-1">
                    {{ $user->resident->address ?? '-' }}
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-gray-800">
                Riwayat Permohonan Surat
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left">Nomor</th>
                        <th class="px-6 py-4 text-left">Jenis Surat</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Tanggal</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($user->letterRequests as $request)
                        <tr>
                            <td class="px-6 py-4">
                                {{ $request->request_number }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $request->letterType->name ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $request->status }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $request->created_at->format('d-m-Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                Warga belum pernah mengajukan surat.
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