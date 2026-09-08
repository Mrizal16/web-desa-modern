<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Warga - Desa Sidorejo</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100">

<div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">

    {{-- LEFT SIDE --}}
    <div class="hidden lg:flex relative overflow-hidden bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white p-12">

        <div class="absolute -top-24 -left-24 w-72 h-72 rounded-full bg-white/10"></div>
        <div class="absolute bottom-[-120px] right-[-80px] w-96 h-96 rounded-full bg-white/10"></div>

        <div class="relative z-10 flex flex-col w-full min-h-full">

            {{-- BRAND --}}
            <div class="flex items-center gap-3">

                <div class="w-12 h-12 rounded-2xl bg-white/15 backdrop-blur flex items-center justify-center">
                    <svg class="w-7 h-7"
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
                    <h1 class="text-xl font-bold">
                        Desa Sidorejo
                    </h1>

                    <p class="text-sm text-sky-100">
                        Sistem Informasi Desa
                    </p>
                </div>

            </div>

            {{-- MAIN CONTENT --}}
            <div class="max-w-xl mt-16">

                <p class="text-sm font-semibold text-sky-100 uppercase tracking-widest">
                    Portal Pelayanan Digital
                </p>

                <h2 class="text-4xl xl:text-5xl font-bold leading-tight mt-4">
                    Daftar sekali, akses layanan desa dengan lebih mudah.
                </h2>

                <p class="text-blue-100 leading-relaxed mt-5 text-lg">
                    Buat akun warga untuk mengajukan surat, memantau status permohonan,
                    mengirim pengaduan, dan menerima informasi dari Desa Sidorejo.
                </p>

                <div class="grid grid-cols-2 gap-4 mt-8">

                    <div class="bg-white/10 border border-white/10 backdrop-blur rounded-2xl p-4">

                        <div class="w-10 h-10 bg-white/15 rounded-xl flex items-center justify-center mb-3">
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

                        <p class="font-semibold">
                            Pengajuan Surat
                        </p>

                        <p class="text-sm text-blue-100 mt-1">
                            Administrasi desa secara online.
                        </p>

                    </div>

                    <div class="bg-white/10 border border-white/10 backdrop-blur rounded-2xl p-4">

                        <div class="w-10 h-10 bg-white/15 rounded-xl flex items-center justify-center mb-3">

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

                        <p class="font-semibold">
                            Pengaduan Warga
                        </p>

                        <p class="text-sm text-blue-100 mt-1">
                            Sampaikan aspirasi dengan mudah.
                        </p>

                    </div>

                </div>

            </div>

            {{-- COPYRIGHT --}}
            <p class="text-sm text-blue-200 mt-auto pt-10">
                © {{ date('Y') }} Desa Sidorejo
            </p>

        </div>

    </div>

    {{-- RIGHT SIDE --}}
    <div class="flex items-center justify-center px-4 sm:px-8 py-10">

        <div class="w-full max-w-2xl">

            {{-- MOBILE BRAND --}}
            <div class="lg:hidden flex items-center justify-center gap-3 mb-8">

                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-sky-500 to-blue-600 text-white flex items-center justify-center">

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
                    <h1 class="font-bold text-slate-800">
                        Desa Sidorejo
                    </h1>

                    <p class="text-xs text-slate-400">
                        Portal Pelayanan Desa
                    </p>
                </div>

            </div>

            <div class="bg-white border border-slate-200 rounded-3xl shadow-xl shadow-slate-200/60 p-7 sm:p-8">

                {{-- HEADER --}}
                <div class="mb-7">

                    <p class="text-sm font-semibold text-sky-600">
                        Registrasi Warga
                    </p>

                    <h1 class="text-3xl font-bold text-slate-800 mt-1">
                        Buat Akun
                    </h1>

                    <p class="text-slate-500 mt-2">
                        Lengkapi data berikut untuk membuat akun warga Desa Sidorejo.
                    </p>

                </div>

                {{-- ERROR --}}
                @if($errors->any())

                    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">

                        <div class="flex gap-3">

                            <div class="w-9 h-9 rounded-lg bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0">

                                <svg class="w-4 h-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 9v4m0 4h.01"/>
                                </svg>

                            </div>

                            <div>

                                <p class="font-semibold text-red-700">
                                    Periksa kembali data
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

                <form action="{{ route('register.process') }}"
                      method="POST"
                      class="space-y-6">

                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- NIK --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                NIK
                            </label>

                            <input type="text"
                                   name="nik"
                                   maxlength="16"
                                   value="{{ old('nik') }}"
                                   required
                                   placeholder="16 digit NIK"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                        </div>

                        {{-- NO KK --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Nomor KK
                            </label>

                            <input type="text"
                                   name="no_kk"
                                   maxlength="16"
                                   value="{{ old('no_kk') }}"
                                   required
                                   placeholder="16 digit Nomor KK"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                        </div>

                        {{-- NAMA --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Nama Lengkap
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required
                                   placeholder="Nama lengkap"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                        </div>

                        {{-- TANGGAL LAHIR --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Tanggal Lahir
                            </label>

                            <input type="date"
                                   name="birth_date"
                                   value="{{ old('birth_date') }}"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                        </div>

                        {{-- WHATSAPP --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Nomor WhatsApp
                            </label>

                            <input type="text"
                                   name="phone"
                                   value="{{ old('phone') }}"
                                   placeholder="08xxxxxxxxxx"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                        </div>

                        {{-- EMAIL --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Email
                                <span class="text-slate-400 font-normal">
                                    (Opsional)
                                </span>
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="nama@email.com"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                        </div>

                    </div>

                    {{-- ALAMAT --}}
                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Alamat
                        </label>

                        <textarea name="address"
                                  rows="3"
                                  placeholder="Masukkan alamat lengkap..."
                                  class="w-full resize-none border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">{{ old('address') }}</textarea>

                    </div>

                    {{-- PASSWORD --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Password
                            </label>

                            <div class="relative">

                                <input type="password"
                                       name="password"
                                       id="password"
                                       required
                                       placeholder="Buat password"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 pr-12 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                                <button type="button"
                                        onclick="togglePassword('password')"
                                        class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-sky-600">

                                    <svg class="w-5 h-5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"/>

                                        <circle cx="12"
                                                cy="12"
                                                r="3"
                                                stroke-width="2"/>

                                    </svg>

                                </button>

                            </div>

                        </div>

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Konfirmasi Password
                            </label>

                            <div class="relative">

                                <input type="password"
                                       name="password_confirmation"
                                       id="password_confirmation"
                                       required
                                       placeholder="Ulangi password"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 pr-12 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                                <button type="button"
                                        onclick="togglePassword('password_confirmation')"
                                        class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-sky-600">

                                    <svg class="w-5 h-5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"/>

                                        <circle cx="12"
                                                cy="12"
                                                r="3"
                                                stroke-width="2"/>

                                    </svg>

                                </button>

                            </div>

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white font-semibold px-5 py-3.5 rounded-xl shadow-md shadow-sky-100 transition">

                        Buat Akun Warga

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M5 12h14M13 6l6 6-6 6"/>
                        </svg>

                    </button>

                </form>

                {{-- LOGIN --}}
                <div class="border-t border-slate-100 mt-7 pt-6">

                    <p class="text-center text-sm text-slate-500">

                        Sudah memiliki akun?

                        <a href="{{ route('login') }}"
                           class="text-sky-600 hover:text-sky-700 font-bold ml-1">
                            Login
                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    function togglePassword(id) {
        const input = document.getElementById(id);

        input.type = input.type === 'password'
            ? 'text'
            : 'password';
    }
</script>

</body>
</html>