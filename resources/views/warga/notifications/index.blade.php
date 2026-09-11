@extends('layouts.warga')

@section('title', 'Notifikasi')

@section('content')

@php
    $unreadCount = $notifications->where('is_read', false)->count();
@endphp

<div class="space-y-8">

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 rounded-[2rem] p-6 sm:p-8 text-white shadow-xl shadow-blue-100">

        <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-24 left-1/3 w-72 h-72 bg-white/10 rounded-full"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div class="max-w-2xl">

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-blue-100">
                    Pusat Informasi
                </div>

                <h1 class="text-3xl sm:text-4xl font-black tracking-tight mt-4">
                    Notifikasi
                </h1>

                <p class="text-blue-100 mt-3 leading-relaxed">
                    Lihat pembaruan terbaru mengenai permohonan surat, pengaduan, dan pelayanan desa Anda.
                </p>

            </div>

            @if($unreadCount > 0)

                <form action="{{ route('warga.notifications.read-all') }}" method="POST">
                    @csrf

                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2 bg-white text-blue-700 hover:bg-blue-50 px-5 py-3.5 rounded-2xl font-bold transition shadow-sm">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M5 13l4 4L19 7"/>

                        </svg>

                        Tandai Semua Dibaca

                    </button>

                </form>

            @endif

        </div>

    </section>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 rounded-2xl">

            <div class="w-9 h-9 bg-emerald-100 rounded-xl flex items-center justify-center flex-shrink-0">

                <svg class="w-4 h-4"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
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
    <section>

        <div class="mb-4">

            <p class="text-xs uppercase tracking-[0.18em] font-bold text-sky-600">
                Ringkasan
            </p>

            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 mt-1">
                Status Notifikasi
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Ringkasan informasi yang tersimpan di akun Anda.
            </p>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

            <div class="relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 shadow-sm">

                <div class="absolute inset-x-0 top-0 h-1 bg-sky-500"></div>

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Total Notifikasi
                        </p>

                        <h2 class="text-3xl font-black text-slate-900 mt-2">
                            {{ $notifications->count() }}
                        </h2>

                        <p class="text-xs text-slate-400 mt-2">
                            Seluruh informasi yang pernah diterima.
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center">

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

                </div>

            </div>


            <div class="relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-5 shadow-sm">

                <div class="absolute inset-x-0 top-0 h-1 {{ $unreadCount > 0 ? 'bg-blue-500' : 'bg-slate-300' }}"></div>

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Belum Dibaca
                        </p>

                        <h2 class="text-3xl font-black {{ $unreadCount > 0 ? 'text-blue-600' : 'text-slate-900' }} mt-2">
                            {{ $unreadCount }}
                        </h2>

                        <p class="text-xs text-slate-400 mt-2">
                            Notifikasi yang belum Anda buka.
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-2xl
                        {{ $unreadCount > 0
                            ? 'bg-blue-100 text-blue-600'
                            : 'bg-slate-100 text-slate-400' }}
                        flex items-center justify-center">

                        <svg class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>

                        </svg>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- LIST NOTIFIKASI --}}
    <section class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

        <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-sky-50/40">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div>

                    <p class="text-xs uppercase tracking-[0.18em] font-bold text-sky-600">
                        Riwayat
                    </p>

                    <h2 class="font-bold text-xl text-slate-900 mt-1">
                        Semua Notifikasi
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        Klik notifikasi untuk membuka detail informasi.
                    </p>

                </div>

                @if($unreadCount > 0)

                    <span class="inline-flex w-fit items-center gap-2 bg-sky-50 text-sky-700 border border-sky-200 px-3 py-1.5 rounded-full text-xs font-semibold">

                        <span class="w-2 h-2 bg-sky-500 rounded-full"></span>

                        {{ $unreadCount }} Baru

                    </span>

                @endif

            </div>

        </div>


        {{-- FILTER & PENCARIAN --}}
        <div class="px-5 sm:px-6 py-4 border-b border-slate-200 bg-white">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                <div class="flex flex-wrap gap-2">

                    <button type="button"
                            data-notification-filter="all"
                            class="notification-filter-btn bg-sky-600 text-white border-sky-600 inline-flex items-center justify-center px-4 py-2 rounded-xl border text-sm font-semibold transition">
                        Semua
                    </button>

                    <button type="button"
                            data-notification-filter="unread"
                            class="notification-filter-btn bg-white text-slate-600 border-slate-200 hover:bg-slate-50 inline-flex items-center justify-center px-4 py-2 rounded-xl border text-sm font-semibold transition">
                        Belum Dibaca
                    </button>

                    <button type="button"
                            data-notification-filter="surat"
                            class="notification-filter-btn bg-white text-slate-600 border-slate-200 hover:bg-slate-50 inline-flex items-center justify-center px-4 py-2 rounded-xl border text-sm font-semibold transition">
                        Surat
                    </button>

                    <button type="button"
                            data-notification-filter="pengaduan"
                            class="notification-filter-btn bg-white text-slate-600 border-slate-200 hover:bg-slate-50 inline-flex items-center justify-center px-4 py-2 rounded-xl border text-sm font-semibold transition">
                        Pengaduan
                    </button>

                </div>

                <div class="relative w-full lg:w-72">

                    <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"/>

                    </svg>

                    <input id="notificationSearch"
                           type="text"
                           placeholder="Cari notifikasi..."
                           class="w-full rounded-xl border border-slate-200 bg-slate-50 pl-10 pr-4 py-2.5 text-sm text-slate-700 outline-none focus:border-sky-400 focus:ring-4 focus:ring-sky-100 transition">

                </div>

            </div>

        </div>


        <div id="notificationList"
             class="divide-y divide-slate-100">

            @forelse($notifications as $notification)

                <a href="{{ route('warga.notifications.read', $notification) }}"
                   data-notification-item
                   data-type="{{ strtolower($notification->type ?? 'surat') }}"
                   data-read="{{ $notification->is_read ? '1' : '0' }}"
                   data-search="{{ strtolower(($notification->title ?? '') . ' ' . ($notification->message ?? '') . ' ' . ($notification->type ?? '')) }}"
                   class="group block px-5 sm:px-6 py-5 transition
                   {{ !$notification->is_read
                        ? 'bg-sky-50/60 hover:bg-sky-50'
                        : 'bg-white hover:bg-slate-50' }}">

                    <div class="flex items-start justify-between gap-4">

                        <div class="flex items-start gap-4 min-w-0 flex-1">

                            {{-- ICON --}}
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0
                                {{ !$notification->is_read
                                    ? 'bg-sky-100 text-sky-600'
                                    : 'bg-slate-100 text-slate-500' }}">

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


                            {{-- CONTENT --}}
                            <div class="min-w-0 flex-1">

                                <div class="flex flex-wrap items-center gap-2">

                                    <h3 class="font-semibold text-slate-900 group-hover:text-sky-700 transition">
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

                                        <svg class="w-3.5 h-3.5"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-width="2"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                        </svg>

                                        {{ $notification->created_at->format('d M Y, H:i') }}

                                    </div>

                                    @if($notification->type)

                                        <span class="inline-flex items-center bg-slate-100 text-slate-500 rounded-full px-2.5 py-1 text-xs font-medium capitalize">
                                            {{ $notification->type }}
                                        </span>

                                    @endif

                                </div>

                                <span class="sm:hidden inline-flex mt-3 text-xs font-semibold text-sky-600">
                                    {{ $notification->type === 'pengaduan' ? 'Buka Pengaduan' : 'Buka Informasi' }}
                                </span>

                            </div>

                        </div>


                        {{-- RIGHT --}}
                        <div class="flex flex-col items-end gap-2 flex-shrink-0">

                            @if(!$notification->is_read)

                                <span class="hidden sm:inline-flex bg-sky-100 text-sky-700 border border-sky-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    Baru
                                </span>

                            @endif

                            <span class="hidden sm:inline-flex text-xs font-semibold text-sky-600 group-hover:text-sky-700">
                                {{ $notification->type === 'pengaduan' ? 'Buka Pengaduan' : 'Buka Informasi' }}
                            </span>

                        </div>

                    </div>

                </a>

            <div id="notificationNoResults"
                 class="hidden px-6 py-14 text-center">

                <div class="w-14 h-14 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center mx-auto mb-4">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"/>

                    </svg>

                </div>

                <p class="font-semibold text-slate-600">
                    Notifikasi tidak ditemukan
                </p>

                <p class="text-sm text-slate-400 mt-1">
                    Coba ubah filter atau kata pencarian.
                </p>

            </div>

            @empty

                <div class="px-6 py-16 text-center">

                    <div class="w-16 h-16 bg-sky-50 text-sky-500 rounded-2xl flex items-center justify-center mx-auto mb-4">

                        <svg class="w-7 h-7"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
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

    </section>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll('[data-notification-filter]');
        const searchInput = document.getElementById('notificationSearch');
        const items = document.querySelectorAll('[data-notification-item]');
        const noResults = document.getElementById('notificationNoResults');

        let activeFilter = 'all';

        function updateButtonState() {
            filterButtons.forEach(function (button) {
                const active = button.dataset.notificationFilter === activeFilter;

                button.classList.toggle('bg-sky-600', active);
                button.classList.toggle('text-white', active);
                button.classList.toggle('border-sky-600', active);

                button.classList.toggle('bg-white', !active);
                button.classList.toggle('text-slate-600', !active);
                button.classList.toggle('border-slate-200', !active);
            });
        }

        function applyFilters() {
            const keyword = (searchInput?.value || '').trim().toLowerCase();
            let visibleCount = 0;

            items.forEach(function (item) {
                const type = item.dataset.type || '';
                const isUnread = item.dataset.read === '0';
                const searchable = item.dataset.search || '';

                let matchesFilter = true;

                if (activeFilter === 'unread') {
                    matchesFilter = isUnread;
                } else if (activeFilter === 'surat') {
                    matchesFilter = type !== 'pengaduan';
                } else if (activeFilter === 'pengaduan') {
                    matchesFilter = type === 'pengaduan';
                }

                const matchesSearch = keyword === '' || searchable.includes(keyword);
                const show = matchesFilter && matchesSearch;

                item.classList.toggle('hidden', !show);

                if (show) {
                    visibleCount++;
                }
            });

            if (noResults) {
                noResults.classList.toggle('hidden', visibleCount > 0 || items.length === 0);
            }
        }

        filterButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                activeFilter = this.dataset.notificationFilter;
                updateButtonState();
                applyFilters();
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', applyFilters);
        }

        updateButtonState();
        applyFilters();
    });
</script>

@endsection
