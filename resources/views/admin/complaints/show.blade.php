<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">

    @php
        $status = strtoupper($complaint->status ?? '');
    @endphp

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-sky-600 via-blue-600 to-indigo-700 rounded-3xl p-6 sm:p-8 mb-8 text-white shadow-lg shadow-blue-100">

        <div class="absolute -top-16 -right-16 w-48 h-48 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-20 left-1/3 w-56 h-56 bg-white/10 rounded-full"></div>

        <div class="relative flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6">

            <div>

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-widest text-blue-100">
                    Layanan Pengaduan
                </div>

                <h1 class="text-3xl sm:text-4xl font-bold mt-4">
                    Detail Pengaduan
                </h1>

                <p class="text-blue-100 mt-2 max-w-2xl">
                    Periksa informasi, lampiran, status, dan tindak lanjut pengaduan warga.
                </p>

            </div>

            <div class="flex flex-col sm:flex-row gap-3">

                <a href="{{ route('admin.dashboard') }}"
                   class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 border border-white/20 text-white px-5 py-3 rounded-xl font-semibold transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 18l-6-6 6-6"/>

                    </svg>

                    Dashboard

                </a>

                <a href="{{ route('admin.complaints.index') }}"
                   class="inline-flex items-center justify-center gap-2 bg-white text-blue-700 hover:bg-blue-50 px-5 py-3 rounded-xl font-bold transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16"/>

                    </svg>

                    Daftar Pengaduan

                </a>

            </div>

        </div>

    </div>


    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- MAIN CONTENT --}}
        <div class="xl:col-span-2 space-y-6">

            {{-- DETAIL --}}
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                    <div class="flex items-start gap-4">

                        <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>
                            </svg>
                        </div>

                        <div>
                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                                Judul Pengaduan
                            </p>

                            <h2 class="text-xl md:text-2xl font-bold text-slate-800 mt-1">
                                {{ $complaint->title }}
                            </h2>
                        </div>

                    </div>

                </div>

                <div class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- WARGA --}}
                        <div class="border border-slate-200 rounded-2xl p-4">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold">
                                    {{ strtoupper(substr($complaint->user->name ?? '-', 0, 1)) }}
                                </div>

                                <div>
                                    <p class="text-xs text-slate-400">
                                        Nama Warga
                                    </p>

                                    <p class="font-semibold text-slate-800 mt-1">
                                        {{ $complaint->user->name ?? '-' }}
                                    </p>
                                </div>

                            </div>

                        </div>

                        {{-- KATEGORI --}}
                        <div class="border border-slate-200 rounded-2xl p-4">

                            <p class="text-xs text-slate-400">
                                Kategori
                            </p>

                            <span class="inline-flex mt-2 bg-orange-50 text-orange-700 border border-orange-100 text-xs font-semibold px-3 py-1.5 rounded-full">
                                {{ $complaint->category }}
                            </span>

                        </div>

                        {{-- TANGGAL --}}
                        <div class="border border-slate-200 rounded-2xl p-4">

                            <p class="text-xs text-slate-400">
                                Tanggal Pengaduan
                            </p>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $complaint->created_at->format('d M Y, H:i') }}
                            </p>

                        </div>

                        {{-- STATUS --}}
                        <div class="border border-slate-200 rounded-2xl p-4">

                            <p class="text-xs text-slate-400 mb-2">
                                Status
                            </p>

                            @if($status === 'MENUNGGU')
                                <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                    Menunggu
                                </span>

                            @elseif($status === 'DIPROSES')
                                <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                    Diproses
                                </span>

                            @elseif($status === 'SELESAI')
                                <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                    Selesai
                                </span>

                            @else
                                <span class="inline-flex bg-slate-100 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                                    {{ $complaint->status }}
                                </span>
                            @endif

                        </div>

                    </div>

                    {{-- MESSAGE --}}
                    <div class="mt-6">

                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-bold text-slate-800">
                                Isi Pengaduan
                            </h3>

                            <span class="text-xs text-slate-400">
                                Laporan warga
                            </span>
                        </div>

                        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5">

                            <p class="text-slate-700 leading-relaxed whitespace-pre-line">
                                {{ $complaint->message }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            {{-- ATTACHMENT --}}
            @if($complaint->attachment_path)

                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.2 7.8l-6.8 6.8a2 2 0 102.8 2.8l7.5-7.5a4 4 0 00-5.7-5.7L5.5 11.7a6 6 0 108.5 8.5l6-6"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="font-bold text-slate-800">
                                    Lampiran Pengaduan
                                </h2>

                                <p class="text-sm text-slate-400 mt-1">
                                    File pendukung yang dikirim warga.
                                </p>
                            </div>

                        </div>

                    </div>

                    <div class="p-6">

                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border border-slate-200 bg-slate-50 rounded-2xl p-4">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-xl bg-white border border-slate-200 text-blue-600 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M7 3h7l5 5v13H7z"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="font-semibold text-slate-700">
                                        File Lampiran
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1">
                                        Klik tombol untuk membuka file.
                                    </p>
                                </div>

                            </div>

                            <a href="{{ asset('storage/' . $complaint->attachment_path) }}"
                               target="_blank"
                               class="inline-flex justify-center items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition">

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M14 3h7v7m0-7L10 14M5 7v12h12v-5"/>
                                </svg>

                                Lihat Lampiran
                            </a>

                        </div>

                    </div>

                </div>

            @endif

            {{-- ADMIN RESPONSE --}}
            @if($status === 'SELESAI' && $complaint->admin_response)

                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="font-bold text-slate-800">
                                    Tanggapan Admin
                                </h2>

                                <p class="text-sm text-slate-400 mt-1">
                                    Hasil tindak lanjut pengaduan.
                                </p>
                            </div>

                        </div>

                    </div>

                    <div class="p-6">

                        <div class="bg-green-50 border border-green-200 rounded-2xl p-5">

                            <p class="text-emerald-800 leading-relaxed whitespace-pre-line">
                                {{ $complaint->admin_response }}
                            </p>

                        </div>

                    </div>

                </div>

            @endif


            {{-- RIWAYAT AKTIVITAS --}}
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-sky-50/40">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                            </svg>

                        </div>

                        <div>

                            <h2 class="font-bold text-lg text-slate-800">
                                Riwayat Aktivitas
                            </h2>

                            <p class="text-sm text-slate-400 mt-1">
                                Catatan tindakan admin pada pengaduan ini.
                            </p>

                        </div>

                    </div>

                </div>

                <div class="p-5 sm:p-6">

                    @php
                        $logs = $activityLogs ?? collect();
                    @endphp

                    @forelse($logs as $log)

                        @php
                            $action = $log->action ?? '';

                            $label = match ($action) {
                                'complaint_processed' => 'Pengaduan Diproses',
                                'complaint_completed' => 'Pengaduan Diselesaikan',
                                default => $log->description ?? 'Aktivitas Admin',
                            };

                            $dotClass = match ($action) {
                                'complaint_processed' => 'bg-blue-500',
                                'complaint_completed' => 'bg-emerald-500',
                                default => 'bg-slate-400',
                            };

                            $badgeClass = match ($action) {
                                'complaint_processed' => 'bg-blue-50 text-blue-700 border-blue-200',
                                'complaint_completed' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                default => 'bg-slate-50 text-slate-600 border-slate-200',
                            };

                            $oldStatus = data_get($log->old_values, 'status');
                            $newStatus = data_get($log->new_values, 'status');
                            $adminResponse = data_get($log->new_values, 'admin_response');
                        @endphp

                        <div class="relative pl-8 pb-7 last:pb-0">

                            @if(!$loop->last)
                                <div class="absolute left-[7px] top-5 bottom-0 w-px bg-slate-200"></div>
                            @endif

                            <div class="absolute left-0 top-1.5 w-4 h-4 rounded-full {{ $dotClass }} ring-4 ring-white"></div>

                            <div class="border border-slate-200 rounded-2xl p-4 sm:p-5">

                                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3">

                                    <div>

                                        <span class="inline-flex items-center border rounded-full px-3 py-1 text-xs font-semibold {{ $badgeClass }}">
                                            {{ $label }}
                                        </span>

                                        @if($log->description)
                                            <p class="text-sm text-slate-600 mt-3 leading-relaxed">
                                                {{ $log->description }}
                                            </p>
                                        @endif

                                    </div>

                                    <div class="text-left sm:text-right flex-shrink-0">

                                        <p class="text-xs font-semibold text-slate-500">
                                            {{ $log->created_at?->format('d M Y') ?? '-' }}
                                        </p>

                                        <p class="text-xs text-slate-400 mt-1">
                                            {{ $log->created_at?->format('H:i') ?? '-' }}
                                        </p>

                                    </div>

                                </div>

                                @if($oldStatus || $newStatus)
                                    <div class="mt-4">
                                        <div class="inline-flex flex-wrap items-center gap-2 bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-600">

                                            <span class="font-semibold">
                                                Status:
                                            </span>

                                            <span>
                                                {{ $oldStatus ?? '-' }}
                                            </span>

                                            <span class="text-slate-400">
                                                →
                                            </span>

                                            <span class="font-semibold text-slate-800">
                                                {{ $newStatus ?? '-' }}
                                            </span>

                                        </div>
                                    </div>
                                @endif

                                @if($adminResponse)
                                    <div class="mt-4 bg-emerald-50 border border-emerald-200 rounded-xl p-4">

                                        <p class="text-xs uppercase tracking-wider font-semibold text-emerald-600">
                                            Tanggapan Admin
                                        </p>

                                        <p class="text-sm text-emerald-800 mt-2 leading-relaxed">
                                            {{ $adminResponse }}
                                        </p>

                                    </div>
                                @endif

                                <div class="mt-4 pt-4 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">

                                    <p class="text-xs text-slate-400">
                                        Oleh:
                                        <span class="font-semibold text-slate-600">
                                            {{ $log->user->name ?? 'Admin' }}
                                        </span>
                                    </p>

                                    @if($log->ip_address)
                                        <p class="text-xs text-slate-400">
                                            IP: {{ $log->ip_address }}
                                        </p>
                                    @endif

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="py-10 text-center">

                            <div class="w-14 h-14 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center mx-auto mb-4">

                                <svg class="w-6 h-6"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                </svg>

                            </div>

                            <p class="font-semibold text-slate-600">
                                Belum ada riwayat aktivitas
                            </p>

                            <p class="text-sm text-slate-400 mt-1">
                                Aktivitas admin pada pengaduan ini akan tampil di sini.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

        {{-- RIGHT SIDEBAR --}}
        <div class="space-y-6 xl:sticky xl:top-6 xl:self-start">

            {{-- STATUS CARD --}}
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                    <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                        Progress
                    </p>

                    <h2 class="font-bold text-slate-800 mt-1">
                        Status Pengaduan
                    </h2>

                </div>

                <div class="p-6">

                    @if($status === 'MENUNGGU')

                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>

                            <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 text-sm font-semibold px-3 py-1.5 rounded-full">
                                <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                Menunggu
                            </span>

                        </div>

                        <p class="text-sm text-slate-500 mt-4 leading-relaxed">
                            Pengaduan baru masuk dan menunggu untuk mulai ditindaklanjuti.
                        </p>

                    @elseif($status === 'DIPROSES')

                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M4 4v6h6M20 20v-6h-6M5 19a9 9 0 0014-7M19 5a9 9 0 00-14 7"/>
                                </svg>
                            </div>

                            <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-200 text-sm font-semibold px-3 py-1.5 rounded-full">
                                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                Diproses
                            </span>

                        </div>

                        <p class="text-sm text-slate-500 mt-4 leading-relaxed">
                            Pengaduan sedang dalam proses tindak lanjut oleh admin desa.
                        </p>

                    @elseif($status === 'SELESAI')

                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>

                            <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-sm font-semibold px-3 py-1.5 rounded-full">
                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                Selesai
                            </span>

                        </div>

                        <p class="text-sm text-slate-500 mt-4 leading-relaxed">
                            Pengaduan telah selesai ditindaklanjuti.
                        </p>

                    @endif

                </div>

            </div>

            {{-- ADMIN ACTION --}}
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                    <h2 class="font-bold text-slate-800">
                        Tindakan Admin
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        Kelola proses pengaduan warga.
                    </p>

                </div>

                <div class="p-6">

                    @if($status === 'MENUNGGU')

                        <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 mb-5">

                            <p class="font-semibold text-blue-800 text-sm">
                                Pengaduan belum diproses
                            </p>

                            <p class="text-sm text-blue-700 mt-1">
                                Klik tombol di bawah untuk mulai menangani pengaduan ini.
                            </p>

                        </div>

                        <form action="{{ route('admin.complaints.process', $complaint) }}"
                              method="POST">

                            @csrf

                            <button type="submit"
                                    onclick="return confirm('Mulai proses pengaduan ini?')"
                                    class="w-full inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl font-semibold transition">

                                Proses Pengaduan
                            </button>

                        </form>

                    @elseif($status === 'DIPROSES')

                        <form action="{{ route('admin.complaints.complete', $complaint) }}"
                              method="POST">

                            @csrf

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Tanggapan Admin
                                <span class="text-red-500">*</span>
                            </label>

                            <textarea name="admin_response"
                                      rows="6"
                                      required
                                      placeholder="Tuliskan hasil tindak lanjut pengaduan..."
                                      class="w-full resize-none border border-slate-300 rounded-xl px-4 py-3 text-slate-700 placeholder:text-slate-400 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition">{{ old('admin_response') }}</textarea>

                            <p class="text-xs text-slate-400 mt-2">
                                Tanggapan ini akan dapat dilihat oleh warga.
                            </p>

                            <button type="submit"
                                    onclick="return confirm('Selesaikan pengaduan ini?')"
                                    class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-xl font-semibold mt-5 transition">

                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          d="M5 13l4 4L19 7"/>
                                </svg>

                                Tandai Selesai
                            </button>

                        </form>

                    @elseif($status === 'SELESAI')

                        <div class="bg-green-50 border border-green-200 rounded-xl p-5">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="font-semibold text-emerald-800">
                                        Pengaduan Selesai
                                    </p>

                                    <p class="text-sm text-emerald-700 mt-1">
                                        Tidak ada tindakan tambahan yang diperlukan.
                                    </p>
                                </div>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>