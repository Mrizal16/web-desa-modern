@extends('layouts.warga')

@section('title', 'Buat Pengaduan')

@section('content')

<div class="mb-8">
    <a href="{{ route('warga.complaints.index') }}"
       class="text-green-600 hover:underline">
        ← Kembali ke Pengaduan Saya
    </a>

    <h1 class="text-3xl font-bold text-gray-800 mt-4">
        Buat Pengaduan
    </h1>

    <p class="text-gray-500 mt-1">
        Sampaikan pengaduan Anda kepada pemerintah desa.
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

<form action="{{ route('warga.complaints.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">

        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Judul Pengaduan
            </label>

            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
                   required
                   class="w-full border border-gray-300 rounded-lg px-4 py-3"
                   placeholder="Contoh: Lampu jalan mati">
        </div>

        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Kategori
            </label>

            <select name="category"
                    required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3">

                <option value="">-- Pilih Kategori --</option>
                <option value="Infrastruktur" {{ old('category') === 'Infrastruktur' ? 'selected' : '' }}>
                    Infrastruktur
                </option>
                <option value="Kebersihan" {{ old('category') === 'Kebersihan' ? 'selected' : '' }}>
                    Kebersihan
                </option>
                <option value="Keamanan" {{ old('category') === 'Keamanan' ? 'selected' : '' }}>
                    Keamanan
                </option>
                <option value="Pelayanan" {{ old('category') === 'Pelayanan' ? 'selected' : '' }}>
                    Pelayanan
                </option>
                <option value="Sosial" {{ old('category') === 'Sosial' ? 'selected' : '' }}>
                    Sosial
                </option>
                <option value="Lainnya" {{ old('category') === 'Lainnya' ? 'selected' : '' }}>
                    Lainnya
                </option>

            </select>
        </div>

        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Isi Pengaduan
            </label>

            <textarea name="message"
                      rows="6"
                      required
                      class="w-full border border-gray-300 rounded-lg px-4 py-3"
                      placeholder="Jelaskan pengaduan secara lengkap...">{{ old('message') }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Lampiran
            </label>

            <input type="file"
                   name="attachment"
                   accept=".jpg,.jpeg,.png,.pdf"
                   class="w-full border border-gray-300 rounded-lg px-4 py-3">

            <p class="text-xs text-gray-500 mt-2">
                Opsional. Maksimal 2 MB. Format JPG, PNG, atau PDF.
            </p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('warga.complaints.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-lg font-semibold">
                Batal
            </a>

            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg font-semibold">
                Kirim Pengaduan
            </button>
        </div>

    </div>
</form>

@endsection