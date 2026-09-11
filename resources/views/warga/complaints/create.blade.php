@extends('layouts.warga')

@section('title', 'Buat Pengaduan')

@section('content')

<div class="max-w-5xl mx-auto space-y-8">

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 rounded-[2rem] p-6 sm:p-8 text-white shadow-xl shadow-blue-100">

        <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-24 left-1/3 w-72 h-72 bg-white/10 rounded-full"></div>

        <div class="relative z-10">

            <a href="{{ route('warga.complaints.index') }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-blue-100 hover:text-white transition">

                <svg class="w-4 h-4"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M15 19l-7-7 7-7"/>

                </svg>

                Kembali ke Pengaduan Saya

            </a>

            <div class="mt-5 max-w-2xl">

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-blue-100">
                    Layanan Pengaduan
                </div>

                <h1 class="text-3xl sm:text-4xl font-black tracking-tight mt-4">
                    Buat Pengaduan
                </h1>

                <p class="text-blue-100/90 mt-3 leading-relaxed">
                    Sampaikan pengaduan Anda kepada pemerintah desa dengan informasi yang jelas agar dapat ditindaklanjuti dengan lebih mudah.
                </p>

            </div>

        </div>

    </section>


    {{-- ERROR --}}
    @if($errors->any())

        <div class="bg-red-50 border border-red-200 rounded-2xl p-5">

            <div class="flex gap-3">

                <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 9v4m0 4h.01M10.3 3.7L2.7 17a2 2 0 001.7 3h15.2a2 2 0 001.7-3L13.7 3.7a2 2 0 00-3.4 0z"/>

                    </svg>

                </div>

                <div>

                    <p class="font-semibold text-red-700">
                        Data belum lengkap
                    </p>

                    <ul class="list-disc pl-5 mt-2 text-sm text-red-600 space-y-1">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    <form action="{{ route('warga.complaints.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            {{-- FORM --}}
            <div class="xl:col-span-2">

                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                    {{-- FORM HEADER --}}
                    <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-sky-50/40">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/>

                                </svg>

                            </div>

                            <div>

                                <h2 class="font-bold text-lg text-slate-900">
                                    Informasi Pengaduan
                                </h2>

                                <p class="text-sm text-slate-400 mt-0.5">
                                    Lengkapi data pengaduan di bawah ini.
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="p-5 sm:p-6 md:p-7 space-y-6">

                        {{-- JUDUL --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Judul Pengaduan
                                <span class="text-red-500">*</span>
                            </label>

                            <input type="text"
                                   name="title"
                                   value="{{ old('title') }}"
                                   required
                                   placeholder="Contoh: Lampu jalan mati"
                                   class="w-full border border-slate-300 rounded-xl px-4 py-3.5 text-slate-700 placeholder:text-slate-400 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                            <p class="text-xs text-slate-400 mt-2">
                                Gunakan judul singkat yang menggambarkan masalah.
                            </p>

                        </div>


                        {{-- KATEGORI --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Kategori
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">

                                <select name="category"
                                        required
                                        class="w-full appearance-none border border-slate-300 rounded-xl px-4 py-3.5 pr-10 text-slate-700 bg-white outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">

                                    <option value="">Pilih kategori pengaduan</option>

                                    <option value="Infrastruktur" {{ old('category') === 'Infrastruktur' ? 'selected' : '' }}>
                                        Infrastruktur
                                    </option>

                                    <option value="Kebersihan" {{ old('category') === 'Kebersihan' ? 'selected' : '' }}>
                                        Kebersihan
                                    </option>

                                    <option value="Keamanan" {{ old('category') === 'Keamanan' ? 'selected' : '' }}>
                                        Keamanan
                                    </option>

                                    <option value="Pelayanan" {{ old('category') === 'Pelayanan' ? 'selected' : '' }}>
                                        Pelayanan
                                    </option>

                                    <option value="Sosial" {{ old('category') === 'Sosial' ? 'selected' : '' }}>
                                        Sosial
                                    </option>

                                    <option value="Lainnya" {{ old('category') === 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya
                                    </option>

                                </select>

                                <svg class="w-5 h-5 text-slate-400 absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M19 9l-7 7-7-7"/>

                                </svg>

                            </div>

                        </div>


                        {{-- ISI --}}
                        <div>

                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 mb-2">

                                <label class="text-sm font-semibold text-slate-700">
                                    Isi Pengaduan
                                    <span class="text-red-500">*</span>
                                </label>

                                <span class="text-xs text-slate-400">
                                    Jelaskan secara lengkap
                                </span>

                            </div>

                            <textarea name="message"
                                      rows="7"
                                      required
                                      placeholder="Jelaskan masalah yang Anda alami, lokasi kejadian, kondisi saat ini, dan informasi lain yang diperlukan..."
                                      class="w-full resize-none border border-slate-300 rounded-xl px-4 py-3.5 text-slate-700 placeholder:text-slate-400 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">{{ old('message') }}</textarea>

                        </div>


                        {{-- LAMPIRAN --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Lampiran
                                <span class="text-slate-400 font-normal">(Opsional)</span>
                            </label>

                            <label class="group block border-2 border-dashed border-slate-300 hover:border-sky-400 hover:bg-sky-50/40 rounded-2xl p-6 cursor-pointer transition">

                                <div class="flex flex-col items-center text-center">

                                    <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center mb-3 group-hover:bg-sky-200 transition">

                                        <svg class="w-6 h-6"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-width="2"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 16V4m0 0L7 9m5-5l5 5M5 20h14"/>

                                        </svg>

                                    </div>

                                    <p class="font-semibold text-slate-700">
                                        Pilih file lampiran
                                    </p>

                                    <p class="text-sm text-slate-400 mt-1">
                                        JPG, JPEG, PNG, atau PDF
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1">
                                        Maksimal ukuran file 2 MB
                                    </p>

                                </div>

                                <input type="file"
                                       name="attachment"
                                       accept=".jpg,.jpeg,.png,.pdf"
                                       class="hidden"
                                       onchange="showFileName(this)">

                            </label>

                            <div id="fileName"
                                 class="hidden mt-3 bg-sky-50 border border-sky-100 rounded-xl px-4 py-3 text-sm text-sky-700">
                            </div>

                        </div>

                    </div>


                    {{-- FOOTER --}}
                    <div class="px-5 sm:px-6 py-5 bg-slate-50 border-t border-slate-200 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

                        <a href="{{ route('warga.complaints.index') }}"
                           class="inline-flex justify-center items-center px-5 py-3 rounded-xl bg-white border border-slate-300 text-slate-600 font-semibold hover:bg-slate-100 transition">
                            Batal
                        </a>

                        <button type="submit"
                                class="inline-flex justify-center items-center bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl font-semibold shadow-sm transition">

                            Kirim Pengaduan

                        </button>

                    </div>

                </div>

            </div>


            {{-- INFO SIDE --}}
            <aside class="space-y-5">

                <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm">

                    <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 9h.01M11 12h1v4h1m8-4a9 9 0 11-18 0 9 9 0 0118 0z"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-slate-900 mt-4">
                        Tips Pengaduan
                    </h3>

                    <div class="space-y-3 mt-4 text-sm text-slate-500 leading-relaxed">

                        <p>
                            Gunakan judul yang singkat dan mudah dipahami.
                        </p>

                        <p>
                            Jelaskan masalah, lokasi, dan kondisi secara jelas.
                        </p>

                        <p>
                            Tambahkan lampiran jika dapat membantu memperjelas laporan.
                        </p>

                    </div>

                </div>


                <div class="bg-sky-50 border border-sky-200 rounded-3xl p-5">

                    <div class="flex gap-3">

                        <div class="w-10 h-10 rounded-xl bg-white text-sky-600 flex items-center justify-center flex-shrink-0">

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

                            <p class="font-semibold text-sky-800">
                                Pastikan data benar
                            </p>

                            <p class="text-sm text-sky-700 mt-2 leading-relaxed">
                                Periksa kembali informasi sebelum mengirim pengaduan agar proses tindak lanjut lebih mudah.
                            </p>

                        </div>

                    </div>

                </div>

            </aside>

        </div>

    </form>

</div>


<script>
    function showFileName(input) {
        const fileName = document.getElementById('fileName');

        if (input.files && input.files.length > 0) {
            fileName.textContent = 'File dipilih: ' + input.files[0].name;
            fileName.classList.remove('hidden');
        } else {
            fileName.classList.add('hidden');
            fileName.textContent = '';
        }
    }
</script>

@endsection
