<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Galeri</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>
            <p class="text-sm font-semibold text-indigo-600">
                Website Desa
            </p>

            <h1 class="text-3xl font-bold mt-1">
                Edit Galeri
            </h1>

            <p class="text-slate-500 mt-1">
                Perbarui dokumentasi kegiatan desa.
            </p>
        </div>

        <a href="{{ route('admin.galleries.index') }}"
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


    <form action="{{ route('admin.galleries.update', $gallery) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2">

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5 sm:p-7">

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Judul Foto
                        </label>

                        <input type="text"
                               name="title"
                               value="{{ old('title', $gallery->title) }}"
                               required
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">

                    </div>


                    <div class="mt-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Deskripsi
                        </label>

                        <textarea name="description"
                                  rows="5"
                                  class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">{{ old('description', $gallery->description) }}</textarea>

                    </div>


                    <div class="mt-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Urutan Tampil
                        </label>

                        <input type="number"
                               name="sort_order"
                               value="{{ old('sort_order', $gallery->sort_order) }}"
                               min="0"
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">

                    </div>


                    <div class="mt-6">

                        <label class="flex items-center gap-3 cursor-pointer">

                            <input type="checkbox"
                                   name="is_active"
                                   value="1"
                                   {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}
                                   class="w-5 h-5 rounded border-slate-300 text-indigo-600">

                            <div>

                                <p class="font-semibold text-slate-700">
                                    Tampilkan di website
                                </p>

                                <p class="text-xs text-slate-400 mt-0.5">
                                    Nonaktifkan jika foto tidak ingin ditampilkan.
                                </p>

                            </div>

                        </label>

                    </div>

                </div>

            </div>


            <div>

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">

                    <h2 class="font-bold">
                        Foto Galeri
                    </h2>

                    <label for="image"
                           class="block mt-4 border-2 border-dashed border-slate-300 hover:border-indigo-400 rounded-2xl overflow-hidden cursor-pointer">

                        <img id="imagePreview"
                             src="{{ asset('storage/' . $gallery->image) }}"
                             alt="{{ $gallery->title }}"
                             class="w-full aspect-square object-cover">

                    </label>

                    <input type="file"
                           name="image"
                           id="image"
                           accept="image/jpeg,image/png,image/webp"
                           class="hidden"
                           onchange="previewImage(event)">

                    <p class="text-xs text-slate-400 mt-3">
                        Biarkan kosong jika foto lama tidak ingin diganti.
                    </p>

                </div>


                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-3.5 rounded-xl mt-5">

                    Simpan Perubahan

                </button>

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

        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
</script>

</body>
</html>