<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Konsultasi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 13px;
            margin: 40px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 250px;
            height: auto;
            margin-bottom: 10px;
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 10px;
            color: #2d3436;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            vertical-align: top;
        }

        th {
            width: 35%;
            background-color: #f0f0f0;
            text-align: left;
        }

        .gizi-table th {
            width: 50%;
        }

        .section-title {
            margin-top: 40px;
            text-align: left;
            font-size: 15px;
            font-weight: bold;
            color: #2d3436;
        }
    </style>
</head>
<body>
    <div class="header">
    <img src="file://{{ public_path('images/logo-rs.png') }}" alt="Logo RSUP" class="logo">
    <h2>Laporan Riwayat Konsultasi Gizi</h2>
</div>

    <table>
        <tr>
            <th>Nama Pasien</th>
            <td>{{ $konsultasi->pasien->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Nama Ahli Gizi</th>
            <td>{{ $konsultasi->ahliGizi->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tanggal Konsultasi</th>
            <td>{{ \Carbon\Carbon::parse($konsultasi->tanggal_konsultasi)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>Keluhan</th>
            <td>{{ $konsultasi->keluhan }}</td>
        </tr>
        <tr>
            <th>Hasil</th>
            <td>{{ $konsultasi->hasil ?? '-' }}</td>
        </tr>
    </table>

    @if ($gizi)
        <h3 class="section-title">Hasil Analisis Gizi</h3>
        <table class="gizi-table">
            <tr>
                <th>IMT</th>
                <td>{{ $gizi['imt'] }} ({{ $gizi['kategori'] }})</td>
            </tr>
            <tr>
                <th>Energi</th>
                <td>{{ $gizi['kalori'] }} kkal/hari</td>
            </tr>
            <tr>
                <th>Protein</th>
                <td>{{ $gizi['protein'] }} gram</td>
            </tr>
            <tr>
                <th>Karbohidrat</th>
                <td>{{ $gizi['karbo'] }} gram</td>
            </tr>
            <tr>
                <th>Lemak</th>
                <td>{{ $gizi['lemak'] }} gram</td>
            </tr>
            <tr>
                <th>BMR</th>
                <td>{{ $gizi['bmr'] }} kkal/hari</td>
            </tr>
        </table>
    @endif
</body>
</html>
