<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Permohonan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
<div class="max-w-6xl mx-auto py-10 px-4">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Detail Permohonan</h1>
            <p class="text-gray-500 mt-1">Periksa data dan dokumen permohonan warga.</p>
        </div>

        <a href="{{ route('admin.permohonan.index') }}"
           class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg transition">
            Kembali
        </a>
    </div>

    <!-- NOTIFIKASI -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
            {{ $errors->first() }}
        </div>
    @endif

    @php
        $status = strtoupper($letterRequest->status ?? '');
    @endphp

    <!-- DATA PERMOHONAN -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <h2 class="text-xl font-bold text-gray-800 mb-5">Data Permohonan</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <p class="text-sm text-gray-500">Nomor Permohonan</p>
                <p class="font-semibold text-gray-800 mt-1">{{ $letterRequest->request_number ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Tanggal Pengajuan</p>
                <p class="font-semibold text-gray-800 mt-1">
                    {{ $letterRequest->created_at?->format('d-m-Y H:i') ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Jenis Surat</p>
                <p class="font-semibold text-gray-800 mt-1">{{ $letterRequest->letterType->name ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Status</p>
                <div class="mt-2">
                    @if($status === 'MENUNGGU VERIFIKASI')
                        <span class="inline-block bg-yellow-100 text-yellow-700 text-sm font-semibold px-3 py-1 rounded-full">Menunggu Verifikasi</span>
                    @elseif($status === 'DIPROSES')
                        <span class="inline-block bg-blue-100 text-blue-700 text-sm font-semibold px-3 py-1 rounded-full">Diproses</span>
                    @elseif($status === 'PERLU PERBAIKAN')
                        <span class="inline-block bg-orange-100 text-orange-700 text-sm font-semibold px-3 py-1 rounded-full">Perlu Perbaikan</span>
                    @elseif($status === 'DITOLAK')
                        <span class="inline-block bg-red-100 text-red-700 text-sm font-semibold px-3 py-1 rounded-full">Ditolak</span>
                    @elseif($status === 'SELESAI')
                        <span class="inline-block bg-green-100 text-green-700 text-sm font-semibold px-3 py-1 rounded-full">Selesai</span>
                    @else
                        <span class="inline-block bg-gray-100 text-gray-700 text-sm font-semibold px-3 py-1 rounded-full">
                            {{ $letterRequest->status ?? '-' }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="md:col-span-2">
                <p class="text-sm text-gray-500">Keperluan</p>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mt-2">
                    <p class="font-medium text-gray-800">{{ $letterRequest->purpose ?? '-' }}</p>
                </div>
            </div>

            <div>
                <p class="text-sm text-gray-500">Metode Penerimaan</p>
                <p class="font-semibold text-gray-800 mt-1">
                    @if($letterRequest->delivery_method === 'pdf')
                        Download PDF
                    @elseif($letterRequest->delivery_method === 'pickup')
                        Ambil di Balai Desa
                    @else
                        -
                    @endif
                </p>
            </div>
        </div>
    </div>

    <!-- DATA WARGA -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <h2 class="text-xl font-bold text-gray-800 mb-5">Data Warga</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <p class="text-sm text-gray-500">Nama</p>
                <p class="font-semibold text-gray-800 mt-1">{{ $letterRequest->user->name ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Email</p>
                <p class="font-semibold text-gray-800 mt-1">{{ $letterRequest->user->email ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">NIK</p>
                <p class="font-semibold text-gray-800 mt-1">{{ $letterRequest->user->resident->nik ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Nomor KK</p>
                <p class="font-semibold text-gray-800 mt-1">{{ $letterRequest->user->resident->no_kk ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">No. HP</p>
                <p class="font-semibold text-gray-800 mt-1">{{ $letterRequest->user->resident->phone ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Alamat</p>
                <p class="font-semibold text-gray-800 mt-1">{{ $letterRequest->user->resident->address ?? '-' }}</p>
            </div>
        </div>
    </div>

    <!-- DOKUMEN -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <h2 class="text-xl font-bold text-gray-800 mb-5">Dokumen Persyaratan</h2>

        @forelse($letterRequest->documents ?? [] as $document)
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 border border-gray-200 rounded-lg p-4 mb-3">
                <div>
                    <p class="font-semibold text-gray-800">{{ $document->document_type ?? 'Dokumen' }}</p>
                    <p class="text-sm text-gray-500 mt-1">{{ $document->file_name ?? 'Dokumen yang diunggah warga' }}</p>
                </div>

                <a href="{{ asset('storage/' . $document->file_path) }}"
                   target="_blank"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm text-center transition">
                    Lihat Dokumen
                </a>
            </div>
        @empty
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-5 text-gray-500">
                Tidak ada dokumen yang ditemukan.
            </div>
        @endforelse
    </div>

    <!-- AKSI ADMIN -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-2">Verifikasi Permohonan</h2>
        <p class="text-gray-500 mb-6">
            Setelah memeriksa data dan dokumen, tentukan tindakan untuk permohonan ini.
        </p>

        @if($status === 'MENUNGGU VERIFIKASI')
            <form action="{{ route('admin.permohonan.verify', $letterRequest) }}" method="POST" class="mb-6">
                @csrf
                <button type="submit"
                        onclick="return confirm('Yakin ingin memverifikasi permohonan ini?')"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg font-semibold transition">
                    ✓ Verifikasi
                </button>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <form action="{{ route('admin.permohonan.revision', $letterRequest) }}"
                      method="POST"
                      class="border border-orange-200 bg-orange-50 rounded-xl p-5">
                    @csrf
                    <label class="block font-semibold text-gray-800 mb-2">Minta Perbaikan</label>
                    <p class="text-sm text-gray-500 mb-3">Jelaskan data atau dokumen yang harus diperbaiki warga.</p>

                    <textarea name="admin_note"
                              rows="4"
                              required
                              placeholder="Contoh: Foto KTP kurang jelas, silakan upload ulang."
                              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400">{{ old('admin_note') }}</textarea>

                    <button type="submit"
                            onclick="return confirm('Kirim permohonan ini kembali kepada warga?')"
                            class="w-full mt-3 bg-orange-500 hover:bg-orange-600 text-white px-5 py-3 rounded-lg font-semibold transition">
                        Minta Perbaikan
                    </button>
                </form>

                <form action="{{ route('admin.permohonan.reject', $letterRequest) }}"
                      method="POST"
                      class="border border-red-200 bg-red-50 rounded-xl p-5">
                    @csrf
                    <label class="block font-semibold text-gray-800 mb-2">Tolak Permohonan</label>
                    <p class="text-sm text-gray-500 mb-3">Tuliskan alasan permohonan tidak dapat diproses.</p>

                    <textarea name="admin_note"
                              rows="4"
                              required
                              placeholder="Contoh: Data NIK tidak sesuai dengan dokumen."
                              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400"></textarea>

                    <button type="submit"
                            onclick="return confirm('Yakin ingin menolak permohonan ini?')"
                            class="w-full mt-3 bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-lg font-semibold transition">
                        Tolak
                    </button>
                </form>
            </div>

        @elseif($status === 'DIPROSES')
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-5">
                <p class="font-semibold text-blue-700">✓ Permohonan sudah diverifikasi</p>
                <p class="text-blue-600 text-sm mt-1">
                    Surat sedang diproses. Tentukan metode penyerahan setelah surat selesai.
                </p>
            </div>

            <form action="{{ route('admin.permohonan.complete', $letterRequest) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="border border-gray-200 rounded-xl p-5">
                @csrf

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Metode Penyerahan
                </label>

                <select name="final_delivery_method"
                        id="final_delivery_method"
                        required
                        onchange="togglePdf()"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 mb-5">
                    <option value="">-- Pilih Metode --</option>
                    <option value="pdf">PDF / Download Online</option>
                    <option value="pickup">Ambil di Balai Desa</option>
                </select>

                <div id="pdf_upload" class="hidden mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Upload Surat PDF
                    </label>

                    <input type="file"
                           name="result_pdf"
                           accept=".pdf"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3">

                    <p class="text-xs text-gray-500 mt-2">
                        Upload surat yang sudah selesai dan siap diberikan kepada warga.
                    </p>
                </div>

                <button type="submit"
                        onclick="return confirm('Yakin surat ini sudah selesai?')"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg font-semibold">
                    ✓ Tandai Selesai
                </button>
            </form>

            <script>
                function togglePdf() {
                    const method = document.getElementById('final_delivery_method').value;
                    const upload = document.getElementById('pdf_upload');
                    upload.classList.toggle('hidden', method !== 'pdf');
                }
            </script>

        @elseif($status === 'PERLU PERBAIKAN')
            <div class="bg-orange-50 border border-orange-200 rounded-lg p-4">
                <p class="font-semibold text-orange-700">Permohonan menunggu perbaikan dari warga.</p>
                @if($letterRequest->admin_note)
                    <p class="text-orange-700 mt-2">
                        <span class="font-semibold">Catatan:</span> {{ $letterRequest->admin_note }}
                    </p>
                @endif
            </div>

        @elseif($status === 'DITOLAK')
            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                <p class="font-semibold text-red-700">Permohonan ini telah ditolak.</p>
                @if($letterRequest->admin_note)
                    <p class="text-red-700 mt-2">
                        <span class="font-semibold">Alasan:</span> {{ $letterRequest->admin_note }}
                    </p>
                @endif
            </div>

        @elseif($status === 'SELESAI')
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <p class="font-semibold text-green-700">✓ Permohonan telah selesai.</p>
            </div>
        @endif
    </div>

</div>
</body>
</html>
