<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - Desa Sidorejo</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100">

<div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">

    {{-- LEFT SIDE --}}
    <div class="hidden lg:flex relative overflow-hidden bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white p-12">

        <div class="absolute -top-24 -left-24 w-72 h-72 rounded-full bg-white/10"></div>
        <div class="absolute bottom-[-120px] right-[-80px] w-96 h-96 rounded-full bg-white/10"></div>

        <div class="relative z-10 flex flex-col justify-between w-full">

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

            <div class="max-w-xl">

                <p class="text-sm font-semibold text-sky-100 uppercase tracking-widest">
                    Portal Pelayanan Digital
                </p>

                <h2 class="text-4xl xl:text-5xl font-bold leading-tight mt-4">
                    Pelayanan desa lebih mudah, cepat, dan terintegrasi.
                </h2>

                <p class="text-blue-100 leading-relaxed mt-5 text-lg">
                    Ajukan surat, pantau status permohonan, kirim pengaduan,
                    dan dapatkan informasi pelayanan desa dalam satu sistem.
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
                            Administrasi Surat
                        </p>

                        <p class="text-sm text-blue-100 mt-1">
                            Pengajuan surat secara online.
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
                            Sampaikan pengaduan dengan mudah.
                        </p>

                    </div>

                </div>

            </div>

            <p class="text-sm text-blue-200">
                © {{ date('Y') }} Desa Sidorejo.
            </p>

        </div>

    </div>

    {{-- RIGHT SIDE --}}
    <div class="flex items-center justify-center px-4 sm:px-8 py-10">

        <div class="w-full max-w-md">

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
                        Selamat Datang
                    </p>

                    <h1 class="text-3xl font-bold text-slate-800 mt-1">
                        Login
                    </h1>

                    <p class="text-slate-500 mt-2">
                        Masuk menggunakan akun Anda untuk melanjutkan ke sistem.
                    </p>

                </div>

                {{-- SUCCESS --}}
                @if(session('success'))

                    <div class="flex gap-3 bg-sky-50 border border-sky-200 text-sky-700 p-4 rounded-xl mb-5">

                        <div class="w-8 h-8 rounded-lg bg-sky-100 flex items-center justify-center flex-shrink-0">

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

                        <p class="text-sm">
                            {{ session('success') }}
                        </p>

                    </div>

                @endif

                {{-- ERROR --}}
                @if($errors->any())

                    <div class="flex gap-3 bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-5">

                        <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center flex-shrink-0">

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

                        <p class="text-sm">
                            {{ $errors->first() }}
                        </p>

                    </div>

                @endif

                <form action="{{ route('login.process') }}"
                      method="POST"
                      class="space-y-5">

                    @csrf

                    {{-- EMAIL --}}
                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Email
                        </label>

                        <div class="relative">

                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>

                                </svg>

                            </div>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autocomplete="email"
                                   placeholder="nama@email.com"
                                   class="w-full border border-slate-300 rounded-xl pl-12 pr-4 py-3 text-slate-700 placeholder:text-slate-400 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                        </div>

                    </div>

                    {{-- PASSWORD --}}
                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Password
                        </label>

                        <div class="relative">

                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M7 10V7a5 5 0 0110 0v3m-11 0h12v11H6z"/>

                                </svg>

                            </div>

                            <input type="password"
                                   name="password"
                                   id="password"
                                   required
                                   autocomplete="current-password"
                                   placeholder="Masukkan password"
                                   class="w-full border border-slate-300 rounded-xl pl-12 pr-12 py-3 text-slate-700 placeholder:text-slate-400 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                            <button type="button"
                                    onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-sky-600 transition">

                                <svg id="eyeIcon"
                                     class="w-5 h-5"
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
                                            stroke-width="2">
                                    </circle>

                                </svg>

                            </button>

                        </div>

                    </div>

                    {{-- REMEMBER --}}
                    <label class="flex items-center gap-3 cursor-pointer">

                        <input type="checkbox"
                               name="remember"
                               class="w-4 h-4 rounded border-slate-300 accent-sky-600">

                        <span class="text-sm text-slate-600">
                            Ingat saya
                        </span>

                    </label>

                    {{-- LOGIN --}}
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white font-semibold px-5 py-3.5 rounded-xl shadow-md shadow-sky-100 transition">

                        Masuk ke Sistem

                    </button>


                    {{-- KEMBALI KE HALAMAN UTAMA --}}
                    <a href="{{ route('home') }}"
                       class="w-full inline-flex items-center justify-center gap-2 bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 px-5 py-3.5 rounded-xl font-semibold transition">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M15 18l-6-6 6-6"/>

                        </svg>

                        Kembali ke Halaman Utama

                    </a>

                </form>

                {{-- REGISTER --}}
                <div class="border-t border-slate-100 mt-7 pt-6">

                    <p class="text-center text-sm text-slate-500">
                        Belum memiliki akun?

                        <a href="{{ route('register') }}"
                           class="text-sky-600 hover:text-sky-700 font-bold ml-1">
                            Daftar Sekarang
                        </a>
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');

        password.type = password.type === 'password'
            ? 'text'
            : 'password';
    }
</script>

</body>
</html>