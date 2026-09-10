<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Berita</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-6xl mx-auto py-8 px-4 sm:px-6">

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-sky-600 via-blue-600 to-indigo-700 rounded-3xl p-6 sm:p-8 mb-8 text-white shadow-lg shadow-blue-100">

        <div class="absolute -top-16 -right-16 w-48 h-48 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-20 left-1/3 w-56 h-56 bg-white/10 rounded-full"></div>

        <div class="relative flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6">

            <div>

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-widest text-blue-100">
                    Website Desa
                </div>

                <h1 class="text-3xl sm:text-4xl font-bold mt-4">
                    Tambah Berita
                </h1>

                <p class="text-blue-100 mt-2 max-w-2xl">
                    Buat berita baru untuk ditampilkan di website Desa Sidorejo.
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

                <a href="{{ route('admin.news.index') }}"
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

                    Daftar Berita

                </a>

            </div>

        </div>

    </div>


    {{-- ERROR --}}
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

            {{-- LEFT --}}
            <div class="lg:col-span-2">

                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                    <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M4 5h16v14H4zM8 9h8M8 13h8M8 17h5"/>

                                </svg>

                            </div>

                            <div>

                                <h2 class="font-bold text-lg">
                                    Informasi Berita
                                </h2>

                                <p class="text-sm text-slate-400 mt-0.5">
                                    Lengkapi informasi utama berita.
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="p-5 sm:p-6">

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

                            <p class="text-xs text-slate-400 mt-2">
                                Maksimal 500 karakter.
                            </p>

                        </div>


                        {{-- CONTENT --}}
                        <div class="mt-5">

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Isi Berita
                            </label>

                            <textarea name="content"
                                      rows="14"
                                      required
                                      placeholder="Tuliskan isi berita secara lengkap..."
                                      class="w-full resize-y border border-slate-300 rounded-xl px-4 py-3 text-base leading-relaxed outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('content') }}</textarea>

                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT --}}
            <div class="space-y-6">

                {{-- IMAGE --}}
                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                    <div class="px-5 py-4 border-b border-slate-200 bg-slate-50">

                        <h2 class="font-bold">
                            Gambar Berita
                        </h2>

                        <p class="text-xs text-slate-400 mt-1">
                            JPG, PNG atau WebP. Maksimal 3 MB.
                        </p>

                    </div>

                    <div class="p-5">

                        <label for="image"
                               class="block border-2 border-dashed border-slate-300 hover:border-sky-400 rounded-2xl cursor-pointer overflow-hidden transition">

                            <div id="uploadPlaceholder"
                                 class="py-10 px-4 text-center">

                                <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center mx-auto">

                                    <svg class="w-6 h-6"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M4 5h16v14H4zM8 14l3-3 2 2 3-4 4 5"/>

                                    </svg>

                                </div>

                                <p class="text-sm font-semibold text-slate-600 mt-3">
                                    Pilih gambar
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Klik untuk upload gambar
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
                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                    <div class="px-5 py-4 border-b border-slate-200 bg-slate-50">

                        <h2 class="font-bold">
                            Publikasi
                        </h2>

                        <p class="text-xs text-slate-400 mt-1">
                            Tentukan status awal berita.
                        </p>

                    </div>

                    <div class="p-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Status
                        </label>

                        <select name="status"
                                required
                                class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                            <option value="draft"
                                {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>
                                Simpan sebagai Draft
                            </option>

                            <option value="published"
                                {{ old('status') === 'published' ? 'selected' : '' }}>
                                Publish Sekarang
                            </option>

                        </select>


                        <div class="mt-5 bg-slate-50 border border-slate-200 rounded-xl p-4">

                            <p class="text-xs uppercase tracking-wider font-bold text-slate-400">
                                Keterangan
                            </p>

                            <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                Draft tidak tampil di website publik. Pilih Publish Sekarang jika berita sudah siap ditampilkan.
                            </p>

                        </div>


                        <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-2 bg-sky-600 hover:bg-sky-700 text-white font-semibold px-5 py-3.5 rounded-xl mt-5 transition">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M5 13l4 4L19 7"/>

                            </svg>

                            Simpan Berita

                        </button>

                    </div>

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
