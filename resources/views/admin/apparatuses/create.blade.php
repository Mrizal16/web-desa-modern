<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Aparatur</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>

            <p class="text-sm font-semibold text-sky-600">
                Website Desa
            </p>

            <h1 class="text-3xl font-bold mt-1">
                Tambah Aparatur
            </h1>

            <p class="text-slate-500 mt-1">
                Tambahkan perangkat pemerintahan Desa Sidorejo.
            </p>

        </div>

        <a href="{{ route('admin.apparatuses.index') }}"
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


    <form action="{{ route('admin.apparatuses.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2">

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5 sm:p-7">

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nama Aparatur
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               placeholder="Contoh: Budi Santoso"
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                    </div>


                    <div class="mt-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Jabatan
                        </label>

                        <input type="text"
                               name="position"
                               value="{{ old('position') }}"
                               required
                               placeholder="Contoh: Kepala Desa"
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                    </div>


                    <div class="mt-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Urutan Tampil
                        </label>

                        <input type="number"
                               name="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               min="0"
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                        <p class="text-xs text-slate-400 mt-2">
                            Contoh: Kepala Desa = 1, Sekretaris Desa = 2.
                        </p>

                    </div>


                    <div class="mt-6">

                        <label class="flex items-center gap-3 cursor-pointer">

                            <input type="checkbox"
                                   name="is_active"
                                   value="1"
                                   {{ old('is_active', true) ? 'checked' : '' }}
                                   class="w-5 h-5 rounded border-slate-300 text-sky-600">

                            <div>

                                <p class="font-semibold text-slate-700">
                                    Tampilkan di website
                                </p>

                                <p class="text-xs text-slate-400 mt-0.5">
                                    Nonaktifkan jika aparatur belum ingin ditampilkan.
                                </p>

                            </div>

                        </label>

                    </div>

                </div>

            </div>


            <div>

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">

                    <h2 class="font-bold">
                        Foto Aparatur
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        JPG, PNG atau WebP. Maksimal 3 MB.
                    </p>

                    <label for="photo"
                           class="block mt-4 border-2 border-dashed border-slate-300 hover:border-sky-400 rounded-2xl overflow-hidden cursor-pointer">

                        <div id="photoPlaceholder"
                             class="py-12 px-4 text-center">

                            <svg class="w-10 h-10 text-slate-300 mx-auto"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="1.5"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M20 21a8 8 0 10-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>

                            </svg>

                            <p class="text-sm font-semibold text-slate-600 mt-3">
                                Pilih Foto
                            </p>

                        </div>

                        <img id="photoPreview"
                             class="hidden w-full aspect-[4/5] object-cover"
                             alt="Preview">

                    </label>

                    <input type="file"
                           name="photo"
                           id="photo"
                           accept="image/jpeg,image/png,image/webp"
                           class="hidden"
                           onchange="previewPhoto(event)">

                </div>


                <button type="submit"
                        class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold px-5 py-3.5 rounded-xl mt-5">

                    Simpan Aparatur

                </button>

            </div>

        </div>

    </form>

</div>


<script>
    function previewPhoto(event) {
        const file = event.target.files[0];

        if (!file) {
            return;
        }

        const preview = document.getElementById('photoPreview');
        const placeholder = document.getElementById('photoPlaceholder');

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