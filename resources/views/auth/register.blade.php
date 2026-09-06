<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Warga</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center py-10">

        <div class="bg-white w-full max-w-2xl p-8 rounded-2xl shadow">

            <h1 class="text-3xl font-bold text-center">
                Daftar Warga
            </h1>

            <p class="text-gray-500 text-center mt-2 mb-8">
                Buat akun untuk menggunakan layanan desa
            </p>

            @if ($errors->any())

                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">

                    <ul class="list-disc ml-5">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form action="{{ route('register.process') }}"
                  method="POST"
                  class="space-y-5">

                @csrf


                <div>

                    <label class="font-medium">
                        NIK
                    </label>

                    <input
                        type="text"
                        name="nik"
                        maxlength="16"
                        value="{{ old('nik') }}"
                        class="w-full mt-2 border rounded-lg p-3"
                        placeholder="Masukkan 16 digit NIK">

                </div>


                <div>

                    <label class="font-medium">
                        Nomor KK
                    </label>

                    <input
                        type="text"
                        name="no_kk"
                        maxlength="16"
                        value="{{ old('no_kk') }}"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>


                <div>

                    <label class="font-medium">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>


                <div>

                    <label class="font-medium">
                        Tanggal Lahir
                    </label>

                    <input
                        type="date"
                        name="birth_date"
                        value="{{ old('birth_date') }}"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>


                <div>

                    <label class="font-medium">
                        Nomor WhatsApp
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        class="w-full mt-2 border rounded-lg p-3"
                        placeholder="08xxxxxxxxxx">

                </div>


                <div>

                    <label class="font-medium">
                        Alamat
                    </label>

                    <textarea
                        name="address"
                        class="w-full mt-2 border rounded-lg p-3"
                    >{{ old('address') }}</textarea>

                </div>


                <div>

                    <label class="font-medium">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full mt-2 border rounded-lg p-3"
                        placeholder="Opsional">

                </div>


                <div>

                    <label class="font-medium">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>


                <div>

                    <label class="font-medium">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>


                <button
                    class="w-full bg-green-600 hover:bg-green-700
                           text-white font-semibold p-3 rounded-lg">

                    Daftar

                </button>

            </form>


            <p class="text-center mt-6">

                Sudah punya akun?

                <a
                    href="{{ route('login') }}"
                    class="text-green-600 font-semibold">

                    Login

                </a>

            </p>

        </div>

    </div>

</body>
</html>