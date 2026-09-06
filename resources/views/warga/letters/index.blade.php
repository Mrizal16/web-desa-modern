@extends('layouts.warga')

@section('title', 'Surat Saya')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Surat Saya
        </h1>

        <p class="text-gray-500 mt-1">
            Riwayat permohonan surat Anda.
        </p>

    </div>


    <a
        href="{{ route('warga.letters.create') }}"
        class="bg-green-600 hover:bg-green-700
               text-white px-5 py-3 rounded-lg">

        + Ajukan Surat

    </a>

</div>


@if (session('success'))

    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">

        {{ session('success') }}

    </div>

@endif


<div class="bg-white border rounded-xl shadow-sm overflow-hidden">

    @if ($letterRequests->isEmpty())

        <div class="p-10 text-center">

            <p class="text-gray-500">
                Belum ada pengajuan surat.
            </p>

            <a
                href="{{ route('warga.letters.create') }}"
                class="inline-block mt-4 text-green-600 font-semibold">

                Ajukan surat pertama

            </a>

        </div>

    @else

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50 border-b">

                    <tr class="text-left">

                        <th class="p-4">
                            Nomor
                        </th>

                        <th class="p-4">
                            Jenis Surat
                        </th>

                        <th class="p-4">
                            Tanggal
                        </th>

                        <th class="p-4">
                            Status
                        </th>

                        <th class="p-4">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach ($letterRequests as $letterRequest)

                        <tr class="border-b">

                            <td class="p-4">

                                {{ $letterRequest->request_number }}

                            </td>


                            <td class="p-4">

                                {{ $letterRequest->letterType->name }}

                            </td>


                            <td class="p-4">

                                {{ $letterRequest->created_at->format('d-m-Y') }}

                            </td>


                            <td class="p-4">

                                <span
                                    class="bg-yellow-100 text-yellow-700
                                           px-3 py-1 rounded-full text-sm">

                                    {{ $letterRequest->status }}

                                </span>

                            </td>


                            <td class="p-4">

                                <a
                                    href="{{ route(
                                        'warga.letters.show',
                                        $letterRequest
                                    ) }}"
                                    class="text-green-600 font-semibold">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @endif

</div>

@endsection