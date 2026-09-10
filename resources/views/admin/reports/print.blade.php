<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Pelayanan Desa Sidorejo</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Inter, Arial, Helvetica, sans-serif;
            font-size: 11px;
            color: #1e293b;
            margin: 0;
            background: #eef2ff;
        }

        .page {
            width: 100%;
            max-width: 1250px;
            margin: 26px auto 40px;
            background: #ffffff;
            padding: 32px;
            border: 1px solid #dbeafe;
            border-radius: 22px;
            box-shadow: 0 18px 45px rgba(30, 64, 175, 0.10);
        }

        /* ACTIONS */

        .actions {
            max-width: 1250px;
            margin: 24px auto 0;
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 0 4px;
        }

        .actions-left,
        .actions-right {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 17px;
            border: none;
            border-radius: 12px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: 700;
            transition: 0.2s;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.08);
        }

        .btn-print {
            background: #2563eb;
            color: #ffffff;
        }

        .btn-print:hover {
            background: #1d4ed8;
        }

        .btn-back {
            background: #ffffff;
            color: #1e40af;
            border: 1px solid #bfdbfe;
        }

        .btn-back:hover {
            background: #eff6ff;
        }

        /* HEADER */

        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            padding: 20px 22px;
            border-radius: 16px;
            color: #ffffff;
            background: linear-gradient(135deg, #0284c7 0%, #2563eb 55%, #4338ca 100%);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .logo {
            width: 58px;
            height: 58px;
            border-radius: 15px;
            background: rgba(255,255,255,0.16);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 800;
            border: 1px solid rgba(255,255,255,0.26);
        }

        .brand h1 {
            margin: 0;
            font-size: 22px;
            color: #ffffff;
        }

        .brand p {
            margin: 5px 0 0;
            color: #dbeafe;
            font-size: 11px;
        }

        .report-info {
            text-align: right;
            font-size: 10px;
            color: #dbeafe;
            line-height: 1.7;
        }

        .report-info strong {
            color: #ffffff;
        }

        /* TITLE */

        .report-title {
            text-align: center;
            margin: 28px 0 18px;
        }

        .report-title h2 {
            margin: 0;
            font-size: 19px;
            color: #0f172a;
        }

        .report-title p {
            margin: 6px 0 0;
            color: #64748b;
        }

        /* PERIOD */

        .period-box {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 12px;
            padding: 12px 14px;
            margin-bottom: 20px;
            color: #1e3a8a;
        }

        .period-box strong {
            color: #334155;
        }

        /* STATS */

        .stats {
            width: 100%;
            border-collapse: separate;
            border-spacing: 8px;
            margin: -8px -8px 20px;
        }

        .stats td {
            width: 33.33%;
            padding: 14px;
            border: 1px solid #dbeafe;
            border-radius: 12px;
            vertical-align: top;
            background: #ffffff;
        }

        .stat-label {
            color: #64748b;
            font-size: 10px;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 22px;
            font-weight: bold;
            color: #0f172a;
        }

        /* SECTION */

        .section {
            margin-top: 28px;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .section-title h3 {
            margin: 0;
            font-size: 15px;
            color: #0f172a;
            padding-left: 9px;
            border-left: 4px solid #2563eb;
        }

        .section-title span {
            font-size: 10px;
            color: #64748b;
        }

        /* TABLE */

        table.data {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        table.data th,
        table.data td {
            border: 1px solid #cbd5e1;
            padding: 8px;
            text-align: left;
            vertical-align: top;
            word-break: break-word;
        }

        table.data th {
            background: #eff6ff;
            color: #1e40af;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        table.data tbody tr:nth-child(even) {
            background: #fafafa;
        }

        .text-center {
            text-align: center !important;
        }

        .nowrap {
            white-space: nowrap;
        }

        /* STATUS */

        .status {
            display: inline-block;
            padding: 4px 7px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status-waiting {
            background: #fef3c7;
            color: #92400e;
        }

        .status-process {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-revision {
            background: #ffedd5;
            color: #c2410c;
        }

        .status-rejected {
            background: #fee2e2;
            color: #b91c1c;
        }

        .status-done {
            background: #d1fae5;
            color: #047857;
        }

        /* FOOTER */

        .report-footer {
            margin-top: 30px;
            padding-top: 14px;
            border-top: 1px solid #cbd5e1;
            display: flex;
            justify-content: space-between;
            color: #64748b;
            font-size: 9px;
        }

        @media (max-width: 768px) {
            .page {
                margin: 15px;
                width: auto;
                padding: 18px;
            }

            .actions {
                margin: 15px;
                flex-direction: column;
            }

            .actions-left,
            .actions-right {
                width: 100%;
            }

            .btn {
                flex: 1;
            }

            .report-header {
                flex-direction: column;
            }

            .report-info {
                text-align: left;
            }

            .stats {
                border-spacing: 5px;
            }

            .stats td {
                padding: 8px;
            }

            .stat-value {
                font-size: 17px;
            }

            .table-wrapper {
                overflow-x: auto;
            }

            table.data {
                min-width: 800px;
            }
        }

        @media print {

            body {
                background: #ffffff;
                margin: 0;
                font-size: 9px;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .actions {
                display: none !important;
            }

            .page {
                width: 100%;
                max-width: none;
                margin: 0;
                padding: 0;
                border: none;
                border-radius: 0;
                box-shadow: none;
            }

            .report-header {
                padding: 14px 16px;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .report-title {
                margin: 15px 0 12px;
            }

            .period-box {
                margin-bottom: 12px;
                padding: 8px 10px;
            }

            .stats {
                margin-bottom: 12px;
            }

            .stats td {
                padding: 8px 10px;
            }

            .stat-value {
                font-size: 17px;
            }

            .section {
                margin-top: 18px;
                page-break-inside: auto;
            }

            .section-title {
                margin-bottom: 6px;
            }

            table.data {
                font-size: 8px;
            }

            table.data th,
            table.data td {
                padding: 5px;
            }

            table.data thead {
                display: table-header-group;
            }

            table.data tr {
                page-break-inside: avoid;
            }

            .report-footer {
                margin-top: 18px;
            }

            @page {
                size: A4 landscape;
                margin: 10mm;
            }
        }
    </style>
</head>

<body>

{{-- ACTIONS --}}
<div class="actions">

    <div class="actions-left">

        <a href="{{ route('admin.reports.index', [
            'start_date' => $startDate ?? '',
            'end_date' => $endDate ?? ''
        ]) }}"
           class="btn btn-back">

            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M15 18l-6-6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            Kembali

        </a>

    </div>

    <div class="actions-right">

        <button onclick="window.print()"
                class="btn btn-print">

            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2M6 14h12v8H6z"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            Cetak / Simpan PDF

        </button>

    </div>

</div>

<div class="page">

    {{-- HEADER --}}
    <div class="report-header">

        <div class="brand">

            <div class="logo">
                DS
            </div>

            <div>
                <h1>Desa Sidorejo</h1>

                <p>
                    Sistem Informasi dan Pelayanan Administrasi Desa
                </p>
            </div>

        </div>

        <div class="report-info">

            <strong>Laporan Pelayanan</strong><br>

            Dicetak:
            {{ now()->format('d-m-Y H:i') }}

        </div>

    </div>

    {{-- TITLE --}}
    <div class="report-title">

        <h2>
            LAPORAN PELAYANAN ADMINISTRASI DESA
        </h2>

        <p>
            Rekapitulasi permohonan surat dan pengaduan warga
        </p>

    </div>

    {{-- PERIOD --}}
    <div class="period-box">

        <strong>Periode Laporan:</strong>

        {{ $startDate
            ? \Carbon\Carbon::parse($startDate)->format('d-m-Y')
            : 'Semua Data' }}

        &nbsp; s/d &nbsp;

        {{ $endDate
            ? \Carbon\Carbon::parse($endDate)->format('d-m-Y')
            : 'Semua Data' }}

    </div>

    {{-- STATISTICS --}}
    <table class="stats">

        <tr>

            <td>
                <div class="stat-label">
                    Total Warga
                </div>

                <div class="stat-value">
                    {{ $stats['total_residents'] }}
                </div>
            </td>

            <td>
                <div class="stat-label">
                    Total Permohonan Surat
                </div>

                <div class="stat-value">
                    {{ $stats['total_letters'] }}
                </div>
            </td>

            <td>
                <div class="stat-label">
                    Surat Selesai
                </div>

                <div class="stat-value">
                    {{ $stats['completed_letters'] }}
                </div>
            </td>

        </tr>

        <tr>

            <td>
                <div class="stat-label">
                    Surat Ditolak
                </div>

                <div class="stat-value">
                    {{ $stats['rejected_letters'] }}
                </div>
            </td>

            <td>
                <div class="stat-label">
                    Total Pengaduan
                </div>

                <div class="stat-value">
                    {{ $stats['total_complaints'] }}
                </div>
            </td>

            <td>
                <div class="stat-label">
                    Pengaduan Selesai
                </div>

                <div class="stat-value">
                    {{ $stats['completed_complaints'] }}
                </div>
            </td>

        </tr>

    </table>

    {{-- PERMOHONAN SURAT --}}
    <div class="section">

        <div class="section-title">

            <h3>
                A. Permohonan Surat
            </h3>

            <span>
                Total: {{ $latestLetters->count() }} data
            </span>

        </div>

        <div class="table-wrapper">

            <table class="data">

                <thead>

                    <tr>

                        <th style="width: 5%;" class="text-center">
                            No
                        </th>

                        <th style="width: 18%;">
                            Nomor Permohonan
                        </th>

                        <th style="width: 20%;">
                            Warga
                        </th>

                        <th style="width: 23%;">
                            Jenis Surat
                        </th>

                        <th style="width: 17%;">
                            Status
                        </th>

                        <th style="width: 17%;">
                            Tanggal
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($latestLetters as $request)

                        @php
                            $letterStatus = strtoupper($request->status ?? '');
                        @endphp

                        <tr>

                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <strong>
                                    {{ $request->request_number }}
                                </strong>
                            </td>

                            <td>
                                {{ $request->user->name ?? '-' }}
                            </td>

                            <td>
                                {{ $request->letterType->name ?? '-' }}
                            </td>

                            <td>

                                @if($letterStatus === 'MENUNGGU VERIFIKASI')

                                    <span class="status status-waiting">
                                        Menunggu Verifikasi
                                    </span>

                                @elseif($letterStatus === 'DIPROSES')

                                    <span class="status status-process">
                                        Diproses
                                    </span>

                                @elseif($letterStatus === 'PERLU PERBAIKAN')

                                    <span class="status status-revision">
                                        Perlu Perbaikan
                                    </span>

                                @elseif($letterStatus === 'DITOLAK')

                                    <span class="status status-rejected">
                                        Ditolak
                                    </span>

                                @elseif($letterStatus === 'SELESAI')

                                    <span class="status status-done">
                                        Selesai
                                    </span>

                                @else

                                    {{ $request->status }}

                                @endif

                            </td>

                            <td class="nowrap">
                                {{ $request->created_at->format('d-m-Y H:i') }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center">

                                Tidak ada data permohonan pada periode ini.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- PENGADUAN --}}
    <div class="section">

        <div class="section-title">

            <h3>
                B. Pengaduan Warga
            </h3>

            <span>
                Total: {{ $latestComplaints->count() }} data
            </span>

        </div>

        <div class="table-wrapper">

            <table class="data">

                <thead>

                    <tr>

                        <th style="width: 5%;" class="text-center">
                            No
                        </th>

                        <th style="width: 20%;">
                            Warga
                        </th>

                        <th style="width: 25%;">
                            Judul
                        </th>

                        <th style="width: 18%;">
                            Kategori
                        </th>

                        <th style="width: 15%;">
                            Status
                        </th>

                        <th style="width: 17%;">
                            Tanggal
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($latestComplaints as $complaint)

                        @php
                            $complaintStatus = strtoupper($complaint->status ?? '');
                        @endphp

                        <tr>

                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $complaint->user->name ?? '-' }}
                            </td>

                            <td>
                                <strong>
                                    {{ $complaint->title }}
                                </strong>
                            </td>

                            <td>
                                {{ $complaint->category }}
                            </td>

                            <td>

                                @if($complaintStatus === 'MENUNGGU')

                                    <span class="status status-waiting">
                                        Menunggu
                                    </span>

                                @elseif($complaintStatus === 'DIPROSES')

                                    <span class="status status-process">
                                        Diproses
                                    </span>

                                @elseif($complaintStatus === 'SELESAI')

                                    <span class="status status-done">
                                        Selesai
                                    </span>

                                @else

                                    {{ $complaint->status }}

                                @endif

                            </td>

                            <td class="nowrap">
                                {{ $complaint->created_at->format('d-m-Y H:i') }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center">

                                Tidak ada data pengaduan pada periode ini.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- FOOTER --}}
    <div class="report-footer">

        <div>
            Sistem Informasi Desa Sidorejo
        </div>

        <div>
            Dicetak pada {{ now()->format('d-m-Y H:i') }}
        </div>

    </div>

</div>

</body>

</html>