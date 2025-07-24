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

    .header h2 {
        font-size: 1.2rem;
    }

    .section {
        padding: 15px;
    }

    .section h3 {
        font-size: 1rem;
    }

    iframe {
        height: 250px !important;
    }
}

    </style>
</head>
<body>

    <div class="sidebar">
        <h2>KONSULZI</h2>
        <a href="{{ route('pasien.dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('pasien.daftar-konsultasi') }}">🥗 Konsultasi Gizi</a>
        <a href="{{ route('pasien.isi_piringku') }}">🍽️ Isi Piringku Cerdas</a>
        <a href="{{ route('pasien.riwayat_konsultasi') }}">👩 Riwayat Konsultasi</a>
        <a href="{{ route('pasien.artikel-gizi') }}">📄 Artikel Gizi</a>
        <form action="{{ route('pasien.logout') }}" method="POST">
        @csrf
        <button type="submit">🚪 Logout</button>
    </form>
    </div>

    <div class="content">
        <div class="header">
            <h2>Selamat Datang, {{ $pasien->nama }} !</h2>
            <p>No. Rekam Medik: {{ $pasien->no_rekam_medis }}</p>
        </div>

        <div class="section">
            <h3>Informasi Umum</h3>
            <h4>Layanan Konseling Gizi Online yang membantu Anda mendapatkan saran dan panduan gizi langsung dari ahli gizi RSUP.</h4>
            <p>Silakan pilih menu di samping untuk memulai konsultasi gizi, melihat riwayat, atau melihat profil ahli gizi Anda.</p>
            <p><strong>Alamat:</strong> Jl. Jend. Sudirman KM. 3,5, Sekip Jaya, Kemuning, Kota Palembang, Sumatera Selatan.</p>
            <p><strong>Jam Buka:</strong> 09.00 - 16.00 WIB</p>
        </div>

        <div class="section">
            <h3>Lokasi RSUP di Google Maps</h3>
            <div style="overflow:hidden; padding-top:56.25%; position:relative; height:0;">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31822.092764396437!2d104.7364029!3d-2.9746889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b75867d3c3067%3A0xb31f4db2624b72cb!2sRSUP%20Dr.%20Mohammad%20Hoesin!5e0!3m2!1sid!2sid!4v1715653855083!5m2!1sid!2sid" 
                    width="100%" 
                    height="100%" 
                    style="border:0; position:absolute; top:0; left:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

</body>
</html>
