@extends('layouts.warga')

@section('title', 'Detail Permohonan')

@section('content')

@php
    $status = strtoupper($letterRequest->status ?? '');
@endphp

<div class="mb-8">
    <a href="{{ route('warga.letters.index') }}"
       class="text-green-600 hover:text-green-700 hover:underline font-medium">
        ← Kembali ke Surat Saya
    </a>

    <h1 class="text-3xl font-bold text-gray-800 mt-4">Detail Permohonan</h1>
    <p class="text-gray-500 mt-1">
        Lihat informasi dan perkembangan permohonan surat Anda.
    </p>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2 space-y-6">

        <!-- INFORMASI PERMOHONAN -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <p class="text-sm text-gray-500 mb-1">Jenis Surat</p>

                <h2 class="font-bold text-xl text-gray-800">
                    {{ $letterRequest->letterType->name ?? '-' }}
                </h2>
            </div>

            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <p class="text-sm text-gray-500">Nomor Permohonan</p>

                    <p class="font-semibold text-gray-800 mt-1">
                        {{ $letterRequest->request_number }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Tanggal Pengajuan</p>

                    <p class="font-semibold text-gray-800 mt-1">
                        {{ $letterRequest->created_at->format('d-m-Y H:i') }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Nama Pemohon</p>

                    <p class="font-semibold text-gray-800 mt-1">
                        {{ $letterRequest->user->name ?? auth()->user()->name }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Pilihan Awal Penerimaan</p>

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

                <div class="md:col-span-2">
                    <p class="text-sm text-gray-500">Keperluan</p>

                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mt-2">
                        <p class="text-gray-800">
                            {{ $letterRequest->purpose }}
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- DOKUMEN -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <h2 class="font-bold text-xl text-gray-800">
                    Dokumen Persyaratan
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Dokumen yang Anda unggah saat mengajukan permohonan.
                </p>
            </div>

            <div class="p-6 space-y-3">

                @forelse($letterRequest->documents as $document)

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 border border-gray-200 rounded-lg p-4">

                        <div>
                            <p class="font-semibold text-gray-800">
                                {{ $document->document_type }}
                            </p>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $document->file_name }}
                            </p>
                        </div>

                        <a href="{{ asset('storage/' . $document->file_path) }}"
                           target="_blank"
                           class="inline-flex justify-center bg-green-50 hover:bg-green-100 text-green-700 font-semibold px-4 py-2 rounded-lg transition">
                            Lihat Dokumen
                        </a>

                    </div>

                @empty

                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-5">
                        <p class="text-gray-500">Tidak ada dokumen.</p>
                    </div>

                @endforelse

            </div>
        </div>

        <!-- CATATAN ADMIN -->
        @if(!empty($letterRequest->admin_note))

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">

                <h2 class="font-bold text-xl text-gray-800 mb-3">
                    Catatan Admin
                </h2>

                @if($status === 'PERLU PERBAIKAN')

                    <div class="bg-orange-50 border border-orange-200 rounded-lg p-4">
                        <p class="text-sm font-semibold text-orange-700 mb-1">
                            Permohonan perlu diperbaiki
                        </p>

                        <p class="text-orange-800">
                            {{ $letterRequest->admin_note }}
                        </p>
                    </div>

                @elseif($status === 'DITOLAK')

                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <p class="text-sm font-semibold text-red-700 mb-1">
                            Alasan penolakan
                        </p>

                        <p class="text-red-800">
                            {{ $letterRequest->admin_note }}
                        </p>
                    </div>

                @else

                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <p class="text-gray-800">
                            {{ $letterRequest->admin_note }}
                        </p>
                    </div>

                @endif

            </div>

        @endif

        <!-- PERBAIKAN -->
        @if($status === 'PERLU PERBAIKAN')

            <div class="bg-orange-50 border border-orange-200 rounded-xl p-6">
                <h2 class="font-bold text-lg text-orange-800 mb-2">
                    Perbaikan Diperlukan
                </h2>

                <p class="text-orange-700 mb-4">
                    Silakan perbaiki data atau upload ulang dokumen sesuai catatan admin.
                </p>

                <a href="{{ route('warga.letters.revision', $letterRequest) }}"
                   class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-5 py-3 rounded-lg font-semibold transition">
                    Perbaiki Permohonan
                </a>
            </div>

        @endif

        <!-- HASIL SURAT -->
        @if($status === 'SELESAI')

            @if($letterRequest->final_delivery_method === 'pdf')

                <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                    <h2 class="font-bold text-xl text-green-800 mb-2">
                        Surat Siap Diunduh
                    </h2>

                    <p class="text-green-700 mb-5">
                        Permohonan Anda telah selesai. Surat tersedia dalam bentuk PDF.
                    </p>

                    @if($letterRequest->result_file_path)

                        <a href="{{ asset('storage/' . $letterRequest->result_file_path) }}"
                           target="_blank"
                           class="inline-block bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg font-semibold transition">
                            Download Surat PDF
                        </a>

                    @else

                        <div class="bg-yellow-100 border border-yellow-200 text-yellow-700 p-4 rounded-lg">
                            File surat belum tersedia. Silakan hubungi admin desa.
                        </div>

                    @endif
                </div>

            @elseif($letterRequest->final_delivery_method === 'pickup')

                <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                    <h2 class="font-bold text-xl text-blue-800 mb-2">
                        Surat Siap Diambil
                    </h2>

                    <p class="text-blue-700">
                        Surat Anda telah selesai diproses dan dapat diambil langsung di Balai Desa.
                    </p>

                    <div class="bg-white border border-blue-200 rounded-lg p-4 mt-4">
                        <p class="font-semibold text-gray-800">
                            Silakan membawa identitas saat pengambilan surat.
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Surat mungkin memerlukan tanda tangan atau stempel basah.
                        </p>
                    </div>
                </div>

            @endif

        @endif

    </div>

    <!-- STATUS -->
    <div>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 sticky top-6">

            <p class="text-gray-500 text-sm">
                Status Permohonan
            </p>

            <div class="mt-3">

                @if($status === 'MENUNGGU VERIFIKASI')

                    <span class="inline-block bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full font-semibold">
                        Menunggu Verifikasi
                    </span>

                @elseif($status === 'DIPROSES')

                    <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-semibold">
                        Diproses
                    </span>

                @elseif($status === 'PERLU PERBAIKAN')

                    <span class="inline-block bg-orange-100 text-orange-700 px-4 py-2 rounded-full font-semibold">
                        Perlu Perbaikan
                    </span>

                @elseif($status === 'DITOLAK')

                    <span class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-full font-semibold">
                        Ditolak
                    </span>

                @elseif($status === 'SELESAI')

                    <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
                        Selesai
                    </span>

                @else

                    <span class="inline-block bg-gray-100 text-gray-700 px-4 py-2 rounded-full font-semibold">
                        {{ $letterRequest->status }}
                    </span>

                @endif

            </div>

            <div class="border-t border-gray-200 mt-6 pt-6">

                @if($status === 'MENUNGGU VERIFIKASI')

                    <p class="text-sm text-gray-600">
                        Permohonan Anda telah dikirim dan sedang menunggu pemeriksaan dari admin desa.
                    </p>

                @elseif($status === 'DIPROSES')

                    <p class="text-sm text-gray-600">
                        Permohonan telah diverifikasi dan sedang diproses oleh admin desa.
                    </p>

                @elseif($status === 'PERLU PERBAIKAN')

                    <p class="text-sm text-orange-700">
                        Ada data atau dokumen yang perlu diperbaiki. Silakan lihat catatan admin.
                    </p>

                @elseif($status === 'DITOLAK')

                    <p class="text-sm text-red-700">
                        Permohonan tidak dapat diproses. Silakan lihat alasan penolakan dari admin.
                    </p>

                @elseif($status === 'SELESAI')

                    @if($letterRequest->final_delivery_method === 'pdf')

                        <p class="text-sm text-green-700">
                            Surat telah selesai dan dapat diunduh dalam bentuk PDF.
                        </p>

                    @elseif($letterRequest->final_delivery_method === 'pickup')

                        <p class="text-sm text-green-700">
                            Surat telah selesai dan siap diambil di Balai Desa.
                        </p>

                    @else

                        <p class="text-sm text-green-700">
                            Permohonan surat Anda telah selesai diproses.
                        </p>

                    @endif

                @endif

            </div>

            @if($status === 'SELESAI' && $letterRequest->completed_at)

                <div class="border-t border-gray-200 mt-6 pt-6">
                    <p class="text-gray-500 text-sm">
                        Surat selesai
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $letterRequest->completed_at->format('d-m-Y H:i') }}
                    </p>
                </div>

            @endif

            <div class="border-t border-gray-200 mt-6 pt-6">
                <p class="text-gray-500 text-sm">
                    Pengajuan dibuat
                </p>

                <p class="mt-1 font-medium text-gray-800">
                    {{ $letterRequest->created_at->format('d-m-Y H:i') }}
                </p>
            </div>

            <div class="border-t border-gray-200 mt-6 pt-6">
                <p class="text-gray-500 text-sm">
                    Terakhir diperbarui
                </p>

                <p class="mt-1 font-medium text-gray-800">
                    {{ $letterRequest->updated_at->format('d-m-Y H:i') }}
                </p>
            </div>

        </div>
    </div>

</div>

@endsection