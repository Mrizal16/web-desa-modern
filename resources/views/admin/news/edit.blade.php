<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Berita</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-5xl mx-auto py-8 px-4 sm:px-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>

            <p class="text-sm font-semibold text-sky-600">
                Website Desa
            </p>

            <h1 class="text-3xl font-bold mt-1">
                Edit Berita
            </h1>

            <p class="text-slate-500 mt-1">
                Perbarui isi berita Desa Sidorejo.
            </p>

        </div>

        <a href="{{ route('admin.news.index') }}"
           class="inline-flex items-center justify-center bg-slate-800 hover:bg-slate-900 text-white px-5 py-2.5 rounded-xl font-semibold">

            Kembali

        </a>

    </div>


    @if($errors->any())

        <div class="bg-red-50 border border-red-200 text-red-700 rounded-2xl p-4 mb-6">

            <p class="font-semibold">
                Periksa kembali data berikut:
            </p>

            <ul class="list-disc pl-5 mt-2 text-sm space-y-1">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('admin.news.update', $news) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2">

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Judul Berita
                        </label>

                        <input type="text"
                               name="title"
                               value="{{ old('title', $news->title) }}"
                               required
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 text-base outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                    </div>


                    <div class="mt-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Kategori
                        </label>

                        <input type="text"
                               name="category"
                               value="{{ old('category', $news->category) }}"
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 text-base outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                    </div>


                    <div class="mt-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Ringkasan
                        </label>

                        <textarea name="excerpt"
                                  rows="3"
                                  maxlength="500"
                                  class="w-full resize-none border border-slate-300 rounded-xl px-4 py-3 text-base outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('excerpt', $news->excerpt) }}</textarea>

                    </div>


                    <div class="mt-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Isi Berita
                        </label>

                        <textarea name="content"
                                  rows="12"
                                  required
                                  class="w-full resize-y border border-slate-300 rounded-xl px-4 py-3 text-base leading-relaxed outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('content', $news->content) }}</textarea>

                    </div>

                </div>

            </div>


            <div class="space-y-6">

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">

                    <h2 class="font-bold">
                        Gambar Berita
                    </h2>

                    <div class="mt-4">

                        <label for="image"
                               class="block border-2 border-dashed border-slate-300 hover:border-sky-400 rounded-2xl cursor-pointer overflow-hidden">

                            @if($news->image)

                                <img id="previewImage"
                                     src="{{ asset('storage/' . $news->image) }}"
                                     class="w-full aspect-video object-cover"
                                     alt="{{ $news->title }}">

                                <div id="uploadPlaceholder"
                                     class="hidden py-10 px-4 text-center">
                                    Pilih gambar
                                </div>

                            @else

                                <div id="uploadPlaceholder"
                                     class="py-10 px-4 text-center">

                                    <p class="text-sm font-semibold text-slate-600">
                                        Pilih gambar
                                    </p>

                                </div>

                                <img id="previewImage"
                                     class="hidden w-full aspect-video object-cover"
                                     alt="Preview">

                            @endif

                        </label>

                        <input type="file"
                               name="image"
                               id="image"
                               accept="image/jpeg,image/png,image/webp"
                               class="hidden"
                               onchange="previewFile(event)">

                    </div>

                    <p class="text-xs text-slate-400 mt-3">
                        Biarkan kosong jika gambar lama tidak ingin diganti.
                    </p>

                </div>


                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">

                    <h2 class="font-bold">
                        Publikasi
                    </h2>

                    <label class="block text-sm font-semibold text-slate-700 mt-4 mb-2">
                        Status
                    </label>

                    <select name="status"
                            required
                            class="w-full border border-slate-300 rounded-xl px-4 py-3">

                        <option value="draft"
                            {{ old('status', $news->status) === 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                        <option value="published"
                            {{ old('status', $news->status) === 'published' ? 'selected' : '' }}>
                            Published
                        </option>

                    </select>

                    <button type="submit"
                            class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold px-5 py-3.5 rounded-xl mt-5">

                        Simpan Perubahan

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


<script>

    function previewFile(event) {

        const file = event.target.files[0];

        if (!file) {
            return;
        }

        const preview = document.getElementById('previewImage');
        const placeholder = document.getElementById('uploadPlaceholder');

        const reader = new FileReader();

        reader.onload = function(e) {

            preview.src = e.target.result;
            preview.classList.remove('hidden');

            if (placeholder) {
                placeholder.classList.add('hidden');
            }

        };

        reader.readAsDataURL(file);
    }

</script>

</body>
</html>