<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Potensi Desa</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-5xl mx-auto py-8 px-4 sm:px-6">

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
                    Tambah Potensi Desa
                </h1>

                <p class="text-blue-100 mt-2 max-w-2xl">
                    Tambahkan potensi Desa Sidorejo yang ingin ditampilkan di halaman website publik.
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

                <a href="{{ route('admin.potentials.index') }}"
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

                    Daftar Potensi

                </a>

            </div>

        </div>

    </div>


    {{-- ERROR --}}
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


    <form action="{{ route('admin.potentials.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- LEFT --}}
            <div class="lg:col-span-2">

                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                    <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 21V9m0 0C9 9 6 7 6 4c3 0 6 2 6 5zm0 0c3 0 6-2 6-5-3 0-6 2-6 5z"/>

                                </svg>

                            </div>

                            <div>

                                <h2 class="font-bold text-lg">
                                    Informasi Potensi
                                </h2>

                                <p class="text-sm text-slate-400 mt-0.5">
                                    Lengkapi informasi potensi desa.
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="p-5 sm:p-6">

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Nama Potensi
                            </label>

                            <input type="text"
                                   name="title"
                                   value="{{ old('title') }}"
                                   required
                                   placeholder="Masukkan nama potensi"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100">

                        </div>


                        <div class="mt-5">

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Deskripsi
                            </label>

                            <textarea name="description"
                                      rows="6"
                                      placeholder="Jelaskan potensi desa..."
                                      class="w-full resize-y border border-slate-300 rounded-xl px-4 py-3 leading-relaxed outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100">{{ old('description') }}</textarea>

                        </div>


                        <div class="mt-5">

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Urutan Tampil
                            </label>

                            <input type="number"
                                   name="sort_order"
                                   value="{{ old('sort_order', 0) }}"
                                   min="0"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100">

                            <p class="text-xs text-slate-400 mt-2">
                                Angka lebih kecil akan tampil lebih dahulu di website.
                            </p>

                        </div>


                        <div class="mt-6">

                            <label class="flex items-start gap-3 cursor-pointer bg-slate-50 border border-slate-200 rounded-2xl p-4">

                                <input type="checkbox"
                                       name="is_active"
                                       value="1"
                                       {{ old('is_active', true) ? 'checked' : '' }}
                                       class="w-5 h-5 mt-0.5 rounded border-slate-300 text-emerald-600">

                                <div>

                                    <p class="font-semibold text-slate-700">
                                        Tampilkan di website
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1">
                                        Potensi yang aktif akan ditampilkan di halaman publik.
                                    </p>

                                </div>

                            </label>

                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT --}}
            <div>

                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden sticky top-6">

                    <div class="px-5 py-4 border-b border-slate-200 bg-slate-50">

                        <h2 class="font-bold">
                            Foto Potensi
                        </h2>

                        <p class="text-xs text-slate-400 mt-1">
                            Opsional. JPG, PNG atau WebP.
                        </p>

                    </div>

                    <div class="p-5">

                        <label for="image"
                               class="block border-2 border-dashed border-slate-300 hover:border-emerald-400 rounded-2xl overflow-hidden cursor-pointer transition">

                            <div id="imagePlaceholder"
                                 class="py-14 px-4 text-center">

                                <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto">

                                    <svg class="w-7 h-7"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-width="1.5"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M4 5h16v14H4zM8 14l3-3 2 2 3-4 4 5"/>

                                    </svg>

                                </div>

                                <p class="text-sm font-semibold text-slate-600 mt-3">
                                    Pilih Foto
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Klik untuk upload gambar
                                </p>

                            </div>

                            <img id="imagePreview"
                                 class="hidden w-full aspect-square object-cover"
                                 alt="Preview">

                        </label>

                        <input type="file"
                               name="image"
                               id="image"
                               accept="image/jpeg,image/png,image/webp"
                               class="hidden"
                               onchange="previewImage(event)">


                        <div class="mt-5 bg-slate-50 border border-slate-200 rounded-xl p-4">

                            <p class="text-xs uppercase tracking-wider font-bold text-slate-400">
                                Saran
                            </p>

                            <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                Gunakan gambar yang jelas dan relevan agar potensi desa terlihat menarik di website.
                            </p>

                        </div>


                        <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-5 py-3.5 rounded-xl mt-5 transition">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M5 13l4 4L19 7"/>

                            </svg>

                            Simpan Potensi

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>


<script>
    function previewImage(event) {
        const file = event.target.files[0];

        if (!file) {
            return;
        }

        const preview = document.getElementById('imagePreview');
        const placeholder = document.getElementById('imagePlaceholder');
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
