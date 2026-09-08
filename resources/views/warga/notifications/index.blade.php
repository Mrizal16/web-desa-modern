@extends('layouts.warga')

@section('title', 'Notifikasi')

@section('content')

<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Notifikasi</h1>
        <p class="text-gray-500 mt-1">
            Informasi terbaru mengenai pelayanan desa Anda.
        </p>
    </div>

    @if($notifications->where('is_read', false)->count() > 0)
        <form action="{{ route('warga.notifications.read-all') }}" method="POST">
            @csrf
            <button type="submit"
                class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg">
                Tandai Semua Dibaca
            </button>
        </form>
    @endif
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="space-y-3">
    @forelse($notifications as $notification)

        <a href="{{ route('warga.notifications.read', $notification) }}"
            class="block bg-white border rounded-xl p-5 shadow-sm hover:shadow transition
            {{ !$notification->is_read ? 'border-green-300 bg-green-50' : 'border-gray-200' }}">

            <div class="flex justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2">
                        <h2 class="font-bold text-gray-800">
                            {{ $notification->title }}
                        </h2>

                        @if(!$notification->is_read)
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        @endif
                    </div>

                    <p class="text-gray-600 mt-2">
                        {{ $notification->message }}
                    </p>

                    <p class="text-xs text-gray-400 mt-3">
                        {{ $notification->created_at->format('d-m-Y H:i') }}
                    </p>
                </div>

                @if(!$notification->is_read)
                    <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full h-fit">
                        Baru
                    </span>
                @endif
            </div>

        </a>

    @empty

        <div class="bg-white border border-gray-200 rounded-xl p-10 text-center">
            <p class="text-gray-500">
                Belum ada notifikasi.
            </p>
        </div>

    @endforelse
</div>

@endsection