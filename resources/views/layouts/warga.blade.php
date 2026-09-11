<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Warga')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 text-slate-800">

@php
    $unreadNotifications = \App\Models\Notification::where('user_id', auth()->id())
        ->where('is_read', false)
        ->count();
@endphp

<div class="min-h-screen">

    {{-- =========================================================
         DESKTOP SIDEBAR
    ========================================================== --}}
    <aside class="hidden lg:flex fixed inset-y-0 left-0 z-40 w-64 bg-gradient-to-b from-sky-600 to-blue-700 text-white shadow-xl flex-col">

        {{-- BRAND --}}
        <div class="px-6 py-6 border-b border-white/10">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-white/15 flex items-center justify-center backdrop-blur">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/>

                    </svg>

                </div>

                <div>

                    <h1 class="font-bold text-lg">
                        Desa Modern
                    </h1>

                    <p class="text-xs text-sky-100 mt-0.5">
                        Portal Warga
                    </p>

                </div>

            </div>

        </div>


        {{-- MENU --}}
        <nav class="p-4 space-y-2 flex-1 overflow-y-auto">

            <a href="{{ route('warga.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition
               {{ request()->routeIs('warga.dashboard')
                    ? 'bg-white text-sky-700 shadow-sm font-semibold'
                    : 'text-sky-50 hover:bg-white/10' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M3 12l9-9 9 9v9a2 2 0 01-2 2h-4v-6H9v6H5a2 2 0 01-2-2z"/>

                </svg>

                Dashboard
            </a>


            <a href="{{ route('warga.profile') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition
               {{ request()->routeIs('warga.profile*')
                    ? 'bg-white text-sky-700 shadow-sm font-semibold'
                    : 'text-sky-50 hover:bg-white/10' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M20 21a8 8 0 10-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>

                </svg>

                Profil Saya
            </a>


            <a href="{{ route('warga.letters.create') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition
               {{ request()->routeIs('warga.letters.create', 'warga.letters.form')
                    ? 'bg-white text-sky-700 shadow-sm font-semibold'
                    : 'text-sky-50 hover:bg-white/10' }}">

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


            <a href="{{ route('warga.letters.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition
               {{ request()->routeIs('warga.letters.index', 'warga.letters.show', 'warga.letters.revision*')
                    ? 'bg-white text-sky-700 shadow-sm font-semibold'
                    : 'text-sky-50 hover:bg-white/10' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                </svg>

                Surat Saya
            </a>


            <a href="{{ route('warga.complaints.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition
               {{ request()->routeIs('warga.complaints.*')
                    ? 'bg-white text-sky-700 shadow-sm font-semibold'
                    : 'text-sky-50 hover:bg-white/10' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                </svg>

                Pengaduan
            </a>


            <a href="{{ route('warga.notifications.index') }}"
               class="flex items-center justify-between px-4 py-3 rounded-xl transition
               {{ request()->routeIs('warga.notifications.*')
                    ? 'bg-white text-sky-700 shadow-sm font-semibold'
                    : 'text-sky-50 hover:bg-white/10' }}">

                <div class="flex items-center gap-3">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 01-6 0"/>

                    </svg>

                    <span>Notifikasi</span>

                </div>

                @if($unreadNotifications > 0)

                    <span class="bg-red-500 text-white text-[11px] font-bold min-w-6 h-6 px-2 rounded-full flex items-center justify-center shadow-sm">
                        {{ $unreadNotifications > 99 ? '99+' : $unreadNotifications }}
                    </span>

                @endif

            </a>

        </nav>


        {{-- USER + LOGOUT --}}
        <div class="p-4">

            <div class="bg-white/10 backdrop-blur rounded-2xl p-4 mb-3">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-white text-sky-700 flex items-center justify-center font-bold shadow-sm">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div class="min-w-0">

                        <p class="font-semibold text-sm truncate">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="text-xs text-sky-100">
                            Akun Warga
                        </p>

                    </div>

                </div>

            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit"
                        class="w-full flex items-center gap-3 bg-white text-red-600 hover:bg-red-50 px-4 py-3 rounded-xl font-semibold shadow-sm transition">

                    <div class="w-8 h-8 rounded-lg bg-red-50 flex items-center justify-center">

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4m7 14l5-5-5-5m5 5H9"/>

                        </svg>

                    </div>

                    <span>Keluar</span>

                </button>

            </form>

        </div>

    </aside>


    {{-- =========================================================
         MOBILE TOPBAR
    ========================================================== --}}
    <header class="lg:hidden fixed top-0 inset-x-0 z-40 bg-white/95 backdrop-blur border-b border-slate-200">

        <div class="h-16 px-4 flex items-center justify-between gap-3">

            <a href="{{ route('warga.dashboard') }}"
               class="flex items-center gap-3 min-w-0">

                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 to-blue-600 text-white flex items-center justify-center shadow-sm flex-shrink-0">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/>

                    </svg>

                </div>

                <div class="min-w-0">

                    <p class="font-bold text-slate-900 text-sm leading-tight truncate">
                        Desa Modern
                    </p>

                    <p class="text-[11px] text-slate-400 mt-0.5">
                        Portal Warga
                    </p>

                </div>

            </a>


            <div class="flex items-center gap-2">

                {{-- NOTIFICATION --}}
                <a href="{{ route('warga.notifications.index') }}"
                   class="relative w-10 h-10 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5"/>

                    </svg>

                    @if($unreadNotifications > 0)

                        <span class="absolute -top-1 -right-1 min-w-5 h-5 px-1 rounded-full bg-red-500 text-white text-[9px] flex items-center justify-center font-bold">
                            {{ $unreadNotifications > 9 ? '9+' : $unreadNotifications }}
                        </span>

                    @endif

                </a>


                {{-- PROFILE MENU --}}
                <details class="relative">

                    <summary class="list-none cursor-pointer w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 to-blue-600 text-white flex items-center justify-center font-bold shadow-sm">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </summary>

                    <div class="absolute right-0 mt-2 w-56 bg-white border border-slate-200 rounded-2xl shadow-xl p-2 z-50">

                        <div class="px-3 py-3 border-b border-slate-100">

                            <p class="font-semibold text-sm text-slate-900 truncate">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Akun Warga
                            </p>

                        </div>

                        <a href="{{ route('warga.profile') }}"
                           class="flex items-center gap-3 px-3 py-3 rounded-xl text-sm text-slate-600 hover:bg-sky-50 hover:text-sky-700 transition">

                            <svg class="w-4 h-4"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M20 21a8 8 0 10-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>

                            </svg>

                            Profil Saya

                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit"
                                    class="w-full flex items-center gap-3 px-3 py-3 rounded-xl text-sm text-red-600 hover:bg-red-50 transition">

                                <svg class="w-4 h-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4m7 14l5-5-5-5m5 5H9"/>

                                </svg>

                                Keluar

                            </button>

                        </form>

                    </div>

                </details>

            </div>

        </div>

    </header>


    {{-- =========================================================
         MAIN
    ========================================================== --}}
    <main class="min-h-screen lg:ml-64 pt-16 lg:pt-0 pb-24 lg:pb-0">

        {{-- DESKTOP TOPBAR --}}
        <header class="hidden lg:flex sticky top-0 z-20 bg-white/95 backdrop-blur border-b border-slate-200 px-8 py-4 justify-between items-center">

            <div>

                <p class="text-xs font-medium text-sky-600 uppercase tracking-wider">
                    Portal Pelayanan
                </p>

                <h2 class="font-bold text-slate-800 text-lg mt-0.5">
                    Sistem Informasi Desa
                </h2>

            </div>

            <div class="flex items-center gap-4">

                <a href="{{ route('warga.notifications.index') }}"
                   class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-sky-50 text-slate-600 hover:text-sky-600 flex items-center justify-center transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5"/>

                    </svg>

                    @if($unreadNotifications > 0)

                        <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-red-500 text-white text-[10px] flex items-center justify-center font-bold">
                            {{ $unreadNotifications > 9 ? '9+' : $unreadNotifications }}
                        </span>

                    @endif

                </a>

                <div class="w-px h-8 bg-slate-200"></div>

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 to-blue-600 text-white flex items-center justify-center font-bold shadow-sm">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div>

                        <p class="font-semibold text-sm text-slate-800">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="text-xs text-slate-400 mt-0.5">
                            Warga
                        </p>

                    </div>

                </div>

            </div>

        </header>


        {{-- CONTENT --}}
        <div class="p-4 sm:p-5 md:p-6 lg:p-8">
            @yield('content')
        </div>

    </main>


    {{-- =========================================================
         MOBILE BOTTOM NAVIGATION
    ========================================================== --}}
    <nav class="lg:hidden fixed bottom-0 inset-x-0 z-40 bg-white/95 backdrop-blur border-t border-slate-200 shadow-[0_-6px_24px_rgba(15,23,42,0.06)]">

        <div class="grid grid-cols-5 h-[72px] px-1">

            {{-- DASHBOARD --}}
            <a href="{{ route('warga.dashboard') }}"
               class="flex flex-col items-center justify-center gap-1 text-[10px] font-semibold transition
               {{ request()->routeIs('warga.dashboard')
                    ? 'text-sky-600'
                    : 'text-slate-400' }}">

                <div class="w-9 h-9 rounded-xl flex items-center justify-center
                    {{ request()->routeIs('warga.dashboard')
                        ? 'bg-sky-100'
                        : '' }}">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M3 12l9-9 9 9v9a2 2 0 01-2 2h-4v-6H9v6H5a2 2 0 01-2-2z"/>

                    </svg>

                </div>

                <span>Beranda</span>

            </a>


            {{-- AJUKAN --}}
            <a href="{{ route('warga.letters.create') }}"
               class="flex flex-col items-center justify-center gap-1 text-[10px] font-semibold transition
               {{ request()->routeIs('warga.letters.create', 'warga.letters.form')
                    ? 'text-sky-600'
                    : 'text-slate-400' }}">

                <div class="w-9 h-9 rounded-xl flex items-center justify-center
                    {{ request()->routeIs('warga.letters.create', 'warga.letters.form')
                        ? 'bg-sky-100'
                        : '' }}">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 4v16m8-8H4"/>

                    </svg>

                </div>

                <span>Ajukan</span>

            </a>


            {{-- SURAT --}}
            <a href="{{ route('warga.letters.index') }}"
               class="flex flex-col items-center justify-center gap-1 text-[10px] font-semibold transition
               {{ request()->routeIs('warga.letters.index', 'warga.letters.show', 'warga.letters.revision*')
                    ? 'text-sky-600'
                    : 'text-slate-400' }}">

                <div class="w-9 h-9 rounded-xl flex items-center justify-center
                    {{ request()->routeIs('warga.letters.index', 'warga.letters.show', 'warga.letters.revision*')
                        ? 'bg-sky-100'
                        : '' }}">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                    </svg>

                </div>

                <span>Surat</span>

            </a>


            {{-- PENGADUAN --}}
            <a href="{{ route('warga.complaints.index') }}"
               class="flex flex-col items-center justify-center gap-1 text-[10px] font-semibold transition
               {{ request()->routeIs('warga.complaints.*')
                    ? 'text-sky-600'
                    : 'text-slate-400' }}">

                <div class="w-9 h-9 rounded-xl flex items-center justify-center
                    {{ request()->routeIs('warga.complaints.*')
                        ? 'bg-sky-100'
                        : '' }}">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                    </svg>

                </div>

                <span>Pengaduan</span>

            </a>


            {{-- NOTIFIKASI --}}
            <a href="{{ route('warga.notifications.index') }}"
               class="relative flex flex-col items-center justify-center gap-1 text-[10px] font-semibold transition
               {{ request()->routeIs('warga.notifications.*')
                    ? 'text-sky-600'
                    : 'text-slate-400' }}">

                <div class="relative w-9 h-9 rounded-xl flex items-center justify-center
                    {{ request()->routeIs('warga.notifications.*')
                        ? 'bg-sky-100'
                        : '' }}">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5"/>

                    </svg>

                    @if($unreadNotifications > 0)

                        <span class="absolute -top-1 -right-1 min-w-4 h-4 px-1 rounded-full bg-red-500 text-white text-[8px] flex items-center justify-center font-bold">
                            {{ $unreadNotifications > 9 ? '9+' : $unreadNotifications }}
                        </span>

                    @endif

                </div>

                <span>Notifikasi</span>

            </a>

        </div>

    </nav>

</div>

</body>
</html>
