@extends('layouts.warga')

@section('title', 'Perbaiki Permohonan')

@section('content')

<div class="max-w-5xl mx-auto space-y-8">

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 rounded-[2rem] p-6 sm:p-8 text-white shadow-xl shadow-blue-100">

        <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-24 left-1/3 w-72 h-72 bg-white/10 rounded-full"></div>

        <div class="relative z-10">

            <a href="{{ route('warga.letters.show', $letterRequest) }}"
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

                Kembali ke Detail

            </a>

            <div class="mt-5 max-w-3xl">

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-blue-100">
                    Revisi Permohonan
                </div>

                <h1 class="text-3xl sm:text-4xl font-black tracking-tight mt-4">
                    Perbaiki Permohonan
                </h1>

                <p class="text-blue-100 mt-3 leading-relaxed">
                    Perbaiki data atau dokumen sesuai catatan yang diberikan oleh admin desa.
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
                        Periksa kembali data perbaikan
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


    {{-- CATATAN ADMIN --}}
    @if($letterRequest->admin_note)

        <div class="bg-amber-50 border border-amber-200 rounded-3xl p-5">

            <div class="flex gap-4">

                <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0">

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

                    <p class="text-sm font-bold text-amber-800">
                        Catatan Perbaikan dari Admin
                    </p>

                    <p class="text-sm text-amber-800 leading-relaxed mt-2 whitespace-pre-line">
                        {{ $letterRequest->admin_note }}
                    </p>

                </div>

            </div>

        </div>

    @endif


    <form id="letterRevisionForm"
          action="{{ route('warga.letters.revision.update', $letterRequest) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- FORM UTAMA --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- DATA PERMOHONAN --}}
                <section class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

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
                                          d="M9 12h6m-6 4h6M7 3h7l5 5v13H7z"/>

                                </svg>

                            </div>

                            <div>

                                <h2 class="font-bold text-lg text-slate-900">
                                    Data Permohonan
                                </h2>

                                <p class="text-sm text-slate-400 mt-0.5">
                                    Perbarui informasi yang perlu diperbaiki.
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="p-5 sm:p-6">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Keperluan Surat
                            <span class="text-red-500">*</span>
                        </label>

                        <textarea name="purpose"
                                  rows="5"
                                  required
                                  placeholder="Jelaskan tujuan penggunaan surat..."
                                  class="w-full resize-none border border-slate-300 rounded-xl px-4 py-3.5 text-slate-700 placeholder:text-slate-400 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition">{{ old('purpose', $letterRequest->purpose) }}</textarea>

                        <p class="text-xs text-slate-400 mt-2">
                            Pastikan tujuan surat sudah sesuai dengan perbaikan yang diminta admin.
                        </p>

                    </div>

                </section>


                {{-- DOKUMEN --}}
                <section class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

                    <div class="px-5 sm:px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-sky-50/40">

                        <div class="flex items-center gap-3">

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
                                    Upload Ulang Dokumen
                                </h2>

                                <p class="text-sm text-slate-400 mt-0.5">
                                    Upload hanya dokumen yang perlu diperbaiki.
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="p-5 sm:p-6 space-y-5">

                        <div class="bg-sky-50 border border-sky-100 rounded-2xl px-4 py-3">

                            <p class="text-sm text-sky-700">
                                Jika dokumen tidak diganti, sistem akan tetap menggunakan dokumen lama.
                            </p>

                        </div>


                        {{-- KTP --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                KTP
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
                                            Upload KTP Baru
                                        </p>

                                        <p class="text-xs text-slate-400 mt-1">
                                            JPG, JPEG, PNG, atau PDF.
                                        </p>

                                        <p id="ktpFileName"
                                           class="hidden text-xs text-sky-600 font-semibold mt-1 truncate">
                                        </p>

                                        <p id="ktpFileError"
                                           class="hidden text-xs text-red-600 font-semibold mt-1">
                                        </p>

                                    </div>

                                </div>

                                <input type="file"
                                       name="ktp"
                                       accept=".jpg,.jpeg,.png,.pdf"
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
                                Kartu Keluarga
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
                                            Upload Kartu Keluarga Baru
                                        </p>

                                        <p class="text-xs text-slate-400 mt-1">
                                            JPG, JPEG, PNG, atau PDF.
                                        </p>

                                        <p id="kkFileName"
                                           class="hidden text-xs text-sky-600 font-semibold mt-1 truncate">
                                        </p>

                                        <p id="kkFileError"
                                           class="hidden text-xs text-red-600 font-semibold mt-1">
                                        </p>

                                    </div>

                                </div>

                                <input type="file"
                                       name="kk"
                                       accept=".jpg,.jpeg,.png,.pdf"
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
                                            Upload Dokumen Pendukung Baru
                                        </p>

                                        <p class="text-xs text-slate-400 mt-1">
                                            Opsional. Upload jika diperlukan.
                                        </p>

                                        <p id="supportingFileName"
                                           class="hidden text-xs text-indigo-600 font-semibold mt-1 truncate">
                                        </p>

                                        <p id="supportingFileError"
                                           class="hidden text-xs text-red-600 font-semibold mt-1">
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

                </section>

            </div>


            {{-- SIDEBAR --}}
            <aside class="space-y-5">

                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden lg:sticky lg:top-6">

                    <div class="px-5 py-4 border-b border-slate-200 bg-gradient-to-r from-white to-sky-50/30">

                        <p class="text-xs uppercase tracking-[0.18em] font-semibold text-sky-600">
                            Status
                        </p>

                        <h3 class="font-bold text-slate-900 mt-1">
                            Perlu Perbaikan
                        </h3>

                    </div>

                    <div class="p-5">

                        <span class="inline-flex items-center gap-2 bg-orange-50 text-orange-700 border border-orange-200 px-3 py-1.5 rounded-full text-xs font-semibold">

                            <span class="w-2 h-2 rounded-full bg-orange-500"></span>

                            Perlu Perbaikan

                        </span>

                        <p class="text-sm text-slate-500 leading-relaxed mt-4">
                            Setelah perbaikan dikirim, permohonan akan kembali ke status menunggu verifikasi admin.
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
                                      d="M12 9h.01M11 12h1v4h1m8-4a9 9 0 11-18 0 9 9 0 0118 0z"/>

                            </svg>

                        </div>

                        <div>

                            <p class="font-semibold text-sky-800">
                                Tips Perbaikan
                            </p>

                            <p class="text-sm text-sky-700 leading-relaxed mt-2">
                                Baca catatan admin dengan teliti dan hanya ganti bagian yang diminta agar proses verifikasi lebih cepat.
                            </p>

                        </div>

                    </div>

                </div>

            </aside>

        </div>


        {{-- ACTION --}}
        <div class="mt-6 bg-white border border-slate-200 rounded-3xl p-5 shadow-sm flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

            <a href="{{ route('warga.letters.show', $letterRequest) }}"
               class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-white border border-slate-300 text-slate-600 font-semibold hover:bg-slate-100 transition">

                Batal

            </a>

            <button type="submit"
                    onclick="return confirm('Kirim perbaikan permohonan ini ke admin?')"
                    class="inline-flex items-center justify-center bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl font-semibold shadow-sm transition">

                Kirim Perbaikan

            </button>

        </div>

    </form>

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

    document.getElementById('letterRevisionForm').addEventListener('submit', function (event) {
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
