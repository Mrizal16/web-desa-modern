@extends('layouts.warga')

@section('title', 'Dashboard Warga')

@section('content')

@php
    $userId = auth()->id();

    $activeLetters = \App\Models\LetterRequest::where('user_id', $userId)
        ->whereNotIn('status', ['SELESAI', 'DITOLAK'])
        ->count();

    $completedLetters = \App\Models\LetterRequest::where('user_id', $userId)
        ->where('status', 'SELESAI')
        ->count();

    $complaintCount = \App\Models\Complaint::where('user_id', $userId)->count();

    $latestNotifications = \App\Models\Notification::where('user_id', $userId)
        ->latest()
        ->take(5)
        ->get();
@endphp

<div class="space-y-8">

    {{-- HERO --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-sky-500 via-blue-500 to-blue-600 rounded-3xl p-7 md:p-9 text-white shadow-lg">

        <div class="absolute -right-16 -top-16 w-52 h-52 bg-white/10 rounded-full"></div>
        <div class="absolute right-20 -bottom-24 w-56 h-56 bg-white/10 rounded-full"></div>

        <div class="relative z-10">
            <p class="text-sky-100 text-sm font-medium">
                Portal Warga
            </p>

            <h1 class="text-2xl md:text-4xl font-bold mt-2">
                Halo, {{ auth()->user()->name }}
            </h1>

            <p class="text-sky-100 mt-3 max-w-2xl leading-relaxed">
                Kelola permohonan surat, pengaduan, dan informasi pelayanan desa dengan mudah dari satu tempat.
            </p>

            <div class="flex flex-wrap gap-3 mt-6">

                <a href="{{ route('warga.letters.create') }}"
                   class="inline-flex items-center gap-2 bg-white text-sky-700 px-5 py-3 rounded-xl font-semibold hover:bg-sky-50 transition shadow-sm">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M12 4v16m8-8H4"/>
                    </svg>

                    Ajukan Surat
                </a>

                <a href="{{ route('warga.complaints.create') }}"
                   class="inline-flex items-center gap-2 bg-white/10 border border-white/20 text-white px-5 py-3 rounded-xl font-semibold hover:bg-white/20 transition backdrop-blur">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>
                    </svg>

                    Buat Pengaduan
                </a>

            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">

        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm hover:shadow-md transition">
            <div class="flex justify-between items-start">

                <div>
                    <p class="text-sm text-slate-500">Pengajuan Aktif</p>

                    <h2 class="text-3xl font-bold text-sky-600 mt-2">
                        {{ $activeLetters }}
                    </h2>

                    <p class="text-xs text-slate-400 mt-2">
                        Surat yang masih dalam proses.
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>
                    </svg>
                </div>

            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm hover:shadow-md transition">
            <div class="flex justify-between items-start">

                <div>
                    <p class="text-sm text-slate-500">Surat Selesai</p>

                    <h2 class="text-3xl font-bold text-blue-600 mt-2">
                        {{ $completedLetters }}
                    </h2>

                    <p class="text-xs text-slate-400 mt-2">
                        Permohonan yang sudah selesai.
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm hover:shadow-md transition">
            <div class="flex justify-between items-start">

                <div>
                    <p class="text-sm text-slate-500">Pengaduan</p>

                    <h2 class="text-3xl font-bold text-indigo-600 mt-2">
                        {{ $complaintCount }}
                    </h2>

                    <p class="text-xs text-slate-400 mt-2">
                        Total pengaduan yang pernah dikirim.
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>
                    </svg>
                </div>

            </div>
        </div>

    </div>

    {{-- AKSES CEPAT --}}
    <div>

        <div class="mb-4">
            <h2 class="text-lg font-bold text-slate-800">
                Akses Cepat
            </h2>

            <p class="text-sm text-slate-400 mt-1">
                Pelayanan yang sering digunakan.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <a href="{{ route('warga.letters.create') }}"
               class="group bg-white border border-slate-200 rounded-2xl p-5 hover:shadow-md hover:border-sky-300 transition">

                <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center mb-4 group-hover:bg-sky-600 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                </div>

                <h3 class="font-bold group-hover:text-sky-600 transition">
                    Ajukan Surat
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Buat permohonan surat baru.
                </p>
            </a>

            <a href="{{ route('warga.letters.index') }}"
               class="group bg-white border border-slate-200 rounded-2xl p-5 hover:shadow-md hover:border-blue-300 transition">

                <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center mb-4 group-hover:bg-blue-600 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>
                    </svg>
                </div>

                <h3 class="font-bold group-hover:text-blue-600 transition">
                    Surat Saya
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Lihat status seluruh permohonan.
                </p>
            </a>

            <a href="{{ route('warga.complaints.index') }}"
               class="group bg-white border border-slate-200 rounded-2xl p-5 hover:shadow-md hover:border-indigo-300 transition">

                <div class="w-11 h-11 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center mb-4 group-hover:bg-indigo-600 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>
                    </svg>
                </div>

                <h3 class="font-bold group-hover:text-indigo-600 transition">
                    Pengaduan
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Pantau dan kirim pengaduan.
                </p>
            </a>

            <a href="{{ route('warga.notifications.index') }}"
               class="group bg-white border border-slate-200 rounded-2xl p-5 hover:shadow-md hover:border-violet-300 transition">

                <div class="w-11 h-11 rounded-xl bg-violet-100 text-violet-600 flex items-center justify-center mb-4 group-hover:bg-violet-600 group-hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 01-6 0"/>
                    </svg>
                </div>

                <h3 class="font-bold group-hover:text-violet-600 transition">
                    Notifikasi
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Lihat pembaruan pelayanan terbaru.
                </p>
            </a>

        </div>
    </div>

    {{-- NOTIFIKASI TERBARU --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">

        <div class="px-6 py-5 border-b border-slate-200 flex justify-between items-center">

            <div>
                <h2 class="font-bold text-lg">
                    Notifikasi Terbaru
                </h2>

                <p class="text-sm text-slate-400 mt-1">
                    Informasi terbaru dari pelayanan desa.
                </p>
            </div>

            <a href="{{ route('warga.notifications.index') }}"
               class="text-sm text-sky-600 font-semibold hover:text-sky-700">
                Lihat Semua
            </a>

        </div>

        <div class="divide-y divide-slate-100">

            @forelse($latestNotifications as $notification)

                <a href="{{ route('warga.notifications.read', $notification) }}"
                   class="block px-6 py-5 hover:bg-sky-50/40 transition">

                    <div class="flex justify-between gap-5">

                        <div class="flex gap-4">

                            <div class="w-11 h-11 rounded-xl flex-shrink-0
                                {{ $notification->type === 'pengaduan'
                                    ? 'bg-indigo-100 text-indigo-600'
                                    : 'bg-sky-100 text-sky-600' }}
                                flex items-center justify-center">

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

                            <div>

                                <div class="flex items-center gap-2">

                                    <h3 class="font-semibold text-slate-800">
                                        {{ $notification->title }}
                                    </h3>

                                    @if(!$notification->is_read)
                                        <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
                                    @endif

                                </div>

                                <p class="text-sm text-slate-500 mt-1">
                                    {{ $notification->message }}
                                </p>

                                <p class="text-xs text-slate-400 mt-2">
                                    {{ $notification->created_at->format('d M Y, H:i') }}
                                </p>

                            </div>

                        </div>

                        @if(!$notification->is_read)
                            <span class="bg-sky-100 text-sky-700 text-xs font-semibold px-3 py-1 rounded-full h-fit">
                                Baru
                            </span>
                        @endif

                    </div>

                </a>

            @empty

                <div class="px-6 py-14 text-center">

                    <div class="w-14 h-14 bg-sky-50 text-sky-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5"/>
                        </svg>
                    </div>

                    <p class="font-semibold text-slate-600">
                        Belum ada notifikasi
                    </p>

                    <p class="text-sm text-slate-400 mt-1">
                        Informasi pelayanan terbaru akan tampil di sini.
                    </p>

                </div>

            @endforelse

        </div>
    </div>

</div>

@endsection