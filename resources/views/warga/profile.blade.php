@extends('layouts.warga')

@section('title', 'Profil Saya')

@section('content')

<div class="space-y-8">

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 rounded-[2rem] p-6 sm:p-8 text-white shadow-xl shadow-blue-100">

        <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-24 left-1/3 w-72 h-72 rounded-full bg-white/10"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-blue-100">
                    Akun Warga
                </div>

                <h1 class="text-3xl sm:text-4xl font-black tracking-tight mt-4">
                    Profil Saya
                </h1>

                <p class="text-blue-100 mt-2 max-w-2xl leading-relaxed">
                    Kelola informasi identitas dan data pribadi akun warga Anda dengan lebih mudah.
                </p>

            </div>

            <div class="inline-flex items-center gap-3 bg-white/10 border border-white/20 rounded-2xl px-4 py-3">

                <div class="w-11 h-11 rounded-xl bg-white/15 flex items-center justify-center text-lg font-bold">
                    {{ strtoupper(substr($resident->name ?? auth()->user()->name, 0, 1)) }}
                </div>

                <div>
                    <p class="text-xs text-blue-100">
                        Akun aktif
                    </p>

                    <p class="font-semibold">
                        {{ $resident->name }}
                    </p>
                </div>

            </div>

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


    {{-- ERROR --}}
    @if($errors->any())

        <div class="bg-red-50 border border-red-200 rounded-2xl p-5">

            <div class="flex gap-3">

                <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 9v4m0 4h.01M10.3 3.7L2.7 17a2 2 0 001.7 3h15.2a2 2 0 001.7-3L13.7 3.7a2 2 0 00-3.4 0z"/>

                    </svg>

                </div>

                <div>

                    <p class="font-semibold text-red-700">
                        Periksa kembali data profil
                    </p>

                    <ul class="list-disc pl-5 mt-2 text-sm text-red-600 space-y-1">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- SIDEBAR PROFILE --}}
        <aside class="space-y-5">

            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden xl:sticky xl:top-6">

                <div class="h-28 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-600"></div>

                <div class="px-6 pb-6">

                    <div class="-mt-11">

                        <div class="w-22 h-22 rounded-2xl bg-white p-1.5 shadow-lg inline-block">

                            <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-sky-500 to-indigo-600 text-white flex items-center justify-center text-2xl font-bold">
                                {{ strtoupper(substr($resident->name ?? auth()->user()->name, 0, 1)) }}
                            </div>

                        </div>

                    </div>

                    <div class="mt-4">

                        <h2 class="text-xl font-bold text-slate-900">
                            {{ $resident->name }}
                        </h2>

                        <p class="text-sm text-slate-400 mt-1">
                            Warga Desa Sidorejo
                        </p>

                    </div>


                    <div class="grid grid-cols-1 gap-3 mt-5">

                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">

                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                                NIK
                            </p>

                            <p class="text-sm font-semibold text-slate-700 mt-1 break-all">
                                {{ $resident->nik }}
                            </p>

                        </div>


                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">

                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                                Email
                            </p>

                            <p class="text-sm font-semibold text-slate-700 mt-1 break-all">
                                {{ $user->email }}
                            </p>

                        </div>


                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">

                            <p class="text-xs uppercase tracking-wider font-semibold text-slate-400">
                                WhatsApp
                            </p>

                            <p class="text-sm font-semibold text-slate-700 mt-1">
                                {{ $resident->phone ?: '-' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- INFO --}}
            <div class="bg-sky-50 border border-sky-200 rounded-3xl p-5">

                <div class="flex gap-3">

                    <div class="w-10 h-10 rounded-xl bg-white text-sky-600 flex items-center justify-center flex-shrink-0">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 9h.01M11 12h1v4h1m8-4a9 9 0 11-18 0 9 9 0 0118 0z"/>

                        </svg>

                    </div>

                    <div>

                        <p class="font-semibold text-sky-800">
                            Data Identitas
                        </p>

                        <p class="text-sm text-sky-700 leading-relaxed mt-2">
                            NIK, Nomor KK, dan email tidak dapat diubah langsung melalui halaman ini.
                        </p>

                    </div>

                </div>

            </div>

        </aside>


        {{-- FORM --}}
        <div class="xl:col-span-2">

            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-sky-50/40">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M20 21a8 8 0 10-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>

                            </svg>

                        </div>

                        <div>

                            <h2 class="font-bold text-lg text-slate-900">
                                Data Identitas
                            </h2>

                            <p class="text-sm text-slate-400 mt-0.5">
                                Perbarui informasi profil yang dapat diubah.
                            </p>

                        </div>

                    </div>

                </div>


                <form action="{{ route('warga.profile.update') }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="p-5 sm:p-6 space-y-6">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            {{-- NIK --}}
                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    NIK
                                </label>

                                <div class="relative">

                                    <input type="text"
                                           value="{{ $resident->nik }}"
                                           disabled
                                           class="w-full border border-slate-200 bg-slate-100 text-slate-500 rounded-xl px-4 py-3 pr-11 cursor-not-allowed">

                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">

                                        <svg class="w-4 h-4"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-width="2"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M7 10V7a5 5 0 0110 0v3m-11 0h12v11H6z"/>

                                        </svg>

                                    </div>

                                </div>

                                <p class="text-xs text-slate-400 mt-2">
                                    NIK tidak dapat diubah melalui halaman ini.
                                </p>

                            </div>


                            {{-- NOMOR KK --}}
                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Nomor KK
                                </label>

                                <div class="relative">

                                    <input type="text"
                                           value="{{ $resident->no_kk }}"
                                           disabled
                                           class="w-full border border-slate-200 bg-slate-100 text-slate-500 rounded-xl px-4 py-3 pr-11 cursor-not-allowed">

                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">

                                        <svg class="w-4 h-4"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-width="2"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M7 10V7a5 5 0 0110 0v3m-11 0h12v11H6z"/>

                                        </svg>

                                    </div>

                                </div>

                                <p class="text-xs text-slate-400 mt-2">
                                    Nomor KK tidak dapat diubah melalui halaman ini.
                                </p>

                            </div>


                            {{-- NAMA --}}
                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Nama Lengkap
                                    <span class="text-red-500">*</span>
                                </label>

                                <input type="text"
                                       name="name"
                                       value="{{ old('name', $resident->name) }}"
                                       required
                                       placeholder="Masukkan nama lengkap"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 text-slate-700 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                            </div>


                            {{-- TANGGAL LAHIR --}}
                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Tanggal Lahir
                                </label>

                                <input type="date"
                                       name="birth_date"
                                       value="{{ old('birth_date', optional($resident->birth_date)->format('Y-m-d')) }}"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 text-slate-700 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                            </div>


                            {{-- WHATSAPP --}}
                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Nomor WhatsApp
                                </label>

                                <input type="text"
                                       name="phone"
                                       value="{{ old('phone', $resident->phone) }}"
                                       placeholder="Contoh: 081234567890"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 text-slate-700 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                            </div>


                            {{-- EMAIL --}}
                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Email
                                </label>

                                <div class="relative">

                                    <input type="email"
                                           value="{{ $user->email }}"
                                           disabled
                                           class="w-full border border-slate-200 bg-slate-100 text-slate-500 rounded-xl px-4 py-3 pr-11 cursor-not-allowed">

                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">

                                        <svg class="w-4 h-4"
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

                                <p class="text-xs text-slate-400 mt-2">
                                    Email akun tidak dapat diubah melalui halaman ini.
                                </p>

                            </div>

                        </div>


                        {{-- ALAMAT --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Alamat
                            </label>

                            <textarea name="address"
                                      rows="4"
                                      placeholder="Masukkan alamat lengkap..."
                                      class="w-full resize-none border border-slate-300 rounded-xl px-4 py-3 text-slate-700 placeholder:text-slate-400 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">{{ old('address', $resident->address) }}</textarea>

                        </div>

                    </div>


                    {{-- FOOTER --}}
                    <div class="px-5 sm:px-6 py-5 border-t border-slate-200 bg-slate-50 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                        <p class="text-xs text-slate-400">
                            Pastikan data yang Anda masukkan sudah benar.
                        </p>

                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl font-semibold shadow-sm transition">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M5 13l4 4L19 7"/>

                            </svg>

                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
