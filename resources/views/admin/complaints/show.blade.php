<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
<div class="max-w-5xl mx-auto py-10 px-4">

    @php
        $status = strtoupper($complaint->status ?? '');
    @endphp

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Detail Pengaduan</h1>
            <p class="text-gray-500 mt-1">
                Periksa dan tindak lanjuti pengaduan warga.
            </p>
        </div>

        <a href="{{ route('admin.complaints.index') }}"
           class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg">
            Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-200 text-red-700 p-4 rounded-lg mb-6">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 mb-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-5">
            {{ $complaint->title }}
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <div>
                <p class="text-sm text-gray-500">Nama Warga</p>
                <p class="font-semibold mt-1">
                    {{ $complaint->user->name ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Kategori</p>
                <p class="font-semibold mt-1">
                    {{ $complaint->category }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Tanggal</p>
                <p class="font-semibold mt-1">
                    {{ $complaint->created_at->format('d-m-Y H:i') }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Status</p>

                <div class="mt-2">
                    @if($status === 'MENUNGGU')
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold">
                            Menunggu
                        </span>
                    @elseif($status === 'DIPROSES')
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold">
                            Diproses
                        </span>
                    @elseif($status === 'SELESAI')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold">
                            Selesai
                        </span>
                    @endif
                </div>
            </div>

        </div>

        <div class="mt-6">
            <p class="text-sm text-gray-500">Isi Pengaduan</p>

            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mt-2">
                <p class="whitespace-pre-line text-gray-800">
                    {{ $complaint->message }}
                </p>
            </div>
        </div>

        @if($complaint->attachment_path)
            <div class="mt-6">
                <p class="text-sm text-gray-500 mb-2">Lampiran</p>

                <a href="{{ asset('storage/' . $complaint->attachment_path) }}"
                   target="_blank"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Lihat Lampiran
                </a>
            </div>
        @endif

    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">

        <h2 class="text-xl font-bold text-gray-800 mb-5">
            Tindakan Admin
        </h2>

        @if($status === 'MENUNGGU')

            <form action="{{ route('admin.complaints.process', $complaint) }}"
                  method="POST">

                @csrf

                <button type="submit"
                        onclick="return confirm('Mulai proses pengaduan ini?')"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold">
                    Proses Pengaduan
                </button>

            </form>

        @elseif($status === 'DIPROSES')

            <form action="{{ route('admin.complaints.complete', $complaint) }}"
                  method="POST">

                @csrf

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Tanggapan Admin
                </label>

                <textarea name="admin_response"
                          rows="5"
                          required
                          placeholder="Tuliskan hasil tindak lanjut pengaduan..."
                          class="w-full border border-gray-300 rounded-lg px-4 py-3 mb-4">{{ old('admin_response') }}</textarea>

                <button type="submit"
                        onclick="return confirm('Selesaikan pengaduan ini?')"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg font-semibold">
                    Tandai Selesai
                </button>

            </form>

        @elseif($status === 'SELESAI')

            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <p class="font-semibold text-green-700 mb-2">
                    ✓ Pengaduan telah selesai.
                </p>

                <p class="text-green-800 whitespace-pre-line">
                    {{ $complaint->admin_response }}
                </p>
            </div>

        @endif

    </div>

</div>
</body>
</html>