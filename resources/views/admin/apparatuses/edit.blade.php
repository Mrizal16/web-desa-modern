<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Aparatur</title>

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
                Edit Aparatur
            </h1>

            <p class="text-slate-500 mt-1">
                Perbarui data aparatur Desa Sidorejo.
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


    <form action="{{ route('admin.apparatuses.update', $apparatus) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2">

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5 sm:p-7">

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nama Aparatur
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name', $apparatus->name) }}"
                               required
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                    </div>


                    <div class="mt-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Jabatan
                        </label>

                        <input type="text"
                               name="position"
                               value="{{ old('position', $apparatus->position) }}"
                               required
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                    </div>


                    <div class="mt-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Urutan Tampil
                        </label>

                        <input type="number"
                               name="sort_order"
                               value="{{ old('sort_order', $apparatus->sort_order) }}"
                               min="0"
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                    </div>


                    <div class="mt-6">

                        <label class="flex items-center gap-3 cursor-pointer">

                            <input type="checkbox"
                                   name="is_active"
                                   value="1"
                                   {{ old('is_active', $apparatus->is_active) ? 'checked' : '' }}
                                   class="w-5 h-5 rounded border-slate-300 text-sky-600">

                            <div>

                                <p class="font-semibold text-slate-700">
                                    Tampilkan di website
                                </p>

                                <p class="text-xs text-slate-400 mt-0.5">
                                    Jika dimatikan, aparatur tidak muncul di homepage.
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

                    <label for="photo"
                           class="block mt-4 border-2 border-dashed border-slate-300 hover:border-sky-400 rounded-2xl overflow-hidden cursor-pointer">

                        @if($apparatus->photo)

                            <img id="photoPreview"
                                 src="{{ asset('storage/' . $apparatus->photo) }}"
                                 alt="{{ $apparatus->name }}"
                                 class="w-full aspect-[4/5] object-cover">

                            <div id="photoPlaceholder"
                                 class="hidden py-12 px-4 text-center">
                                Pilih Foto
                            </div>

                        @else

                            <div id="photoPlaceholder"
                                 class="py-12 px-4 text-center">

                                <p class="text-sm font-semibold text-slate-600">
                                    Pilih Foto
                                </p>

                            </div>

                            <img id="photoPreview"
                                 class="hidden w-full aspect-[4/5] object-cover"
                                 alt="Preview">

                        @endif

                    </label>

                    <input type="file"
                           name="photo"
                           id="photo"
                           accept="image/jpeg,image/png,image/webp"
                           class="hidden"
                           onchange="previewPhoto(event)">

                    <p class="text-xs text-slate-400 mt-3">
                        Biarkan kosong jika foto lama tidak ingin diganti.
                    </p>

                </div>


                <button type="submit"
                        class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold px-5 py-3.5 rounded-xl mt-5">

                    Simpan Perubahan

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

            if (placeholder) {
                placeholder.classList.add('hidden');
            }
        };

        reader.readAsDataURL(file);
    }
</script>

</body>
</html>