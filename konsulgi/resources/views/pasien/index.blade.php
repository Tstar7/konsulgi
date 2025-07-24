<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f9f6;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: rgb(45, 106, 79);
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
            background-color: rgb(40, 167, 69);
        }

        .content {
            margin-left: 250px;
            padding: 30px;
            flex: 1;
        }

        h3 {
            font-size: 2rem;
            font-weight: bold;
            color: #1b4332;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-top: 40px;
        }

        th, td {
            padding: 12px 20px;
            border-bottom: 1px solid #e0e0e0;
            text-align: left;
        }

        th {
            background-color: #d8f3dc;
            color: #1b4332;
        }

        tr:hover {
            background-color: #f1fdf7;
        }

        td.center {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>KONSULZI</h2>
    <a href="{{ route('pasien.dashboard') }}">🏠 Dashboard</a>
    <a href="{{ route('pasien.konsultasi') }}">🥗 Konsultasi Gizi</a>
    <a href="{{ route('pasien.ahli-gizi.index') }}">👩‍⚕️ Profil Ahli Gizi</a>
    <form action="{{ route('pasien.logout') }}" method="POST">
        @csrf
        <button type="submit">🚪 Logout</button>
    </form>
</div>

<div class="content">
    <h3>Daftar Profil Ahli Gizi</h3>

    <table>
        <thead>
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ahliGizi as $index => $ahli)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ahli->nama }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="center">Belum ada data ahli gizi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
