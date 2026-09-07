@extends('layouts.warga')

@section('title', 'Perbaiki Permohonan')

@section('content')

<div class="mb-8">
    <a href="{{ route('warga.letters.show', $letterRequest) }}"
       class="text-green-600 hover:underline">
        ← Kembali ke Detail
    </a>

    <h1 class="text-3xl font-bold text-gray-800 mt-4">
        Perbaiki Permohonan
    </h1>

    <p class="text-gray-500 mt-1">
        Perbaiki data atau dokumen sesuai catatan dari admin.
    </p>
</div>

@if($errors->any())
    <div class="bg-red-100 border border-red-200 text-red-700 p-4 rounded-lg mb-6">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($letterRequest->admin_note)
    <div class="bg-orange-50 border border-orange-200 rounded-xl p-5 mb-6">
        <p class="font-semibold text-orange-700 mb-2">
            Catatan Admin
        </p>

        <p class="text-orange-800">
            {{ $letterRequest->admin_note }}
        </p>
    </div>
@endif

<form action="{{ route('warga.letters.revision.update', $letterRequest) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 mb-6">

        <h2 class="text-xl font-bold text-gray-800 mb-5">
            Data Permohonan
        </h2>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Keperluan
            </label>

            <textarea name="purpose"
                      rows="4"
                      required
                      class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('purpose', $letterRequest->purpose) }}</textarea>
        </div>

    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 mb-6">

        <h2 class="text-xl font-bold text-gray-800 mb-2">
            Upload Ulang Dokumen
        </h2>

        <p class="text-sm text-gray-500 mb-6">
            Upload hanya dokumen yang perlu diperbaiki. Jika tidak diganti, dokumen lama tetap digunakan.
        </p>

        <div class="space-y-6">

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    KTP
                </label>

                <input type="file"
                       name="ktp"
                       accept=".jpg,.jpeg,.png,.pdf"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Kartu Keluarga
                </label>

                <input type="file"
                       name="kk"
                       accept=".jpg,.jpeg,.png,.pdf"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Dokumen Pendukung
                </label>

                <input type="file"
                       name="supporting_document"
                       accept=".jpg,.jpeg,.png,.pdf"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3">
            </div>

        </div>

    </div>

    <div class="flex gap-3">

        <a href="{{ route('warga.letters.show', $letterRequest) }}"
           class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-lg font-semibold">
            Batal
        </a>

        <button type="submit"
                onclick="return confirm('Kirim perbaikan permohonan ini ke admin?')"
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg font-semibold">
            Kirim Perbaikan
        </button>

    </div>

</form>

@endsection