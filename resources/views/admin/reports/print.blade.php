<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pelayanan Desa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #222;
            margin: 30px;
        }

        h1 {
            margin-bottom: 5px;
            text-align: center;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 20px;
            color: #555;
        }

        .period {
            margin-bottom: 15px;
        }

        .actions {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 9px 14px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
        }

        .btn-print {
            background: #16a34a;
            color: white;
        }

        .btn-back {
            background: #374151;
            color: white;
        }

        .stats {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        .stats td {
            width: 33.33%;
            padding: 10px;
            border: 1px solid #ddd;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        table.data th,
        table.data td {
            border: 1px solid #ccc;
            padding: 7px;
            text-align: left;
        }

        table.data th {
            background: #eee;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 8px;
        }

        @media print {
            .actions {
                display: none;
            }

            body {
                margin: 0;
            }

            @page {
                size: A4 landscape;
                margin: 12mm;
            }
        }
    </style>
</head>

<body>

<div class="actions">
    <button onclick="window.print()" class="btn btn-print">
        Cetak / Simpan PDF
    </button>

    <a href="{{ route('admin.reports.index', [
        'start_date' => $startDate ?? '',
        'end_date' => $endDate ?? ''
    ]) }}" class="btn btn-back">
        Kembali
    </a>
</div>

<h1>Laporan Pelayanan Administrasi Desa</h1>

<div class="subtitle">
    Sistem Informasi Desa
</div>

<div class="period">
    <strong>Periode:</strong>
    {{ $startDate ? \Carbon\Carbon::parse($startDate)->format('d-m-Y') : 'Semua' }}
    -
    {{ $endDate ? \Carbon\Carbon::parse($endDate)->format('d-m-Y') : 'Semua' }}
</div>

<table class="stats">
    <tr>
        <td>
            <strong>Total Warga</strong><br>
            {{ $stats['total_residents'] }}
        </td>

        <td>
            <strong>Total Permohonan Surat</strong><br>
            {{ $stats['total_letters'] }}
        </td>

        <td>
            <strong>Surat Selesai</strong><br>
            {{ $stats['completed_letters'] }}
        </td>
    </tr>

    <tr>
        <td>
            <strong>Surat Ditolak</strong><br>
            {{ $stats['rejected_letters'] }}
        </td>

        <td>
            <strong>Total Pengaduan</strong><br>
            {{ $stats['total_complaints'] }}
        </td>

        <td>
            <strong>Pengaduan Selesai</strong><br>
            {{ $stats['completed_complaints'] }}
        </td>
    </tr>
</table>

<h2>Permohonan Surat</h2>

<table class="data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Permohonan</th>
            <th>Warga</th>
            <th>Jenis Surat</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>

    <tbody>
        @forelse($latestLetters as $request)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $request->request_number }}</td>
                <td>{{ $request->user->name ?? '-' }}</td>
                <td>{{ $request->letterType->name ?? '-' }}</td>
                <td>{{ $request->status }}</td>
                <td>{{ $request->created_at->format('d-m-Y H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center">
                    Tidak ada data permohonan.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<h2>Pengaduan Warga</h2>

<table class="data">
    <thead>
        <tr>
            <th>No</th>
            <th>Warga</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>

    <tbody>
        @forelse($latestComplaints as $complaint)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $complaint->user->name ?? '-' }}</td>
                <td>{{ $complaint->title }}</td>
                <td>{{ $complaint->category }}</td>
                <td>{{ $complaint->status }}</td>
                <td>{{ $complaint->created_at->format('d-m-Y H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center">
                    Tidak ada data pengaduan.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>