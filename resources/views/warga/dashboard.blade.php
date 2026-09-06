@extends('layouts.warga')

@section('title', 'Dashboard Warga')

@section('content')

<div>

    <h1 class="text-3xl font-bold text-gray-800">
        Dashboard
    </h1>

    <p class="text-gray-500 mt-1">
        Selamat datang, {{ auth()->user()->name }}
    </p>

</div>


<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">


    <!-- Pengajuan Aktif -->

    <div class="bg-white rounded-xl p-6 shadow-sm border">

        <p class="text-gray-500">
            Pengajuan Aktif
        </p>

        <h2 class="text-4xl font-bold mt-3">
            0
        </h2>

    </div>


    <!-- Surat Selesai -->

    <div class="bg-white rounded-xl p-6 shadow-sm border">

        <p class="text-gray-500">
            Surat Selesai
        </p>

        <h2 class="text-4xl font-bold mt-3">
            0
        </h2>

    </div>


    <!-- Pengaduan -->

    <div class="bg-white rounded-xl p-6 shadow-sm border">

        <p class="text-gray-500">
            Pengaduan
        </p>

        <h2 class="text-4xl font-bold mt-3">
            0
        </h2>

    </div>


</div>


<div class="bg-white rounded-xl border shadow-sm mt-8">

    <div class="p-6 border-b">

        <h2 class="font-bold text-xl">
            Notifikasi Terbaru
        </h2>

    </div>


    <div class="p-8 text-center text-gray-500">

        Belum ada notifikasi.

    </div>

</div>

@endsection