<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Konsultasi Masuk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f9f6;
            display: flex;
            flex-direction: row;
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
            transition: all 0.3s ease;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.4rem;
            border-bottom: 1px solid #40916c;
            padding-bottom: 10px;
        }

        .sidebar a,
        .sidebar form button {
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

        .header {
            background-color: #f5f9f6;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        h3 {
            font-size: 2rem;
            font-weight: bold;
            color: #1b4332;
        }

        .notification {
            position: relative;
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            animation: fadein 0.5s;
        }

        .notification-success { background-color: #2d6a4f; }
        .notification-error { background-color: #d00000; }
        .notification-info { background-color: #40916c; }

        .notification .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            font-weight: bold;
            line-height: 1;
        }

        @keyframes fadein {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-top: 20px;
            min-width: 400px;
        }

        th, td {
            padding: 12px 18px;
            border-bottom: 1px solid #e0e0e0;
            text-align: center;
        }

        th {
            background-color: #d8f3dc;
            color: #1b4332;
        }

        tr:hover {
            background-color: #f1fdf7;
        }

        .chat-button {
            padding: 8px 14px;
            background-color: #2d6a4f;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .chat-button:hover {
            background-color: #40916c;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                padding: 15px;
            }

            .sidebar h2 {
                width: 100%;
                text-align: center;
                font-size: 1.2rem;
                margin-bottom: 10px;
                border-bottom: none;
            }

            .sidebar a,
            .sidebar form button {
                font-size: 0.9rem;
                padding: 10px 12px;
                margin: 5px;
                background-color: #3a7b61;
                border-radius: 6px;
                text-align: center;
            }

            .content {
                margin-left: 0;
                padding: 20px;
            }

            table {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .chat-button {
                font-size: 0.8rem;
                padding: 6px 10px;
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>KONSULZI</h2>
    <a href="{{ route('ahli_gizi.dashboard') }}">🏠 Dashboard Ahli Gizi</a>
    <a href="{{ route('ahli_gizi.konsultasi') }}">📋 Konsultasi Masuk</a>
    <a href="{{ route('ahli_gizi.riwayat_konsultasi') }}">📜 Riwayat Konsultasi</a>
    
    <form action="{{ route('ahli_gizi.logout') }}" method="POST">
        @csrf
        <button type="submit">🚪 Logout</button>
    </form>
</div>

<div class="content">
    <div class="header">
        <h3>Daftar Konsultasi Masuk</h3>
    </div>

    @if(session('success'))
        <div class="notification notification-success">
            {{ session('success') }}
            <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    @endif

    @if(session('error'))
        <div class="notification notification-error">
            {{ session('error') }}
            <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    @endif

    @if(session('info'))
        <div class="notification notification-info">
            {{ session('info') }}
            <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    @endif

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($konsultasiList as $index => $konsultasi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $konsultasi->pasien->nama }}</td>
                        <td>
                            <button class="chat-button" onclick="bukaWhatsapp('{{ $konsultasi->pasien->no_whatsapp }}', '{{ $konsultasi->pasien->nama }}')">Chat</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Belum ada konsultasi masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    function bukaWhatsapp(noWa, nama) {
        if (noWa.startsWith('0')) {
            noWa = '62' + noWa.substring(1);
        }
        const pesan = `Halo ${nama}, saya dari tim ahli gizi ingin menanggapi konsultasi Anda.`;
        const url = `https://wa.me/${noWa}?text=${encodeURIComponent(pesan)}`;
        window.open(url, '_blank');
    }
</script>

</body>
</html>
