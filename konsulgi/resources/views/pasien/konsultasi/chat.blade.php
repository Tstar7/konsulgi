<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konsultasi Gizi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9f5f2;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #2d6a4f;
            color: white;
            padding-top: 30px;
            position: fixed;
            height: 100vh;
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a, .sidebar form button {
            padding: 15px 30px;
            color: white;
            text-decoration: none;
            background: none;
            border: none;
            display: block;
            width: 100%;
            text-align: left;
            cursor: pointer;
            transition: background 0.3s;
        }

        .sidebar a:hover, .sidebar form button:hover {
            background-color: #40916c;
        }

        .content {
            margin-left: 250px;
            padding: 40px;
            flex: 1;
        }

        h2 {
            color: #1b4332;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #c0c0c0;
            font-weight: bold;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #999;
        }

        th {
            background-color: #999;
            text-align: left;
        }

        button.chat-button {
            padding: 6px 14px;
            background-color: #fff;
            border: 1px solid #000;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        button.chat-button:hover {
            background-color: #e0e0e0;
        }

    </style>
</head>
<body>

    <div class="sidebar">
        <h2>KONSULZI</h2>
        <a href="{{ route('pasien.dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('pasien.daftar-konsultasi') }}">🥗 Konsultasi Gizi</a>
        <a href="{{ route('pasien.isi_piringku') }}">🍽️ Isi Piringku Cerdas</a>
        <a href="{{ route('pasien.dashboard') }}">👩 Riwayat Konsultasi</a>
        <a href="{{ route('pasien.ahli-gizi.index') }}">👩‍⚕️ Profil Ahli Gizi</a>
        <a href="{{ route('pasien.ahli-gizi.index') }}">Artikel Gizi</a>

    <form action="{{ route('pasien.logout') }}" method="POST">
        @csrf
        <button type="submit">🚪 Logout</button>
    </form>
</div>

<div class="content">
    <h2>Konsultasi Gizi</h2>

    <table>
        <thead>
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Ahli Gizi</th>
                <th style="width: 100px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ahliGizi as $index => $ahli)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $ahli->nama }}</td>
        <td>
            <form action="{{ route('pasien.konsultasi', $ahli->id) }}" method="GET">
                <button type="submit">CHAT</button>
            </form>
        </td>
    </tr>
@endforeach


        </tbody>
    </table>
</div>

</body>
</html>
