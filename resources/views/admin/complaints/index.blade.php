<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Warga</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
<div class="max-w-7xl mx-auto py-10 px-4">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Pengaduan Warga</h1>
            <p class="text-gray-500 mt-1">
                Kelola pengaduan yang dikirim oleh warga.
            </p>
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
                        <th class="px-6 py-4 text-left">Warga</th>
                        <th class="px-6 py-4 text-left">Judul</th>
                        <th class="px-6 py-4 text-left">Kategori</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Tanggal</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse($complaints as $complaint)
                        <tr>
                            <td class="px-6 py-4 font-semibold">
                                {{ $complaint->user->name ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $complaint->title }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $complaint->category }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $complaint->status }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $complaint->created_at->format('d-m-Y H:i') }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.complaints.show', $complaint) }}"
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                                    Detail
                                </a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                Belum ada pengaduan.
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