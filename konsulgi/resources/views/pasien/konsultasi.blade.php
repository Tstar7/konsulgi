<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Konsultasi Gizi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0fdf4;
            display: flex;
            height: 100vh;
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

        .sidebar a,
        .sidebar form button {
            font-size: 1rem;
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
            background-color: #d8f3dc;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header h2 {
            margin: 0;
            color: #1b4332;
        }

        table {
            width: max-content;
            min-width: 60%;
            margin-top: 10px;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 30px;
            border: 1px solid #b7e4c7;
        }

        th,
        td {
            padding: 12px 20px;
            border: 1px solid #b7e4c7;
            text-align: left;
        }

        th {
            background-color: #d8f3dc;
            color: #1b4332;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1fdf6;
        }

    .btn-daftar {
        background-color: #40916c;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        margin-bottom: 20px;
        transition: background 0.3s;
    }

    .btn-daftar:hover {
        background-color: #2d6a4f;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        width: 400px;
        position: relative;
    }

    .close {
        color: #aaa;
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .modal-content label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    .modal-content input,
    .modal-content select,
    .modal-content textarea {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .modal-content button[type="submit"] {
        margin-top: 15px;
        background-color: #52b788;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }
    @media (max-width: 768px) {
    body {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 15px 10px;
        text-align: center;
    }

    .sidebar h2 {
        width: 100%;
        font-size: 1.2rem;
        margin-bottom: 10px;
        border-bottom: none;
        padding-bottom: 0;
    }

    .sidebar a,
    .sidebar form button {
        padding: 10px 12px;
        font-size: 0.9rem;
        margin: 5px;
        border-radius: 6px;
        background-color: rgb(60, 132, 100);
        color: white;
        transition: background-color 0.3s;
    }

    .sidebar a:hover,
    .sidebar form button:hover {
        background-color: rgb(40, 167, 69);
    }

    .content {
        margin-left: 0;
        padding: 20px 15px;
    }

    .modal-content {
        width: 90%;
        max-width: 400px;
        margin-top: 30%;
    }

    table {
        width: 100%;
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <div class="sidebar">
        <h2>KONSULZI</h2>
        <a href="{{ route('pasien.dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('pasien.konsultasi') }}">🥗 Konsultasi Gizi</a>
        <a href="{{ route('pasien.isi_piringku') }}">🍽️ Isi Piringku Cerdas</a>
        <a href="{{ route('pasien.riwayat_konsultasi') }}">👩 Riwayat Konsultasi</a>
        <a href="{{ route('pasien.artikel-gizi') }}">📄 Artikel Gizi</a>
        <form action="{{ route('pasien.logout') }}" method="POST">
            @csrf
            <button type="submit">🚪 Logout</button>
        </form>
    </div>

    <div class="content">
        <h2>Konsultasi Gizi</h2>

        @if(session('success'))
            <div style="background-color:#d4edda; color:#155724; padding:10px; margin-bottom:15px; border-radius:5px;">
                {{ session('success') }}
            </div>
        @endif

        <button class="btn-daftar" onclick="document.getElementById('modalKonsultasi').style.display='block'">
    + Daftar Konsultasi
</button>


        <table>
            <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Ahli Gizi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ahliGizi as $index => $ahli)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ahli->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="modalKonsultasi" class="modal">
    <div class="modal-content">
        <span class="close" onclick="document.getElementById('modalKonsultasi').style.display='none'">&times;</span>
        <h3>Form Pendaftaran Konsultasi</h3>
        <form action="{{ route('pasien.konsultasi.store') }}" method="POST">
            @csrf
            <label for="ahli_gizi_id">Pilih Ahli Gizi:</label>
            <select name="ahli_gizi_id" required>
    <option value="">-- Pilih Ahli Gizi --</option>
    @foreach ($ahliGizi as $ahli)
        <option value="{{ $ahli->id }}">{{ $ahli->nama }}</option>
    @endforeach
</select>



            <label for="tanggal">Tanggal Konsultasi:</label>
            <input type="date" name="tanggal" id="tanggal" required>

            <label for="keluhan">Keluhan:</label>
            <textarea name="keluhan" id="keluhan" rows="4" required></textarea>

            <button type="submit">Kirim Pendaftaran</button>
        </form>
    </div>
</div>

    </div>

    @if ($errors->any())
    <div style="background-color:#f8d7da; padding:10px; border-radius:5px; color:#721c24;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <script>
    window.onclick = function(event) {
        var modal = document.getElementById('modalKonsultasi');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>
