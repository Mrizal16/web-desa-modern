<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Daftar Permohonan Surat</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">


<div class="max-w-7xl mx-auto py-10 px-4">


    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">

        <div>

            <h1 class="text-3xl font-bold text-gray-800">
                Daftar Permohonan Surat
            </h1>

            <p class="text-gray-500 mt-1">
                Periksa dan kelola permohonan surat dari warga.
            </p>

        </div>


        <a href="{{ route('admin.dashboard') }}"
           class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg transition">

            Kembali ke Dashboard

        </a>

    </div>


    <!-- NOTIFIKASI -->
    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif


    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50 border-b">

                    <tr>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                            No
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                            No. Permohonan
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                            Nama Warga
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                            Jenis Surat
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                            Tanggal Pengajuan
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                            Status
                        </th>

                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-600">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y">

                    @forelse($requests as $request)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4 text-sm text-gray-700">

                                {{ $loop->iteration }}

                            </td>


                            <td class="px-6 py-4 text-sm font-medium text-gray-800">

                                {{ $request->request_number ?? '-' }}

                            </td>


                            <td class="px-6 py-4 text-sm text-gray-700">

                                {{ $request->user->name ?? '-' }}

                            </td>


                            <td class="px-6 py-4 text-sm text-gray-700">

                                {{ $request->letterType->name ?? '-' }}

                            </td>


                            <td class="px-6 py-4 text-sm text-gray-700">

                                {{ $request->created_at?->format('d-m-Y H:i') ?? '-' }}

                            </td>


                            <td class="px-6 py-4">

                                @php
                                    $status = strtolower($request->status ?? '');
                                @endphp


                                @if($status === 'menunggu verifikasi')

                                    <span class="inline-flex bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full">

                                        Menunggu Verifikasi

                                    </span>


                                @elseif($status === 'diproses')

                                    <span class="inline-flex bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">

                                        Diproses

                                    </span>


                                @elseif($status === 'perlu perbaikan')

                                    <span class="inline-flex bg-orange-100 text-orange-700 text-xs font-semibold px-3 py-1 rounded-full">

                                        Perlu Perbaikan

                                    </span>


                                @elseif($status === 'ditolak')

                                    <span class="inline-flex bg-red-100 text-red-700 text-xs font-semibold px-3 py-1 rounded-full">

                                        Ditolak

                                    </span>


                                @elseif($status === 'selesai')

                                    <span class="inline-flex bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">

                                        Selesai

                                    </span>


                                @else

                                    <span class="inline-flex bg-gray-100 text-gray-700 text-xs font-semibold px-3 py-1 rounded-full">

                                        {{ $request->status ?? 'Tidak diketahui' }}

                                    </span>

                                @endif

                            </td>


                            <td class="px-6 py-4 text-center">

                                <a
                                    href="{{ route('admin.permohonan.show', $request->id) }}"
                                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg transition">

                                    Lihat Detail

                                </a>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="7"
                                class="px-6 py-12 text-center text-gray-500">

                                Belum ada permohonan surat dari warga.

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