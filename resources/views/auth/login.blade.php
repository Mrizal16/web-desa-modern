<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100">


<div class="min-h-screen flex items-center justify-center">


    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow">


        <h1 class="text-3xl font-bold text-center">

            Login

        </h1>


        <p class="text-gray-500 text-center mt-2 mb-8">

            Website Desa Modern

        </p>


        @if (session('success'))

            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5">

                {{ session('success') }}

            </div>

        @endif


        @if ($errors->any())

            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">

                {{ $errors->first() }}

            </div>

        @endif


        <form
            action="{{ route('login.process') }}"
            method="POST"
            class="space-y-5">

            @csrf


            <div>

                <label class="font-medium">

                    Email

                </label>


                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full mt-2 border rounded-lg p-3">

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


            <label class="flex items-center gap-2">

                <input
                    type="checkbox"
                    name="remember">

                Ingat saya

            </label>


            <button
                class="w-full bg-green-600 hover:bg-green-700
                       text-white font-semibold p-3 rounded-lg">

                Login

            </button>


        </form>


        <p class="text-center mt-6">

            Belum punya akun?

            <a
                href="{{ route('register') }}"
                class="text-green-600 font-semibold">

                Daftar

            </a>

        </p>


    </div>


</div>


</body>
</html>