<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Desa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-6xl mx-auto py-8 px-4 sm:px-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>
            <p class="text-sm font-semibold text-sky-600">
                Website Desa
            </p>

            <h1 class="text-3xl font-bold mt-1">
                Profil Desa
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola informasi profil dan statistik Desa Sidorejo.
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex justify-center bg-slate-800 hover:bg-slate-900 text-white px-5 py-3 rounded-xl font-semibold">
            Kembali ke Dashboard
        </a>

    </div>


    @if(session('success'))

        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl p-4 mb-6">
            {{ session('success') }}
        </div>

    @endif


    @if($errors->any())

        <div class="bg-red-50 border border-red-200 text-red-700 rounded-2xl p-4 mb-6">

            <ul class="list-disc pl-5 text-sm space-y-1">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('admin.village-profile.update') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- LEFT --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- PROFIL --}}
                <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-7 shadow-sm">

                    <h2 class="text-lg font-bold">
                        Informasi Desa
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        Informasi utama yang ditampilkan di halaman publik.
                    </p>


                    <div class="mt-6">

                        <label class="block text-sm font-semibold mb-2">
                            Nama Desa
                        </label>

                        <input type="text"
                               name="village_name"
                               value="{{ old('village_name', $profile->village_name) }}"
                               required
                               class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                    </div>


                    <div class="mt-5">

                        <label class="block text-sm font-semibold mb-2">
                            Deskripsi Desa
                        </label>

                        <textarea name="description"
                                  rows="6"
                                  class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('description', $profile->description) }}</textarea>

                    </div>


                    <div class="mt-5">

                        <label class="block text-sm font-semibold mb-2">
                            Visi Desa
                        </label>

                        <textarea name="vision"
                                  rows="4"
                                  class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('vision', $profile->vision) }}</textarea>

                    </div>


                    <div class="mt-5">

                        <label class="block text-sm font-semibold mb-2">
                            Misi Desa
                        </label>

                        <textarea name="mission"
                                  rows="6"
                                  class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('mission', $profile->mission) }}</textarea>

                    </div>

                </div>


                {{-- STATISTIK --}}
                <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-7 shadow-sm">

                    <h2 class="text-lg font-bold">
                        Statistik Desa
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        Isi sesuai data resmi desa.
                    </p>


                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-6">

                        <div>

                            <label class="block text-sm font-semibold mb-2">
                                Jumlah Penduduk
                            </label>

                            <input type="number"
                                   name="population"
                                   min="0"
                                   value="{{ old('population', $profile->population) }}"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500">

                        </div>


                        <div>

                            <label class="block text-sm font-semibold mb-2">
                                Kepala Keluarga
                            </label>

                            <input type="number"
                                   name="families"
                                   min="0"
                                   value="{{ old('families', $profile->families) }}"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500">

                        </div>


                        <div>

                            <label class="block text-sm font-semibold mb-2">
                                Jumlah Dusun
                            </label>

                            <input type="number"
                                   name="hamlets"
                                   min="0"
                                   value="{{ old('hamlets', $profile->hamlets) }}"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500">

                        </div>


                        <div>

                            <label class="block text-sm font-semibold mb-2">
                                Jumlah RT
                            </label>

                            <input type="number"
                                   name="rt"
                                   min="0"
                                   value="{{ old('rt', $profile->rt) }}"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500">

                        </div>


                        <div>

                            <label class="block text-sm font-semibold mb-2">
                                Jumlah RW
                            </label>

                            <input type="number"
                                   name="rw"
                                   min="0"
                                   value="{{ old('rw', $profile->rw) }}"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500">

                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT --}}
            <div>

                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm sticky top-6">

                    <h2 class="font-bold">
                        Foto Desa
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        Foto utama Desa Sidorejo.
                    </p>


                    <label for="image"
                           class="block border-2 border-dashed border-slate-300 hover:border-sky-400 rounded-2xl overflow-hidden cursor-pointer mt-5">

                        @if($profile->image)

                            <img id="imagePreview"
                                 src="{{ asset('storage/' . $profile->image) }}"
                                 alt="Foto Desa"
                                 class="w-full aspect-[4/3] object-cover">

                        @else

                            <div id="imagePlaceholder"
                                 class="aspect-[4/3] flex flex-col items-center justify-center text-slate-400">

                                <svg class="w-12 h-12"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="1.5"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M4 5h16v14H4zM8 14l3-3 2 2 3-4 4 5"/>

                                </svg>

                                <p class="text-sm font-semibold mt-3">
                                    Pilih Foto
                                </p>

                            </div>

                            <img id="imagePreview"
                                 class="hidden w-full aspect-[4/3] object-cover"
                                 alt="Preview">

                        @endif

                    </label>


                    <input type="file"
                           name="image"
                           id="image"
                           accept="image/jpeg,image/png,image/webp"
                           class="hidden"
                           onchange="previewImage(event)">


                    <p class="text-xs text-slate-400 mt-3">
                        JPG, PNG atau WebP. Maksimal 4 MB.
                    </p>


                    <button type="submit"
                            class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold px-5 py-3.5 rounded-xl mt-6">

                        Simpan Profil Desa

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


<script>

function previewImage(event) {

    const file = event.target.files[0];

    if (!file) return;

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