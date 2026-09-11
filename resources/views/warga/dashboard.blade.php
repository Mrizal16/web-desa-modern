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
    <section class="relative overflow-hidden bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 rounded-[2rem] p-6 sm:p-8 md:p-10 text-white shadow-xl shadow-blue-100">

        <div class="absolute -top-24 -right-16 w-72 h-72 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-28 left-1/3 w-80 h-80 bg-white/10 rounded-full"></div>
        <div class="absolute top-10 right-1/4 w-20 h-20 border border-white/10 rounded-3xl rotate-12"></div>

        <div class="relative z-10 flex flex-col xl:flex-row xl:items-center xl:justify-between gap-8">

            <div class="max-w-3xl">

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-blue-100">

                    <span class="w-2 h-2 rounded-full bg-emerald-300"></span>

                    Portal Warga

                </div>

                <h1 class="text-3xl md:text-5xl font-black tracking-tight mt-5">
                    Halo, {{ auth()->user()->name }}
                </h1>

                <p class="text-blue-100 mt-4 max-w-2xl leading-relaxed text-base md:text-lg">
                    Kelola permohonan surat, pengaduan, dan informasi pelayanan desa dari satu tempat yang lebih mudah digunakan.
                </p>

            </div>

            <div class="flex flex-col sm:flex-row xl:flex-col gap-3 xl:min-w-[220px]">

                <a href="{{ route('warga.letters.create') }}"
                   class="inline-flex items-center justify-center gap-2 bg-white text-blue-700 px-5 py-3.5 rounded-2xl font-bold hover:bg-blue-50 transition shadow-sm">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 4v16m8-8H4"/>

                    </svg>

                    Ajukan Surat

                </a>

                <a href="{{ route('warga.complaints.create') }}"
                   class="inline-flex items-center justify-center gap-2 bg-white/10 border border-white/20 text-white px-5 py-3.5 rounded-2xl font-semibold hover:bg-white/20 transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                    </svg>

                    Buat Pengaduan

                </a>

            </div>

        </div>

    </section>


    {{-- STATISTIK --}}
    <section>

        <div class="mb-4">

            <p class="text-xs uppercase tracking-[0.18em] font-bold text-sky-600">
                Ringkasan
            </p>

            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 mt-1">
                Aktivitas Pelayanan Anda
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Ringkasan permohonan dan pengaduan yang tersimpan di akun Anda.
            </p>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">

            <div class="relative overflow-hidden bg-white rounded-3xl border border-slate-200 p-5 shadow-sm hover:shadow-lg transition">

                <div class="absolute inset-x-0 top-0 h-1 bg-sky-500"></div>

                <div class="flex justify-between items-start gap-4">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Pengajuan Aktif
                        </p>

                        <h2 class="text-3xl font-black text-sky-600 mt-2">
                            {{ $activeLetters }}
                        </h2>

                        <p class="text-xs text-slate-400 mt-2">
                            Surat yang masih dalam proses.
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                        </svg>

                    </div>

                </div>

            </div>


            <div class="relative overflow-hidden bg-white rounded-3xl border border-slate-200 p-5 shadow-sm hover:shadow-lg transition">

                <div class="absolute inset-x-0 top-0 h-1 bg-emerald-500"></div>

                <div class="flex justify-between items-start gap-4">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Surat Selesai
                        </p>

                        <h2 class="text-3xl font-black text-emerald-600 mt-2">
                            {{ $completedLetters }}
                        </h2>

                        <p class="text-xs text-slate-400 mt-2">
                            Permohonan yang sudah selesai.
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M5 13l4 4L19 7"/>

                        </svg>

                    </div>

                </div>

            </div>


            <div class="relative overflow-hidden bg-white rounded-3xl border border-slate-200 p-5 shadow-sm hover:shadow-lg transition">

                <div class="absolute inset-x-0 top-0 h-1 bg-indigo-500"></div>

                <div class="flex justify-between items-start gap-4">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Pengaduan
                        </p>

                        <h2 class="text-3xl font-black text-indigo-600 mt-2">
                            {{ $complaintCount }}
                        </h2>

                        <p class="text-xs text-slate-400 mt-2">
                            Total pengaduan yang pernah dikirim.
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                        </svg>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- AKSES CEPAT --}}
    <section>

        <div class="mb-4">

            <p class="text-xs uppercase tracking-[0.18em] font-bold text-slate-400">
                Layanan
            </p>

            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 mt-1">
                Akses Cepat
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Pilih layanan yang ingin Anda gunakan.
            </p>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <a href="{{ route('warga.letters.create') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-sky-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute -right-8 -top-8 w-28 h-28 rounded-full bg-sky-50"></div>

                <div class="relative">

                    <div class="w-12 h-12 rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 4v16m8-8H4"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-slate-900 group-hover:text-sky-600 mt-5 transition">
                        Ajukan Surat
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Buat permohonan surat baru secara online.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-sky-600 mt-5">
                        Mulai Pengajuan

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>

                    </span>

                </div>

            </a>


            <a href="{{ route('warga.letters.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-blue-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute -right-8 -top-8 w-28 h-28 rounded-full bg-blue-50"></div>

                <div class="relative">

                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-slate-900 group-hover:text-blue-600 mt-5 transition">
                        Surat Saya
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Lihat status seluruh permohonan surat Anda.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 mt-5">
                        Lihat Permohonan

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>

                    </span>

                </div>

            </a>


            <a href="{{ route('warga.complaints.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-indigo-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute -right-8 -top-8 w-28 h-28 rounded-full bg-indigo-50"></div>

                <div class="relative">

                    <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-slate-900 group-hover:text-indigo-600 mt-5 transition">
                        Pengaduan
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Pantau dan kirim pengaduan kepada desa.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-indigo-600 mt-5">
                        Lihat Pengaduan

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>

                    </span>

                </div>

            </a>


            <a href="{{ route('warga.notifications.index') }}"
               class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 hover:border-violet-300 hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="absolute -right-8 -top-8 w-28 h-28 rounded-full bg-violet-50"></div>

                <div class="relative">

                    <div class="w-12 h-12 rounded-2xl bg-violet-100 text-violet-600 flex items-center justify-center">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 01-6 0"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-slate-900 group-hover:text-violet-600 mt-5 transition">
                        Notifikasi
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Lihat pembaruan terbaru dari pelayanan desa.
                    </p>

                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-violet-600 mt-5">
                        Buka Notifikasi

                        <svg class="w-4 h-4 transition group-hover:translate-x-1"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 18l6-6-6-6"/>

                        </svg>

                    </span>

                </div>

            </a>

        </div>

    </section>


    {{-- NOTIFIKASI TERBARU --}}
    <section class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm">

        <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-sky-50/40">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-violet-100 text-violet-600 flex items-center justify-center">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5"/>

                        </svg>

                    </div>

                    <div>

                        <h2 class="font-bold text-lg text-slate-900">
                            Notifikasi Terbaru
                        </h2>

                        <p class="text-sm text-slate-400 mt-0.5">
                            Informasi terbaru dari pelayanan desa.
                        </p>

                    </div>

                </div>

                <a href="{{ route('warga.notifications.index') }}"
                   class="inline-flex items-center gap-1 text-sm text-sky-600 font-semibold hover:text-sky-700">

                    Lihat Semua

                    <svg class="w-4 h-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M9 18l6-6-6-6"/>

                    </svg>

                </a>

            </div>

        </div>

        <div class="divide-y divide-slate-100">

            @forelse($latestNotifications as $notification)

                <a href="{{ route('warga.notifications.read', $notification) }}"
                   class="block px-5 sm:px-6 py-5 hover:bg-sky-50/40 transition">

                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">

                        <div class="flex gap-4 min-w-0">

                            <div class="w-11 h-11 rounded-xl flex-shrink-0
                                {{ $notification->type === 'pengaduan'
                                    ? 'bg-indigo-100 text-indigo-600'
                                    : 'bg-sky-100 text-sky-600' }}
                                flex items-center justify-center">

                                @if($notification->type === 'pengaduan')

                                    <svg class="w-5 h-5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                                    </svg>

                                @else

                                    <svg class="w-5 h-5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                                    </svg>

                                @endif

                            </div>

                            <div class="min-w-0">

                                <div class="flex items-center gap-2">

                                    <h3 class="font-semibold text-slate-900 truncate">
                                        {{ $notification->title }}
                                    </h3>

                                    @if(!$notification->is_read)
                                        <span class="w-2 h-2 bg-sky-500 rounded-full flex-shrink-0"></span>
                                    @endif

                                </div>

                                <p class="text-sm text-slate-500 mt-1 leading-relaxed">
                                    {{ $notification->message }}
                                </p>

                                <p class="text-xs text-slate-400 mt-2">
                                    {{ $notification->created_at->format('d M Y, H:i') }}
                                </p>

                            </div>

                        </div>

                        @if(!$notification->is_read)

                            <span class="inline-flex w-fit bg-sky-50 text-sky-700 border border-sky-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                Baru
                            </span>

                        @endif

                    </div>

                </a>

            @empty

                <div class="px-6 py-14 text-center">

                    <div class="w-14 h-14 bg-sky-50 text-sky-500 rounded-2xl flex items-center justify-center mx-auto mb-4">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
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

    </section>

</div>

@endsection
