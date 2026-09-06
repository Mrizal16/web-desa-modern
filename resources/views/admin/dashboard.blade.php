<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">


<div class="max-w-6xl mx-auto py-10">


    <div class="flex justify-between">


        <div>

            <h1 class="text-3xl font-bold">

                Dashboard Admin Desa

            </h1>

            <p class="text-gray-500">

                Selamat datang,
                {{ auth()->user()->name }}

            </p>

        </div>


        <form
            action="{{ route('logout') }}"
            method="POST">

            @csrf


            <button
                class="bg-red-500 text-white px-5 py-2 rounded-lg">

                Logout

            </button>

        </form>


    </div>


</div>


</body>

</html>