@extends('layouts.warga')

@section('title', 'Ajukan Surat')

@section('content')

<div class="space-y-8">

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 rounded-[2rem] p-6 sm:p-8 text-white shadow-xl shadow-blue-100">

        <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-24 left-1/3 w-72 h-72 bg-white/10 rounded-full"></div>

        <div class="relative z-10">

            <a href="{{ route('warga.letters.create') }}"
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

                Kembali ke Jenis Surat

            </a>

            <div class="mt-5 max-w-3xl">

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-blue-100">
                    Form Pengajuan Surat
                </div>

                <h1 class="text-3xl sm:text-4xl font-black tracking-tight mt-4">
                    {{ $letterType->name }}
                </h1>

                <p class="text-blue-100 mt-3 leading-relaxed">
                    {{ $letterType->description }}
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
                        Periksa kembali data pengajuan
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


    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- FORM UTAMA --}}
        <div class="xl:col-span-2">

            <form id="letterRequestForm"
                  action="{{ route('warga.letters.store', $letterType) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                @csrf


                {{-- DATA PEMOHON --}}
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
                                      d="M20 21a8 8 0 10-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>

                            </svg>

                        </div>

                        <div>

                            <h2 class="font-bold text-lg text-slate-900">
                                Data Pemohon
                            </h2>

                            <p class="text-sm text-slate-400 mt-0.5">
                                Data berikut diambil otomatis dari profil warga.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="p-5 sm:p-6 space-y-7">

                    {{-- IDENTITAS --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Nama
                            </label>

                            <input type="text"
                                   value="{{ auth()->user()->resident->name }}"
                                   disabled
                                   class="w-full border border-slate-200 bg-slate-100 text-slate-600 rounded-xl px-4 py-3 cursor-not-allowed">

                        </div>


                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                NIK
                            </label>

                            <input type="text"
                                   value="{{ auth()->user()->resident->nik }}"
                                   disabled
                                   class="w-full border border-slate-200 bg-slate-100 text-slate-600 rounded-xl px-4 py-3 cursor-not-allowed">

                        </div>


                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Nomor KK
                            </label>

                            <input type="text"
                                   value="{{ auth()->user()->resident->no_kk }}"
                                   disabled
                                   class="w-full border border-slate-200 bg-slate-100 text-slate-600 rounded-xl px-4 py-3 cursor-not-allowed">

                        </div>


                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                WhatsApp
                            </label>

                            <input type="text"
                                   value="{{ auth()->user()->resident->phone }}"
                                   disabled
                                   class="w-full border border-slate-200 bg-slate-100 text-slate-600 rounded-xl px-4 py-3 cursor-not-allowed">

                        </div>

                    </div>


                    {{-- KEPERLUAN --}}
                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Keperluan Surat
                            <span class="text-red-500">*</span>
                        </label>

                        <textarea name="purpose"
                                  rows="5"
                                  required
                                  placeholder="Jelaskan surat ini akan digunakan untuk apa..."
                                  class="w-full resize-none border border-slate-300 rounded-xl px-4 py-3.5 text-slate-700 placeholder:text-slate-400 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">{{ old('purpose') }}</textarea>

                        <p class="text-xs text-slate-400 mt-2">
                            Jelaskan tujuan penggunaan surat secara singkat dan jelas.
                        </p>

                    </div>


                    {{-- METODE PENERIMAAN --}}
                    @if($letterType->allow_pdf || $letterType->allow_pickup)

                        <div class="border-t border-slate-200 pt-7">

                            <div class="mb-4">

                                <p class="text-xs uppercase tracking-[0.18em] font-bold text-sky-600">
                                    Hasil Surat
                                </p>

                                <h3 class="font-bold text-lg text-slate-900 mt-1">
                                    Preferensi Penerimaan Surat
                                </h3>

                                <p class="text-sm text-slate-400 mt-1">
                                    Pilih metode penerimaan yang Anda inginkan. Metode akhir akan dikonfirmasi oleh admin desa setelah surat selesai diproses.
                                </p>

                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                @if($letterType->allow_pdf)

                                    <label class="group relative border border-slate-200 rounded-2xl p-5 cursor-pointer hover:border-sky-400 hover:bg-sky-50/40 transition">

                                        <input type="radio"
                                               name="delivery_method"
                                               value="pdf"
                                               {{ old('delivery_method') === 'pdf' ? 'checked' : '' }}
                                               class="peer absolute top-5 right-5 w-4 h-4 accent-sky-600">

                                        <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center mb-4 peer-checked:bg-sky-600 peer-checked:text-white transition">

                                            <svg class="w-5 h-5"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-width="2"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M7 3h7l5 5v13H7zM14 3v6h6"/>

                                            </svg>

                                        </div>

                                        <p class="font-bold text-slate-900">
                                            Download PDF
                                        </p>

                                        <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                                            Surat dapat diunduh langsung dari dashboard setelah selesai.
                                        </p>

                                    </label>

                                @endif


                                @if($letterType->allow_pickup)

                                    <label class="group relative border border-slate-200 rounded-2xl p-5 cursor-pointer hover:border-indigo-400 hover:bg-indigo-50/40 transition">

                                        <input type="radio"
                                               name="delivery_method"
                                               value="pickup"
                                               {{ old('delivery_method') === 'pickup' ? 'checked' : '' }}
                                               class="peer absolute top-5 right-5 w-4 h-4 accent-indigo-600">

                                        <div class="w-11 h-11 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center mb-4 peer-checked:bg-indigo-600 peer-checked:text-white transition">

                                            <svg class="w-5 h-5"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-width="2"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M3 21h18M5 21V9l7-5 7 5v12"/>

                                            </svg>

                                        </div>

                                        <p class="font-bold text-slate-900">
                                            Ambil di Balai Desa
                                        </p>

                                        <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                                            Surat diambil secara fisik setelah admin menyatakan surat siap.
                                        </p>

                                    </label>

                                @endif

                            </div>

                        </div>

                    @endif


                    {{-- DOKUMEN --}}
                    <div class="border-t border-slate-200 pt-7">

                        <div class="flex items-center gap-3 mb-5">

                            <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 16V4m0 0L7 9m5-5l5 5M5 20h14"/>

                                </svg>

                            </div>

                            <div>

                                <h2 class="font-bold text-lg text-slate-900">
                                    Dokumen Persyaratan
                                </h2>

                                <p class="text-sm text-slate-400 mt-0.5">
                                    Upload dokumen yang diperlukan untuk proses verifikasi.
                                </p>

                            </div>

                        </div>

                        <div class="space-y-5">

                            {{-- KTP --}}
                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Foto / Scan KTP
                                    <span class="text-red-500">*</span>
                                </label>

                                <label class="group block border-2 border-dashed border-slate-300 hover:border-sky-400 hover:bg-sky-50/40 rounded-2xl p-5 cursor-pointer transition">

                                    <div class="flex items-center gap-4">

                                        <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">

                                            <svg class="w-5 h-5"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-width="2"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M12 16V4m0 0L7 9m5-5l5 5M5 20h14"/>

                                            </svg>

                                        </div>

                                        <div class="min-w-0">

                                            <p class="font-semibold text-slate-700">
                                                Pilih file KTP
                                            </p>

                                            <p class="text-xs text-slate-400 mt-1">
                                                JPG, PNG, atau PDF. Maksimal 2 MB.
                                            </p>

                                            <p id="ktpFileName"
                                               class="text-xs text-sky-600 font-semibold mt-1 hidden truncate">
                                            </p>

                                            <p id="ktpFileError"
                                               class="text-xs text-red-600 font-semibold mt-1 hidden">
                                            </p>

                                        </div>

                                    </div>

                                    <input type="file"
                                           name="ktp"
                                           accept=".jpg,.jpeg,.png,.pdf"
                                           required
                                           class="hidden"
                                           onchange="handleDocumentFile(this, 'ktpFileName', 'ktpPreview', 'ktpFileError')">

                                </label>

                                <div id="ktpPreview"
                                     class="hidden mt-3">
                                </div>

                            </div>


                            {{-- KK --}}
                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Foto / Scan Kartu Keluarga
                                    <span class="text-red-500">*</span>
                                </label>

                                <label class="group block border-2 border-dashed border-slate-300 hover:border-sky-400 hover:bg-sky-50/40 rounded-2xl p-5 cursor-pointer transition">

                                    <div class="flex items-center gap-4">

                                        <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">

                                            <svg class="w-5 h-5"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-width="2"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M12 16V4m0 0L7 9m5-5l5 5M5 20h14"/>

                                            </svg>

                                        </div>

                                        <div class="min-w-0">

                                            <p class="font-semibold text-slate-700">
                                                Pilih file Kartu Keluarga
                                            </p>

                                            <p class="text-xs text-slate-400 mt-1">
                                                JPG, PNG, atau PDF. Maksimal 2 MB.
                                            </p>

                                            <p id="kkFileName"
                                               class="text-xs text-sky-600 font-semibold mt-1 hidden truncate">
                                            </p>

                                            <p id="kkFileError"
                                               class="text-xs text-red-600 font-semibold mt-1 hidden">
                                            </p>

                                        </div>

                                    </div>

                                    <input type="file"
                                           name="kk"
                                           accept=".jpg,.jpeg,.png,.pdf"
                                           required
                                           class="hidden"
                                           onchange="handleDocumentFile(this, 'kkFileName', 'kkPreview', 'kkFileError')">

                                </label>

                                <div id="kkPreview"
                                     class="hidden mt-3">
                                </div>

                            </div>


                            {{-- PENDUKUNG --}}
                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Dokumen Pendukung
                                    <span class="text-slate-400 font-normal">(Opsional)</span>
                                </label>

                                <label class="group block border-2 border-dashed border-slate-300 hover:border-indigo-400 hover:bg-indigo-50/40 rounded-2xl p-5 cursor-pointer transition">

                                    <div class="flex items-center gap-4">

                                        <div class="w-11 h-11 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center flex-shrink-0">

                                            <svg class="w-5 h-5"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-width="2"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M15.2 7.8l-6.8 6.8a2 2 0 102.8 2.8l7.5-7.5a4 4 0 00-5.7-5.7L5.5 11.7a6 6 0 108.5 8.5l6-6"/>

                                            </svg>

                                        </div>

                                        <div class="min-w-0">

                                            <p class="font-semibold text-slate-700">
                                                Pilih dokumen pendukung
                                            </p>

                                            <p class="text-xs text-slate-400 mt-1">
                                                Upload jika dokumen tambahan diperlukan.
                                            </p>

                                            <p id="supportingFileName"
                                               class="text-xs text-indigo-600 font-semibold mt-1 hidden truncate">
                                            </p>

                                            <p id="supportingFileError"
                                               class="text-xs text-red-600 font-semibold mt-1 hidden">
                                            </p>

                                        </div>

                                    </div>

                                    <input type="file"
                                           name="supporting_document"
                                           accept=".jpg,.jpeg,.png,.pdf"
                                           class="hidden"
                                           onchange="handleDocumentFile(this, 'supportingFileName', 'supportingPreview', 'supportingFileError')">

                                </label>

                                <div id="supportingPreview"
                                     class="hidden mt-3">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- FOOTER --}}
                <div class="px-5 sm:px-6 py-5 bg-slate-50 border-t border-slate-200 flex flex-col-reverse sm:flex-row sm:justify-between sm:items-center gap-3">

                    <a href="{{ route('warga.letters.create') }}"
                       class="inline-flex justify-center items-center px-5 py-3 rounded-xl bg-white border border-slate-300 text-slate-600 font-semibold hover:bg-slate-100 transition">
                        Batal
                    </a>

                    <button type="submit"
                            class="inline-flex justify-center items-center bg-sky-600 hover:bg-sky-700 text-white px-7 py-3 rounded-xl font-semibold shadow-sm transition">

                        Kirim Pengajuan

                    </button>

                </div>

            </form>

        </div>


        {{-- SIDEBAR INFORMASI --}}
        <aside class="space-y-5">

            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden xl:sticky xl:top-6">

                <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-sky-50/30">

                    <p class="text-xs uppercase tracking-[0.18em] font-bold text-sky-600">
                        Ringkasan
                    </p>

                    <h3 class="font-bold text-slate-900 mt-1">
                        Informasi Pengajuan
                    </h3>

                    <p class="text-sm text-slate-400 mt-1">
                        Ringkasan permohonan surat.
                    </p>

                </div>

                <div class="p-5 sm:p-6 space-y-5">

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Jenis Surat
                        </p>

                        <div class="flex items-center gap-3 mt-2">

                            <div class="w-9 h-9 bg-sky-100 text-sky-600 rounded-lg flex items-center justify-center">

                                <svg class="w-4 h-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                                </svg>

                            </div>

                            <p class="font-semibold text-slate-700">
                                {{ $letterType->name }}
                            </p>

                        </div>

                    </div>

                    <div class="border-t border-slate-100 pt-5">

                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Status Awal
                        </p>

                        <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1.5 rounded-full text-xs font-semibold mt-2">

                            <span class="w-2 h-2 bg-amber-500 rounded-full"></span>

                            Menunggu Verifikasi

                        </span>

                    </div>

                </div>

            </div>


            {{-- INFO PROSES --}}
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
                                  d="M12 9h.01M11 12h1v4h1m8-4a9 9 0 11-18 0 9 9 0 0118 0z"/>

                        </svg>

                    </div>

                    <div>

                        <p class="font-semibold text-sky-800">
                            Setelah dikirim
                        </p>

                        <p class="text-sm text-sky-700 leading-relaxed mt-2">
                            Admin desa akan memeriksa data dan dokumen Anda. Perubahan status dapat dipantau melalui menu Surat Saya.
                        </p>

                    </div>

                </div>

            </div>


            {{-- CHECKLIST --}}
            <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm">

                <h3 class="font-bold text-slate-900">
                    Sebelum Mengirim
                </h3>

                <div class="space-y-3 mt-4 text-sm text-slate-600">

                    <div class="flex items-start gap-3">

                        <div class="w-5 h-5 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0 mt-0.5">

                            <svg class="w-3 h-3"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="3"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M5 13l4 4L19 7"/>

                            </svg>

                        </div>

                        Pastikan data profil sudah benar.

                    </div>

                    <div class="flex items-start gap-3">

                        <div class="w-5 h-5 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0 mt-0.5">

                            <svg class="w-3 h-3"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="3"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M5 13l4 4L19 7"/>

                            </svg>

                        </div>

                        KTP dan KK terlihat jelas.

                    </div>

                    <div class="flex items-start gap-3">

                        <div class="w-5 h-5 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0 mt-0.5">

                            <svg class="w-3 h-3"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-width="3"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M5 13l4 4L19 7"/>

                            </svg>

                        </div>

                        Periksa kembali keperluan surat.

                    </div>

                </div>

            </div>

        </aside>

    </div>

</div>


<script>
    const MAX_FILE_SIZE = 2 * 1024 * 1024; // 2 MB
    const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'pdf'];

    function resetFileDisplay(fileNameEl, previewEl, errorEl) {
        fileNameEl.textContent = '';
        fileNameEl.classList.add('hidden');

        errorEl.textContent = '';
        errorEl.classList.add('hidden');

        previewEl.innerHTML = '';
        previewEl.classList.add('hidden');
    }

    function getFileExtension(fileName) {
        return fileName.split('.').pop().toLowerCase();
    }

    function formatFileSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
    }

    function handleDocumentFile(input, fileNameId, previewId, errorId) {
        const fileNameEl = document.getElementById(fileNameId);
        const previewEl = document.getElementById(previewId);
        const errorEl = document.getElementById(errorId);

        resetFileDisplay(fileNameEl, previewEl, errorEl);

        if (!input.files || input.files.length === 0) {
            return true;
        }

        const file = input.files[0];
        const extension = getFileExtension(file.name);

        if (!ALLOWED_EXTENSIONS.includes(extension)) {
            errorEl.textContent = 'Format file tidak didukung. Gunakan JPG, JPEG, PNG, atau PDF.';
            errorEl.classList.remove('hidden');
            input.value = '';
            return false;
        }

        if (file.size > MAX_FILE_SIZE) {
            errorEl.textContent = 'Ukuran file terlalu besar. Maksimal 2 MB.';
            errorEl.classList.remove('hidden');
            input.value = '';
            return false;
        }

        fileNameEl.textContent = 'File dipilih: ' + file.name + ' (' + formatFileSize(file.size) + ')';
        fileNameEl.classList.remove('hidden');

        if (['jpg', 'jpeg', 'png'].includes(extension)) {
            const reader = new FileReader();

            reader.onload = function (event) {
                previewEl.innerHTML = `
                    <div class="border border-slate-200 bg-slate-50 rounded-2xl p-3">
                        <div class="flex items-center justify-between gap-3 mb-3">
                            <p class="text-xs font-semibold text-slate-600">Preview gambar</p>
                            <span class="text-[11px] text-slate-400">${formatFileSize(file.size)}</span>
                        </div>
                        <img src="${event.target.result}"
                             alt="Preview ${file.name}"
                             class="w-full max-h-64 object-contain rounded-xl bg-white border border-slate-200">
                    </div>
                `;
                previewEl.classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        } else {
            previewEl.innerHTML = `
                <div class="flex items-center gap-3 border border-slate-200 bg-slate-50 rounded-2xl p-4">
                    <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                  d="M7 3h7l5 5v13H7zM14 3v6h6"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-slate-700 truncate">${file.name}</p>
                        <p class="text-xs text-slate-400 mt-1">Dokumen PDF • ${formatFileSize(file.size)}</p>
                    </div>
                </div>
            `;
            previewEl.classList.remove('hidden');
        }

        return true;
    }

    document.getElementById('letterRequestForm').addEventListener('submit', function (event) {
        const fileInputs = this.querySelectorAll('input[type="file"]');
        let valid = true;

        fileInputs.forEach(function (input) {
            if (!input.files || input.files.length === 0) return;

            const file = input.files[0];
            const extension = getFileExtension(file.name);

            if (!ALLOWED_EXTENSIONS.includes(extension) || file.size > MAX_FILE_SIZE) {
                valid = false;
            }
        });

        if (!valid) {
            event.preventDefault();
            alert('Periksa kembali file yang diunggah. Format harus JPG, JPEG, PNG, atau PDF dengan ukuran maksimal 2 MB.');
        }
    });
</script>

@endsection
