@extends('layouts.warga')

@section('title', 'Detail Pengaduan')

@section('content')

@php
    $status = strtoupper($complaint->status ?? '');
@endphp

<div class="mb-8">
    <a href="{{ route('warga.complaints.index') }}"
       class="text-green-600 hover:underline">
        ← Kembali ke Pengaduan Saya
    </a>

    <h1 class="text-3xl font-bold text-gray-800 mt-4">
        Detail Pengaduan
    </h1>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2 space-y-6">

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            <p class="text-sm text-gray-500">Judul</p>
            <h2 class="text-2xl font-bold text-gray-800 mt-1">
                {{ $complaint->title }}
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">
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
            </div>

            <div class="mt-6">
                <p class="text-sm text-gray-500">Isi Pengaduan</p>

                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mt-2">
                    <p class="text-gray-800 whitespace-pre-line">
                        {{ $complaint->message }}
                    </p>
                </div>
            </div>
        </div>

        @if($complaint->attachment_path)
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">
                    Lampiran
                </h2>

                <a href="{{ asset('storage/' . $complaint->attachment_path) }}"
                   target="_blank"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold">
                    Lihat Lampiran
                </a>
            </div>
        @endif

        @if($complaint->admin_response)
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-3">
                    Tanggapan Admin
                </h2>

                <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                    <p class="text-green-800 whitespace-pre-line">
                        {{ $complaint->admin_response }}
                    </p>
                </div>
            </div>
        @endif

    </div>

    <div>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            <p class="text-sm text-gray-500">
                Status Pengaduan
            </p>

            <div class="mt-3">
                @if($status === 'MENUNGGU')
                    <span class="inline-block bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full font-semibold">
                        Menunggu
                    </span>
                @elseif($status === 'DIPROSES')
                    <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-semibold">
                        Diproses
                    </span>
                @elseif($status === 'SELESAI')
                    <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
                        Selesai
                    </span>
                @else
                    <span class="inline-block bg-gray-100 text-gray-700 px-4 py-2 rounded-full font-semibold">
                        {{ $complaint->status }}
                    </span>
                @endif
            </div>

            <div class="border-t mt-6 pt-6">
                @if($status === 'MENUNGGU')
                    <p class="text-sm text-gray-600">
                        Pengaduan telah dikirim dan sedang menunggu pemeriksaan admin.
                    </p>
                @elseif($status === 'DIPROSES')
                    <p class="text-sm text-blue-700">
                        Pengaduan sedang ditindaklanjuti oleh pemerintah desa.
                    </p>
                @elseif($status === 'SELESAI')
                    <p class="text-sm text-green-700">
                        Pengaduan telah selesai ditindaklanjuti.
                    </p>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection