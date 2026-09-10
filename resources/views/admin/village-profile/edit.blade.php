<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Desa</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">

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
                    Profil Desa
                </h1>

                <p class="text-blue-100 mt-2 max-w-2xl">
                    Kelola informasi profil, statistik, kontak, peta, dan foto utama Desa Sidorejo.
                </p>

            </div>

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

                Kembali ke Dashboard

            </a>

        </div>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl p-4 mb-6">

            <div class="flex items-start gap-3">

                <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M5 13l4 4L19 7"/>

                    </svg>

                </div>

                <div>

                    <p class="font-semibold">
                        Berhasil
                    </p>

                    <p class="text-sm mt-1">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        </div>

    @endif


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


    <form action="{{ route('admin.village-profile.update') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            {{-- LEFT --}}
            <div class="xl:col-span-2 space-y-6">

                {{-- INFORMASI DESA --}}
                <section class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

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
                                          d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/>

                                </svg>

                            </div>

                            <div>

                                <h2 class="font-bold text-lg">
                                    Informasi Desa
                                </h2>

                                <p class="text-sm text-slate-400 mt-0.5">
                                    Informasi utama yang ditampilkan pada halaman publik.
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="p-5 sm:p-6">

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Nama Desa
                            </label>

                            <input type="text"
                                   name="village_name"
                                   value="{{ old('village_name', $profile->village_name) }}"
                                   required
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                        </div>


                        <div class="mt-5">

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Deskripsi Desa
                            </label>

                            <textarea name="description"
                                      rows="6"
                                      placeholder="Tuliskan deskripsi singkat tentang desa..."
                                      class="w-full resize-y border border-slate-300 rounded-xl px-4 py-3 leading-relaxed outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('description', $profile->description) }}</textarea>

                        </div>


                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mt-5">

                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Visi Desa
                                </label>

                                <textarea name="vision"
                                          rows="6"
                                          placeholder="Tuliskan visi desa..."
                                          class="w-full h-full min-h-[170px] resize-y border border-slate-300 rounded-xl px-4 py-3 leading-relaxed outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('vision', $profile->vision) }}</textarea>

                            </div>

                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Misi Desa
                                </label>

                                <textarea name="mission"
                                          rows="6"
                                          placeholder="Tuliskan misi desa..."
                                          class="w-full h-full min-h-[170px] resize-y border border-slate-300 rounded-xl px-4 py-3 leading-relaxed outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('mission', $profile->mission) }}</textarea>

                            </div>

                        </div>

                    </div>

                </section>


                {{-- STATISTIK --}}
                <section class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                    <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M4 19V9m5 10V5m5 14v-7m5 7V3"/>

                                </svg>

                            </div>

                            <div>

                                <h2 class="font-bold text-lg">
                                    Statistik Desa
                                </h2>

                                <p class="text-sm text-slate-400 mt-0.5">
                                    Isi berdasarkan data resmi desa.
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="p-5 sm:p-6">

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Jumlah Penduduk
                                </label>

                                <input type="number"
                                       name="population"
                                       min="0"
                                       value="{{ old('population', $profile->population) }}"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">

                            </div>

                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Kepala Keluarga
                                </label>

                                <input type="number"
                                       name="families"
                                       min="0"
                                       value="{{ old('families', $profile->families) }}"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">

                            </div>

                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Jumlah Dusun
                                </label>

                                <input type="number"
                                       name="hamlets"
                                       min="0"
                                       value="{{ old('hamlets', $profile->hamlets) }}"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">

                            </div>

                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Jumlah RT
                                </label>

                                <input type="number"
                                       name="rt"
                                       min="0"
                                       value="{{ old('rt', $profile->rt) }}"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">

                            </div>

                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Jumlah RW
                                </label>

                                <input type="number"
                                       name="rw"
                                       min="0"
                                       value="{{ old('rw', $profile->rw) }}"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">

                            </div>

                        </div>

                    </div>

                </section>


                {{-- KONTAK DESA --}}
                <section class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

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
                                          d="M3 5h18v14H3zM3 7l9 6 9-6"/>

                                </svg>

                            </div>

                            <div>

                                <h2 class="font-bold text-lg">
                                    Kontak Desa
                                </h2>

                                <p class="text-sm text-slate-400 mt-0.5">
                                    Informasi kontak yang ditampilkan pada website publik.
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="p-5 sm:p-6">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <div class="sm:col-span-2">

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Alamat Kantor Desa
                                </label>

                                <input type="text"
                                       name="address"
                                       value="{{ old('address', $profile->address) }}"
                                       placeholder="Masukkan alamat kantor desa"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100">

                            </div>


                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Email
                                </label>

                                <input type="email"
                                       name="email"
                                       value="{{ old('email', $profile->email) }}"
                                       placeholder="Masukkan email desa"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100">

                            </div>


                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Telepon / WhatsApp
                                </label>

                                <input type="text"
                                       name="phone"
                                       value="{{ old('phone', $profile->phone) }}"
                                       placeholder="Masukkan nomor telepon atau WhatsApp"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100">

                            </div>


                            <div class="sm:col-span-2">

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Jam Pelayanan
                                </label>

                                <input type="text"
                                       name="service_hours"
                                       value="{{ old('service_hours', $profile->service_hours) }}"
                                       placeholder="Masukkan jam pelayanan kantor desa"
                                       class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100">

                            </div>


                            <div class="sm:col-span-2">

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Google Maps Embed
                                </label>

                                <textarea name="maps_embed"
                                          rows="6"
                                          placeholder='Tempel kode iframe Google Maps di sini...'
                                          class="w-full resize-y border border-slate-300 rounded-xl px-4 py-3 font-mono text-sm leading-relaxed outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100">{{ old('maps_embed', $profile->maps_embed) }}</textarea>

                                <p class="text-xs text-slate-400 mt-2">
                                    Gunakan kode iframe dari menu Share → Embed a map di Google Maps.
                                </p>

                            </div>

                        </div>

                    </div>

                </section>

            </div>


            {{-- RIGHT --}}
            <aside class="space-y-6">

                {{-- FOTO --}}
                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden xl:sticky xl:top-6">

                    <div class="px-5 py-4 border-b border-slate-200 bg-slate-50">

                        <h2 class="font-bold">
                            Foto Utama Desa
                        </h2>

                        <p class="text-xs text-slate-400 mt-1">
                            Foto yang digunakan pada bagian profil desa.
                        </p>

                    </div>

                    <div class="p-5">

                        <label for="image"
                               class="block border-2 border-dashed border-slate-300 hover:border-sky-400 rounded-2xl overflow-hidden cursor-pointer transition">

                            @if($profile->image)

                                <img id="imagePreview"
                                     src="{{ asset('storage/' . $profile->image) }}"
                                     alt="Foto Desa"
                                     class="w-full aspect-[4/3] object-cover">

                                <div id="imagePlaceholder"
                                     class="hidden aspect-[4/3] flex-col items-center justify-center text-slate-400">

                                    <div class="w-14 h-14 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center">

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

                                    <p class="text-sm font-semibold mt-3">
                                        Pilih Foto
                                    </p>

                                </div>

                            @else

                                <div id="imagePlaceholder"
                                     class="aspect-[4/3] flex flex-col items-center justify-center text-slate-400 px-4 text-center">

                                    <div class="w-14 h-14 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center">

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

                                    <p class="text-sm font-semibold mt-3">
                                        Pilih Foto
                                    </p>

                                    <p class="text-xs mt-1">
                                        Klik untuk memilih foto utama desa.
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


                        <div class="mt-5 bg-slate-50 border border-slate-200 rounded-xl p-4">

                            <p class="text-xs uppercase tracking-wider font-bold text-slate-400">
                                Catatan
                            </p>

                            <p class="text-sm text-slate-500 leading-relaxed mt-2">
                                Jika tidak memilih foto baru, foto yang sudah tersimpan tetap digunakan.
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

                            Simpan Profil Desa

                        </button>

                    </div>

                </div>

            </aside>

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
                placeholder.classList.remove('flex');
            }
        };

        reader.readAsDataURL(file);
    }
</script>

</body>

</html>
