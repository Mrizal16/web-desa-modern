@extends('layouts.warga')

@section('title', 'Ajukan Surat')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-gray-800">
        Ajukan Surat
    </h1>

    <p class="text-gray-500 mt-1">
        Pilih jenis surat yang ingin diajukan.
    </p>

</div>


@if ($letterTypes->isEmpty())

    <div class="bg-yellow-100 text-yellow-700 p-5 rounded-xl">
        Belum ada jenis surat yang tersedia.
    </div>

@else

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($letterTypes as $letterType)

            <div class="bg-white border rounded-xl p-6 shadow-sm">

                <div class="mb-5">

                    <h2 class="text-xl font-bold text-gray-800">

                        {{ $letterType->name }}

                    </h2>

                    <p class="text-gray-500 mt-2 text-sm">

                        {{ $letterType->description }}

                    </p>

                </div>


                <div class="flex gap-2 mb-5">

                    @if ($letterType->allow_pdf)

                        <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full">
                            PDF
                        </span>

                    @endif


                    @if ($letterType->allow_pickup)

                        <span class="text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                            Ambil di Balai Desa
                        </span>

                    @endif

                </div>


                <a
                    href="#"
                    class="inline-block bg-green-600 hover:bg-green-700
                           text-white px-5 py-2 rounded-lg">

                    Ajukan Surat

                </a>

            </div>

        @endforeach

    </div>

@endif

@endsection