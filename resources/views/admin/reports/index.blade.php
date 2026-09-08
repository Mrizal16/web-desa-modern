<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-7xl mx-auto py-10 px-4">

    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Laporan</h1>
            <p class="text-gray-500 mt-1">Rekap pelayanan administrasi desa.</p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('admin.reports.print', [
                'start_date' => $startDate ?? '',
                'end_date' => $endDate ?? ''
            ]) }}"
               class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">
                Export PDF
            </a>

            <a href="{{ route('admin.dashboard') }}"
               class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg">
                Kembali
            </a>
        </div>
    </div>

    {{-- FILTER --}}
    <div class="bg-white border rounded-xl p-5 mb-8">
        <form method="GET"
              action="{{ route('admin.reports.index') }}"
              class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Dari Tanggal
                </label>

                <input type="date"
                       name="start_date"
                       value="{{ $startDate ?? '' }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Sampai Tanggal
                </label>

                <input type="date"
                       name="end_date"
                       value="{{ $endDate ?? '' }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>

            <button type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-lg">
                Tampilkan
            </button>

            <a href="{{ route('admin.reports.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-2 rounded-lg text-center">
                Reset
            </a>

        </form>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">

        <div class="bg-white border rounded-xl p-6">
            <p class="text-gray-500">Total Warga</p>
            <h2 class="text-4xl font-bold mt-2">
                {{ $stats['total_residents'] }}
            </h2>
        </div>

        <div class="bg-white border rounded-xl p-6">
            <p class="text-gray-500">Total Permohonan Surat</p>
            <h2 class="text-4xl font-bold mt-2">
                {{ $stats['total_letters'] }}
            </h2>
        </div>

        <div class="bg-white border rounded-xl p-6">
            <p class="text-gray-500">Surat Selesai</p>
            <h2 class="text-4xl font-bold mt-2 text-green-600">
                {{ $stats['completed_letters'] }}
            </h2>
        </div>

        <div class="bg-white border rounded-xl p-6">
            <p class="text-gray-500">Surat Ditolak</p>
            <h2 class="text-4xl font-bold mt-2 text-red-600">
                {{ $stats['rejected_letters'] }}
            </h2>
        </div>

        <div class="bg-white border rounded-xl p-6">
            <p class="text-gray-500">Total Pengaduan</p>
            <h2 class="text-4xl font-bold mt-2">
                {{ $stats['total_complaints'] }}
            </h2>
        </div>

        <div class="bg-white border rounded-xl p-6">
            <p class="text-gray-500">Pengaduan Selesai</p>
            <h2 class="text-4xl font-bold mt-2 text-green-600">
                {{ $stats['completed_complaints'] }}
            </h2>
        </div>

    </div>

    {{-- PERMOHONAN SURAT --}}
    <div class="bg-white border rounded-xl overflow-hidden mb-8">
        <div class="p-6 border-b">
            <h2 class="text-xl font-bold">Permohonan Surat</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-5 py-4 text-left">Nomor</th>
                        <th class="px-5 py-4 text-left">Warga</th>
                        <th class="px-5 py-4 text-left">Jenis Surat</th>
                        <th class="px-5 py-4 text-left">Status</th>
                        <th class="px-5 py-4 text-left">Tanggal</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($latestLetters as $request)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4">
                                {{ $request->request_number }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $request->user->name ?? '-' }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $request->letterType->name ?? '-' }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $request->status }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $request->created_at->format('d-m-Y H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"
                                class="px-5 py-10 text-center text-gray-500">
                                Belum ada permohonan pada periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- PENGADUAN --}}
    <div class="bg-white border rounded-xl overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-bold">Pengaduan</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-5 py-4 text-left">Warga</th>
                        <th class="px-5 py-4 text-left">Judul</th>
                        <th class="px-5 py-4 text-left">Kategori</th>
                        <th class="px-5 py-4 text-left">Status</th>
                        <th class="px-5 py-4 text-left">Tanggal</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($latestComplaints as $complaint)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4">
                                {{ $complaint->user->name ?? '-' }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $complaint->title }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $complaint->category }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $complaint->status }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $complaint->created_at->format('d-m-Y H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"
                                class="px-5 py-10 text-center text-gray-500">
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