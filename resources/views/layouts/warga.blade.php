<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Warga')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
@php
    $unreadNotifications = \App\Models\Notification::where('user_id', auth()->id())
        ->where('is_read', false)
        ->count();
@endphp

<div class="flex min-h-screen">

    <aside class="w-64 bg-green-700 text-white">
        <div class="p-6 border-b border-green-600">
            <h1 class="text-xl font-bold">Desa Modern</h1>
            <p class="text-green-200 text-sm mt-1">Portal Warga</p>
        </div>

        <nav class="p-4 space-y-2">
            <a href="{{ route('warga.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-green-600">
                Dashboard
            </a>

            <a href="{{ route('warga.profile') }}" class="block px-4 py-3 rounded-lg hover:bg-green-600">
                Profil Saya
            </a>

            <a href="{{ route('warga.letters.create') }}" class="block px-4 py-3 rounded-lg hover:bg-green-600">
                Ajukan Surat
            </a>

            <a href="{{ route('warga.letters.index') }}" class="block px-4 py-3 rounded-lg hover:bg-green-600">
                Surat Saya
            </a>

            <a href="{{ route('warga.complaints.index') }}" class="block px-4 py-3 rounded-lg hover:bg-green-600">
                Pengaduan
            </a>

            <a href="{{ route('warga.notifications.index') }}"
               class="flex items-center justify-between px-4 py-3 rounded-lg hover:bg-green-600">
                <span>Notifikasi</span>

                @if($unreadNotifications > 0)
                    <span class="bg-red-500 text-white text-xs font-bold min-w-6 h-6 px-2 rounded-full flex items-center justify-center">
                        {{ $unreadNotifications > 99 ? '99+' : $unreadNotifications }}
                    </span>
                @endif
            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-green-600">
                Pengaturan
            </a>
        </nav>

        <div class="p-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full text-left px-4 py-3 rounded-lg bg-red-500 hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1">
        <header class="bg-white border-b px-8 py-5 flex justify-between items-center">
            <h2 class="font-semibold text-gray-800">Sistem Informasi Desa</h2>

            <div class="text-right">
                <p class="font-semibold">{{ auth()->user()->name }}</p>
                <p class="text-sm text-gray-500">Warga</p>
            </div>
        </header>

        <div class="p-8">
            @yield('content')
        </div>
    </main>

</div>
</body>
</html>