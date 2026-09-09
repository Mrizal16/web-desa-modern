<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Pengumuman</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>

            <p class="text-sm font-semibold text-orange-600">
                Website Desa
            </p>

            <h1 class="text-3xl font-bold mt-1">
                Edit Pengumuman
            </h1>

            <p class="text-slate-500 mt-1">
                Perbarui informasi pengumuman Desa Sidorejo.
            </p>

        </div>

        <a href="{{ route('admin.announcements.index') }}"
           class="inline-flex justify-center bg-slate-800 text-white px-5 py-2.5 rounded-xl font-semibold">
            Kembali
        </a>

    </div>


    @if($errors->any())

        <div class="bg-red-50 border border-red-200 text-red-700 rounded-2xl p-4 mb-6">

            <p class="font-semibold">
                Periksa kembali data:
            </p>

            <ul class="list-disc pl-5 mt-2 text-sm space-y-1">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('admin.announcements.update', $announcement) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5 sm:p-7">

            <div>

                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Judul Pengumuman
                </label>

                <input type="text"
                       name="title"
                       value="{{ old('title', $announcement->title) }}"
                       required
                       class="w-full border border-slate-300 rounded-xl px-4 py-3 text-base outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-100">

            </div>


            <div class="mt-5">

                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Isi Pengumuman
                </label>

                <textarea name="content"
                          rows="8"
                          required
                          class="w-full resize-y border border-slate-300 rounded-xl px-4 py-3 text-base leading-relaxed outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-100">{{ old('content', $announcement->content) }}</textarea>

            </div>


            <div class="mt-5">

                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Status
                </label>

                <select name="status"
                        required
                        class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none">

                    <option value="draft"
                        {{ old('status', $announcement->status) === 'draft' ? 'selected' : '' }}>
                        Draft
                    </option>

                    <option value="published"
                        {{ old('status', $announcement->status) === 'published' ? 'selected' : '' }}>
                        Published
                    </option>

                </select>

            </div>


            <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold px-5 py-3.5 rounded-xl mt-6">

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

</body>
</html>