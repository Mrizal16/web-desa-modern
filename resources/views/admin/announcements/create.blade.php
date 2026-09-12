<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengumuman</title>
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
                    Tambah Pengumuman
                </h1>

                <p class="text-blue-100 mt-2 max-w-2xl">
                    Buat pengumuman baru untuk masyarakat Desa Sidorejo.
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

                <a href="{{ route('admin.announcements.index') }}"
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

                    Daftar Pengumuman

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


    <form action="{{ route('admin.announcements.store') }}"
          method="POST">

        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- LEFT --}}
            <div class="lg:col-span-2">

                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                    <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M18 8a6 6 0 00-12 0c0 7-3 7-3 7h18s-3 0-3-7M10 19h4"/>

                                </svg>

                            </div>

                            <div>

                                <h2 class="font-bold text-lg">
                                    Informasi Pengumuman
                                </h2>

                                <p class="text-sm text-slate-400 mt-0.5">
                                    Lengkapi judul dan isi pengumuman.
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="p-5 sm:p-6">

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Judul Pengumuman
                            </label>

                            <input type="text"
                                   name="title"
                                   value="{{ old('title') }}"
                                   required
                                   placeholder="Contoh: Jadwal Pelayanan Kantor Desa"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3 text-base outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-100">

                        </div>


                        <div class="mt-5">

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Isi Pengumuman
                            </label>

                            <textarea name="content"
                                      rows="12"
                                      required
                                      placeholder="Tuliskan isi pengumuman secara lengkap..."
                                      class="w-full resize-y border border-slate-300 rounded-xl px-4 py-3 text-base leading-relaxed outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-100">{{ old('content') }}</textarea>

                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT --}}
            <div>

                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden sticky top-6">

                    <div class="px-5 py-4 border-b border-slate-200 bg-slate-50">

                        <h2 class="font-bold">
                            Publikasi
                        </h2>

                        <p class="text-xs text-slate-400 mt-1">
                            Tentukan status awal pengumuman.
                        </p>

                    </div>

                    <div class="p-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Status
                        </label>

                        <select name="status"
                                required
                                class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-100">

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
                                Draft tidak tampil di website publik. Pilih Publish Sekarang jika pengumuman sudah siap ditampilkan.
                            </p>

                        </div>


                        <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-5 py-3.5 rounded-xl mt-5 transition">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M5 13l4 4L19 7"/>

                            </svg>

                            Simpan Pengumuman

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

</body>
</html>
