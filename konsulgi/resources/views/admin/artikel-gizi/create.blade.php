<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Tambah Artikel Gizi</title>
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

        h3 {
            font-size: 2rem;
            font-weight: bold;
            color: #1b4332;
            margin-bottom: 30px;
        }

        label { font-weight: bold; color: #2d6a4f; }
        input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
        }
        button[type="submit"] {
            background-color: #2d6a4f;
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s ease;
        }
        button[type="submit"]:hover {
            background-color: #40916c;
            transform: translateY(-2px);
        }
        @media (max-width: 768px) {
            .sidebar { width: 100%; height: auto; position: relative; }
            .content { margin-left: 0; padding: 20px; }
            form { padding: 20px; }
        }

        <style>
    .form-control {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 1rem;
    }

    .kategori-group {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 8px;
    }

    .kategori-btn {
        padding: 10px 20px;
        border: 2px solid #2d6a4f;
        border-radius: 8px;
        background-color: white;
        color: #2d6a4f;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .kategori-btn:hover {
        background-color: #2d6a4f;
        color: white;
    }

    .active-kategori {
        background-color: #2d6a4f !important;
        color: white !important;
    }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>KONSULZI</h2>
    <a href="{{ route('admin.dashboard') }}">🏠 Dashboard Admin</a>
    <a href="{{ route('admin.pasien.index') }}">👥 Manajemen Pasien</a>
    <a href="{{ route('admin.ahli-gizi.index') }}">👩‍⚕️ Manajemen Ahli Gizi</a>
    <a href="{{ route('admin.manajemen-konsultasi') }}">👥 Manajemen Konsultasi</a>
    <a href="{{ route('admin.artikel-gizi.index') }}">📄 Artikel Gizi</a>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">🚪 Logout</button>
    </form>
</div>

<div class="content">
    <h3>Tambah Artikel Gizi</h3>

    <form action="{{ route('admin.artikel-gizi.store') }}" method="POST">
        @csrf

        <label for="judul">Judul Artikel</label>
        <input type="text" id="judul" name="judul" required>

        <label for="tanggal">Tanggal Publikasi</label>
        <input type="date" id="tanggal" name="tanggal" required>

        <label for="edit-kategori">Kategori:</label><br>
<select id="edit-kategori" name="kategori" style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 20px;">
    <option value="">-- Pilih Kategori --</option>
    <option value="Tips Gizi">Tips Gizi</option>
    <option value="Resep Sehat">Resep Sehat</option>
    <option value="Berita Gizi">Berita Gizi</option>
    <option value="Lainnya">Lainnya</option>
</select><br>


        <label for="isi">Isi Artikel</label>
        <textarea id="isi" name="isi" rows="10" required></textarea>

        <button type="submit">💾 Simpan Artikel</button>
    </form>
</div>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('isi', {
        height: 300
    });

    function setKategori(value) {
        document.getElementById('kategori').value = value;
        document.querySelectorAll('.kategori-btn').forEach(btn => {
            btn.classList.remove('active-kategori');
        });
        const selectedBtn = [...document.querySelectorAll('.kategori-btn')]
            .find(btn => btn.textContent === value);
        selectedBtn?.classList.add('active-kategori');
    }
</script>

</body>
</html>
