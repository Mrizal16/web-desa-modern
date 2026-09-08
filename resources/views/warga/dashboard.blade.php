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

<div>
    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-500 mt-1">
        Selamat datang, {{ auth()->user()->name }}
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

    <div class="bg-white rounded-xl p-6 shadow-sm border">
        <p class="text-gray-500">Pengajuan Aktif</p>
        <h2 class="text-4xl font-bold mt-3">
            {{ $activeLetters }}
        </h2>
    </div>

    <div class="bg-white rounded-xl p-6 shadow-sm border">
        <p class="text-gray-500">Surat Selesai</p>
        <h2 class="text-4xl font-bold mt-3">
            {{ $completedLetters }}
        </h2>
    </div>

    <div class="bg-white rounded-xl p-6 shadow-sm border">
        <p class="text-gray-500">Pengaduan</p>
        <h2 class="text-4xl font-bold mt-3">
            {{ $complaintCount }}
        </h2>
    </div>

</div>

<div class="bg-white rounded-xl border shadow-sm mt-8">
    <div class="p-6 border-b flex items-center justify-between">
        <h2 class="font-bold text-xl">Notifikasi Terbaru</h2>

        <a href="{{ route('warga.notifications.index') }}"
           class="text-green-600 hover:text-green-700 text-sm font-semibold">
            Lihat Semua
        </a>
    </div>

    @forelse($latestNotifications as $notification)

        <a href="{{ route('warga.notifications.read', $notification) }}"
           class="block p-5 border-b last:border-b-0 hover:bg-gray-50">

            <div class="flex justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2">
                        <h3 class="font-semibold text-gray-800">
                            {{ $notification->title }}
                        </h3>

                        @if(!$notification->is_read)
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        @endif
                    </div>

                    <p class="text-sm text-gray-500 mt-1">
                        {{ $notification->message }}
                    </p>

                    <p class="text-xs text-gray-400 mt-2">
                        {{ $notification->created_at->format('d-m-Y H:i') }}
                    </p>
                </div>

                @if(!$notification->is_read)
                    <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full h-fit">
                        Baru
                    </span>
                @endif
            </div>

        </a>

    @empty

        <div class="p-8 text-center text-gray-500">
            Belum ada notifikasi.
        </div>

    @endforelse
</div>

@endsection