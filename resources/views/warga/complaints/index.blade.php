@extends('layouts.warga')

@section('title', 'Pengaduan')

@section('content')

<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Pengaduan Saya</h1>
        <p class="text-gray-500 mt-1">
            Lihat dan kirim pengaduan kepada pemerintah desa.
        </p>
    </div>

    <a href="{{ route('warga.complaints.create') }}"
       class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg font-semibold">
        + Buat Pengaduan
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-4 text-left">Judul</th>
                    <th class="px-6 py-4 text-left">Kategori</th>
                    <th class="px-6 py-4 text-left">Tanggal</th>
                    <th class="px-6 py-4 text-left">Status</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($complaints as $complaint)
                    <tr>
                        <td class="px-6 py-4 font-semibold">
                            {{ $complaint->title }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $complaint->category }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $complaint->created_at->format('d-m-Y H:i') }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $complaint->status }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('warga.complaints.show', $complaint) }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                                Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            Belum ada pengaduan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection