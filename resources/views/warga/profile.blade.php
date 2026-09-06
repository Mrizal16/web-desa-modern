@extends('layouts.warga')

@section('title', 'Profil Saya')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-gray-800">
        Profil Saya
    </h1>

    <p class="text-gray-500 mt-1">
        Informasi identitas akun warga
    </p>

</div>


@if (session('success'))

    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">

        {{ session('success') }}

    </div>

@endif


@if ($errors->any())

    <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">

        <ul class="list-disc ml-5">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<div class="bg-white rounded-xl border shadow-sm">

    <div class="p-6 border-b">

        <h2 class="text-xl font-bold">
            Data Identitas
        </h2>

    </div>


    <form
        action="{{ route('warga.profile.update') }}"
        method="POST"
        class="p-6">

        @csrf
        @method('PUT')


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


            {{-- NIK --}}

            <div>

                <label class="block font-medium mb-2">
                    NIK
                </label>

                <input
                    type="text"
                    value="{{ $resident->nik }}"
                    disabled
                    class="w-full border bg-gray-100 rounded-lg p-3">

                <p class="text-xs text-gray-500 mt-1">
                    NIK tidak dapat diubah melalui halaman ini.
                </p>

            </div>


            {{-- NO KK --}}

            <div>

                <label class="block font-medium mb-2">
                    Nomor KK
                </label>

                <input
                    type="text"
                    value="{{ $resident->no_kk }}"
                    disabled
                    class="w-full border bg-gray-100 rounded-lg p-3">

                <p class="text-xs text-gray-500 mt-1">
                    Nomor KK tidak dapat diubah melalui halaman ini.
                </p>

            </div>


            {{-- NAMA --}}

            <div>

                <label class="block font-medium mb-2">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $resident->name) }}"
                    class="w-full border rounded-lg p-3">

            </div>


            {{-- TANGGAL LAHIR --}}

            <div>

                <label class="block font-medium mb-2">
                    Tanggal Lahir
                </label>

                <input
                    type="date"
                    name="birth_date"
                    value="{{ old(
                        'birth_date',
                        optional($resident->birth_date)->format('Y-m-d')
                    ) }}"
                    class="w-full border rounded-lg p-3">

            </div>


            {{-- WHATSAPP --}}

            <div>

                <label class="block font-medium mb-2">
                    Nomor WhatsApp
                </label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $resident->phone) }}"
                    class="w-full border rounded-lg p-3">

            </div>


            {{-- EMAIL --}}

            <div>

                <label class="block font-medium mb-2">
                    Email
                </label>

                <input
                    type="email"
                    value="{{ $user->email }}"
                    disabled
                    class="w-full border bg-gray-100 rounded-lg p-3">

            </div>


        </div>


        {{-- ALAMAT --}}

        <div class="mt-6">

            <label class="block font-medium mb-2">
                Alamat
            </label>

            <textarea
                name="address"
                rows="4"
                class="w-full border rounded-lg p-3"
            >{{ old('address', $resident->address) }}</textarea>

        </div>


        <div class="mt-6">

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold">

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

@endsection