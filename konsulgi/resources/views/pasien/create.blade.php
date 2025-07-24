<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f9f6;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color:rgb(45, 106, 79);
            color: white;
            display: flex;
            flex-direction: column;
            padding-top: 30px;
            position: fixed;
            height: 100vh;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.4rem;
            border-bottom: 1px solid #40916c;
            padding-bottom: 10px;
        }

        .sidebar a, .sidebar form button {
            padding: 15px 30px;
            text-align: left;
            font-size: 1rem;
            color: white;
            text-decoration: none;
            background: none;
            border: none;
            width: 100%;
            cursor: pointer;
            transition: background 0.3s;
        }

        .sidebar a:hover,
        .sidebar form button:hover {
            background-color:rgb(40, 167, 69);
        }

        .content {
            margin-left: 250px;
            padding: 30px;
            flex: 1;
        }

        .header {
            background-color: #d8f3dc;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .header h2 {
            margin: 0;
            color: #1b4332;
        }

        .section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .section:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .section h3 {
            margin-top: 0;
            color: #2d6a4f;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>KONSULZI</h2>
        <a href="{{ route('pasien.dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('pasien.konsultasi') }}">🥗 Konsultasi Gizi</a>
        <a href="{{ route('pasien.ahli') }}">👩‍⚕️ Profil Ahli Gizi</a>

        <form action="{{ route('logout') }}" method="GET">
            <button type="submit">🚪 Logout</button>
        </form>
    </div>

    <div class="container">
    <h2>Tambah Profil Ahli Gizi</h2>

    <form action="{{ route('pasien.ahli-gizi.store') }}" method="POST">
        @csrf

        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Spesialisasi:</label>
        <input type="text" name="spesialisasi" required>

        <label>Pengalaman (tahun):</label>
        <input type="number" name="pengalaman" min="0" required>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('pasien.ahli-gizi.index') }}">← Kembali</a>
</div>