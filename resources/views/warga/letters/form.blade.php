@extends('layouts.warga')

@section('title', 'Ajukan Surat')

@section('content')

<div class="mb-8">

    <a
        href="{{ route('warga.letters.create') }}"
        class="text-green-600 hover:underline">

        Kembali ke jenis surat

    </a>

    <h1 class="text-3xl font-bold text-gray-800 mt-4">

        {{ $letterType->name }}

    </h1>

    <p class="text-gray-500 mt-2">

        {{ $letterType->description }}

    </p>

</div>


@if ($errors->any())

    <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">

        <ul class="list-disc ml-5">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


    <div class="lg:col-span-2">

        <form
            action="{{ route('warga.letters.store', $letterType) }}"
            method="POST"
            enctype="multipart/form-data"
            class="bg-white rounded-xl border shadow-sm p-6">

            @csrf


            <div class="mb-6">

                <h2 class="text-xl font-bold">
                    Data Pemohon
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    Data berikut diambil dari profil warga.
                </p>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                <div>

                    <label class="block font-medium mb-2">
                        Nama
                    </label>

                    <input
                        type="text"
                        value="{{ auth()->user()->resident->name }}"
                        disabled
                        class="w-full border bg-gray-100 rounded-lg p-3">

                </div>


                <div>

                    <label class="block font-medium mb-2">
                        NIK
                    </label>

                    <input
                        type="text"
                        value="{{ auth()->user()->resident->nik }}"
                        disabled
                        class="w-full border bg-gray-100 rounded-lg p-3">

                </div>


                <div>

                    <label class="block font-medium mb-2">
                        Nomor KK
                    </label>

                    <input
                        type="text"
                        value="{{ auth()->user()->resident->no_kk }}"
                        disabled
                        class="w-full border bg-gray-100 rounded-lg p-3">

                </div>


                <div>

                    <label class="block font-medium mb-2">
                        WhatsApp
                    </label>

                    <input
                        type="text"
                        value="{{ auth()->user()->resident->phone }}"
                        disabled
                        class="w-full border bg-gray-100 rounded-lg p-3">

                </div>

            </div>


            <div class="mt-6">

                <label class="block font-medium mb-2">
                    Keperluan Surat
                </label>

                <textarea
                    name="purpose"
                    rows="5"
                    class="w-full border rounded-lg p-3"
                    placeholder="Jelaskan surat ini akan digunakan untuk apa..."
                >{{ old('purpose') }}</textarea>

            </div>


            @if ($letterType->allow_pdf || $letterType->allow_pickup)

                <div class="mt-6">

                    <label class="block font-medium mb-3">
                        Metode Penerimaan
                    </label>


                    <div class="space-y-3">


                        @if ($letterType->allow_pdf)

                            <label
                                class="flex items-start gap-3 border rounded-lg p-4 cursor-pointer">

                                <input
                                    type="radio"
                                    name="delivery_method"
                                    value="pdf"
                                    {{ old('delivery_method') === 'pdf' ? 'checked' : '' }}
                                    class="mt-1">

                                <div>

                                    <p class="font-semibold">
                                        Download PDF
                                    </p>

                                    <p class="text-gray-500 text-sm">
                                        Surat dapat diunduh dari dashboard setelah selesai.
                                    </p>

                                </div>

                            </label>

                        @endif


                        @if ($letterType->allow_pickup)

                            <label
                                class="flex items-start gap-3 border rounded-lg p-4 cursor-pointer">

                                <input
                                    type="radio"
                                    name="delivery_method"
                                    value="pickup"
                                    {{ old('delivery_method') === 'pickup' ? 'checked' : '' }}
                                    class="mt-1">

                                <div>

                                    <p class="font-semibold">
                                        Ambil di Balai Desa
                                    </p>

                                    <p class="text-gray-500 text-sm">
                                        Surat diambil secara fisik setelah selesai.
                                    </p>

                                </div>

                            </label>

                        @endif


                    </div>

                </div>

            @endif

            <div class="mt-8 border-t pt-6">

                <h2 class="text-xl font-bold">
                    Dokumen Persyaratan
                </h2>

                <p class="text-sm text-gray-500 mt-1 mb-6">
                    Upload dokumen yang diperlukan untuk proses verifikasi.
                </p>


                <div class="space-y-6">


                    <div>

                        <label class="block font-medium mb-2">
                            Foto / Scan KTP
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="file"
                            name="ktp"
                            accept=".jpg,.jpeg,.png,.pdf"
                            class="w-full border rounded-lg p-3 bg-white">

                        <p class="text-xs text-gray-500 mt-2">
                            Format JPG, PNG, atau PDF. Maksimal 2 MB.
                        </p>

                    </div>


                    <div>

                        <label class="block font-medium mb-2">
                            Foto / Scan Kartu Keluarga
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="file"
                            name="kk"
                            accept=".jpg,.jpeg,.png,.pdf"
                            class="w-full border rounded-lg p-3 bg-white">

                        <p class="text-xs text-gray-500 mt-2">
                            Format JPG, PNG, atau PDF. Maksimal 2 MB.
                        </p>

                    </div>


                    <div>

                        <label class="block font-medium mb-2">
                            Dokumen Pendukung
                        </label>

                        <input
                            type="file"
                            name="supporting_document"
                            accept=".jpg,.jpeg,.png,.pdf"
                            class="w-full border rounded-lg p-3 bg-white">

                        <p class="text-xs text-gray-500 mt-2">
                            Opsional. Upload jika diperlukan.
                        </p>

                    </div>


                </div>

            </div>

            <div class="mt-8 flex justify-end">

                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700
                           text-white px-7 py-3 rounded-lg font-semibold">

                    Kirim Pengajuan

                </button>

            </div>

        </form>

    </div>


    <div>

        <div class="bg-white border rounded-xl p-6 shadow-sm">

            <h3 class="font-bold text-lg">
                Informasi
            </h3>

            <div class="mt-5 space-y-4 text-sm">

                <div>

                    <p class="text-gray-500">
                        Jenis Surat
                    </p>

                    <p class="font-semibold">
                        {{ $letterType->name }}
                    </p>

                </div>


                <div>

                    <p class="text-gray-500">
                        Status Awal
                    </p>

                    <span
                        class="inline-block bg-yellow-100
                               text-yellow-700 px-3 py-1
                               rounded-full mt-1">

                        Menunggu Verifikasi

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection