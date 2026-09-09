<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Berita</title>

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
                Tambah Berita
            </h1>

            <p class="text-slate-500 mt-1">
                Buat berita baru untuk ditampilkan di website Desa Sidorejo.
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


    <form action="{{ route('admin.news.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">

                    <h2 class="font-bold text-lg mb-5">
                        Informasi Berita
                    </h2>


                    {{-- TITLE --}}
                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Judul Berita
                        </label>

                        <input type="text"
                               name="title"
                               value="{{ old('title') }}"
                               required
                               placeholder="Contoh: Pemerintah Desa Gelar Kerja Bakti"
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 text-base outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                    </div>


                    {{-- CATEGORY --}}
                    <div class="mt-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Kategori
                        </label>

                        <input type="text"
                               name="category"
                               value="{{ old('category') }}"
                               placeholder="Contoh: Kegiatan Desa"
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 text-base outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                    </div>


                    {{-- EXCERPT --}}
                    <div class="mt-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Ringkasan
                        </label>

                        <textarea name="excerpt"
                                  rows="3"
                                  maxlength="500"
                                  placeholder="Ringkasan singkat berita..."
                                  class="w-full resize-none border border-slate-300 rounded-xl px-4 py-3 text-base outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('excerpt') }}</textarea>

                    </div>


                    {{-- CONTENT --}}
                    <div class="mt-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Isi Berita
                        </label>

                        <textarea name="content"
                                  rows="12"
                                  required
                                  placeholder="Tuliskan isi berita secara lengkap..."
                                  class="w-full resize-y border border-slate-300 rounded-xl px-4 py-3 text-base leading-relaxed outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('content') }}</textarea>

                    </div>

                </div>

            </div>


            {{-- SIDEBAR --}}
            <div class="space-y-6">

                {{-- IMAGE --}}
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">

                    <h2 class="font-bold">
                        Gambar Berita
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        JPG, PNG atau WebP. Maksimal 3 MB.
                    </p>

                    <div class="mt-4">

                        <label for="image"
                               class="block border-2 border-dashed border-slate-300 hover:border-sky-400 rounded-2xl cursor-pointer overflow-hidden">

                            <div id="uploadPlaceholder"
                                 class="py-10 px-4 text-center">

                                <svg class="w-9 h-9 text-slate-300 mx-auto"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M4 5h16v14H4zM8 14l3-3 2 2 3-4 4 5"/>

                                </svg>

                                <p class="text-sm font-semibold text-slate-600 mt-3">
                                    Pilih gambar
                                </p>

                            </div>

                            <img id="previewImage"
                                 class="hidden w-full aspect-video object-cover"
                                 alt="Preview">

                        </label>

                        <input type="file"
                               name="image"
                               id="image"
                               accept="image/jpeg,image/png,image/webp"
                               class="hidden"
                               onchange="previewFile(event)">

                    </div>

                </div>


                {{-- PUBLISH --}}
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">

                    <h2 class="font-bold">
                        Publikasi
                    </h2>

                    <label class="block text-sm font-semibold text-slate-700 mt-4 mb-2">
                        Status
                    </label>

                    <select name="status"
                            required
                            class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                        <option value="draft"
                            {{ old('status') === 'draft' ? 'selected' : '' }}>
                            Simpan sebagai Draft
                        </option>

                        <option value="published"
                            {{ old('status') === 'published' ? 'selected' : '' }}>
                            Publish Sekarang
                        </option>

                    </select>

                    <button type="submit"
                            class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold px-5 py-3.5 rounded-xl mt-5">

                        Simpan Berita

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


<script>

    function previewFile(event) {

        const file = event.target.files[0];
        const preview = document.getElementById('previewImage');
        const placeholder = document.getElementById('uploadPlaceholder');

        if (!file) {
            return;
        }

        const reader = new FileReader();

        reader.onload = function(e) {

            preview.src = e.target.result;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');

        };

        reader.readAsDataURL(file);
    }

</script>

</body>
</html>