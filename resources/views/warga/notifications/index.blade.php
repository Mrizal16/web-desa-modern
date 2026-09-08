@extends('layouts.warga')

@section('title', 'Notifikasi')

@section('content')

@php
    $unreadCount = $notifications->where('is_read', false)->count();
@endphp

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

        <div>
            <p class="text-sm font-semibold text-sky-600">
                Pusat Informasi
            </p>

            <h1 class="text-3xl font-bold text-slate-800 mt-1">
                Notifikasi
            </h1>

            <p class="text-slate-500 mt-1">
                Informasi terbaru mengenai permohonan surat dan pelayanan desa Anda.
            </p>
        </div>

        @if($unreadCount > 0)
            <form action="{{ route('warga.notifications.read-all') }}" method="POST">
                @csrf

                <button type="submit"
                        class="inline-flex items-center justify-center gap-2 bg-white hover:bg-sky-50 border border-slate-200 hover:border-sky-300 text-slate-700 hover:text-sky-700 px-5 py-3 rounded-xl font-semibold shadow-sm transition">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M5 13l4 4L19 7"/>
                    </svg>

                    Tandai Semua Dibaca
                </button>
            </form>
        @endif

    </div>

    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="flex items-start gap-3 bg-sky-50 border border-sky-200 text-sky-700 p-4 rounded-2xl">

            <div class="w-9 h-9 bg-sky-100 rounded-xl flex items-center justify-center flex-shrink-0">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M5 13l4 4L19 7"/>
                </svg>

            </div>

            <div>
                <p class="font-semibold">
                    Berhasil
                </p>

                <p class="text-sm mt-1">
                    {{ session('success') }}
                </p>
            </div>

        </div>

    @endif

    {{-- RINGKASAN --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-slate-500">
                        Total Notifikasi
                    </p>

                    <h2 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $notifications->count() }}
                    </h2>
                </div>

                <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 01-6 0"/>
                    </svg>

                </div>

            </div>

        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-slate-500">
                        Belum Dibaca
                    </p>

                    <h2 class="text-3xl font-bold {{ $unreadCount > 0 ? 'text-sky-600' : 'text-slate-800' }} mt-1">
                        {{ $unreadCount }}
                    </h2>
                </div>

                <div class="w-12 h-12 rounded-xl
                    {{ $unreadCount > 0
                        ? 'bg-blue-100 text-blue-600'
                        : 'bg-slate-100 text-slate-400' }}
                    flex items-center justify-center">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                    </svg>

                </div>

            </div>

        </div>

    </div>

    {{-- LIST NOTIFIKASI --}}
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <h2 class="font-bold text-lg text-slate-800">
                        Semua Notifikasi
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        Klik notifikasi untuk membuka detail informasi.
                    </p>
                </div>

                @if($unreadCount > 0)

                    <span class="hidden sm:inline-flex items-center gap-2 bg-sky-50 text-sky-700 border border-sky-100 px-3 py-1.5 rounded-full text-xs font-semibold">

                        <span class="w-2 h-2 bg-sky-500 rounded-full"></span>

                        {{ $unreadCount }} Baru

                    </span>

                @endif

            </div>

        </div>

        <div class="divide-y divide-slate-100">

            @forelse($notifications as $notification)

                <a href="{{ route('warga.notifications.read', $notification) }}"
                   class="group block px-6 py-5 transition
                   {{ !$notification->is_read
                        ? 'bg-sky-50/60 hover:bg-sky-50'
                        : 'bg-white hover:bg-slate-50' }}">

                    <div class="flex items-start justify-between gap-5">

                        <div class="flex items-start gap-4 min-w-0 flex-1">

                            {{-- ICON --}}
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0
                                {{ !$notification->is_read
                                    ? 'bg-sky-100 text-sky-600'
                                    : 'bg-slate-100 text-slate-500' }}">

                                @if($notification->type === 'pengaduan')

                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>
                                    </svg>

                                @else

                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>
                                    </svg>

                                @endif

                            </div>

                            {{-- CONTENT --}}
                            <div class="min-w-0 flex-1">

                                <div class="flex flex-wrap items-center gap-2">

                                    <h3 class="font-semibold text-slate-800 group-hover:text-sky-700 transition">
                                        {{ $notification->title }}
                                    </h3>

                                    @if(!$notification->is_read)
                                        <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
                                    @endif

                                </div>

                                <p class="text-sm text-slate-500 mt-1.5 leading-relaxed">
                                    {{ $notification->message }}
                                </p>

                                <div class="flex flex-wrap items-center gap-x-4 gap-y-2 mt-3">

                                    <div class="inline-flex items-center gap-1.5 text-xs text-slate-400">

                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>

                                        {{ $notification->created_at->format('d M Y, H:i') }}

                                    </div>

                                    @if($notification->type)

                                        <span class="text-xs font-medium text-slate-400 capitalize">
                                            {{ $notification->type }}
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>

                        {{-- RIGHT --}}
                        <div class="flex items-center gap-3 flex-shrink-0">

                            @if(!$notification->is_read)

                                <span class="hidden sm:inline-flex bg-sky-100 text-sky-700 border border-sky-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    Baru
                                </span>

                            @endif

                            <div class="w-8 h-8 rounded-lg bg-slate-50 text-slate-400 group-hover:bg-sky-100 group-hover:text-sky-600 flex items-center justify-center transition">

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 18l6-6-6-6"/>
                                </svg>

                            </div>

                        </div>

                    </div>

                </a>

            @empty

                {{-- EMPTY --}}
                <div class="px-6 py-16 text-center">

                    <div class="w-16 h-16 bg-sky-50 text-sky-500 rounded-2xl flex items-center justify-center mx-auto mb-4">

                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 01-6 0"/>
                        </svg>

                    </div>

                    <h3 class="font-bold text-slate-700">
                        Belum Ada Notifikasi
                    </h3>

                    <p class="text-sm text-slate-400 mt-2 max-w-md mx-auto">
                        Informasi mengenai permohonan surat dan pengaduan Anda akan tampil di halaman ini.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection