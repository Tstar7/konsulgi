<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { box-sizing: border-box; }

```
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

    .stats {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-box {
        flex: 1;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        text-align: center;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .stat-box:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .stat-box h3 {
        margin: 0;
        font-size: 1.2rem;
        color: #2d6a4f;
    }

    .stat-box p {
        font-size: 2rem;
        font-weight: bold;
        margin: 10px 0 0;
        color: #40916c;
    }

    .info-box {
        width: 95%;
        max-width: 900px;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        text-align: center;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .info-box h3 {
        font-size: 2rem;
        font-weight: bold;
        color: #1b4332;
        margin-bottom: 40px;
    }

    .info-box p {
        font-size: 1.1rem;
        color: #333;
        margin: 8px 0;
    }

    .info-box .jam {
        margin-top: 40px;
        font-weight: bold;
        font-size: 1.5rem;
        color: #2d6a4f;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .info-box { padding: 30px; }
        .info-box h3 { font-size: 1.6rem; }
        .info-box .jam { font-size: 1.3rem; }
    }

    @media (max-width: 480px) {
        .info-box h3 { font-size: 1.4rem; }
        .info-box p { font-size: 1rem; }
        .info-box .jam { font-size: 1.1rem; }
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

    th {
        padding: 12px 50px;
        text-align: center;
        border-bottom: 1px solid #e0e0e0;
    }

    td {
        padding: 12px 20px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    th {
        background-color: #d8f3dc;
        color: #1b4332;
    }

    tr:hover {
        background-color: #f1fdf7;
    }

    h3 {
    font-size: 2rem;
    font-weight: bold;
    color: #1b4332;
    }

    .btn-tambah-pasien {
background-color: #2d6a4f;
color: white;
padding: 12px 24px;
border-radius: 10px;
font-weight: bold;
text-decoration: none;
font-size: 1rem;
box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
transition: all 0.3s ease;
display: inline-block;
```

}

.btn-tambah-pasien\:hover {
background-color: #40916c;
transform: translateY(-2px);
box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
}

```
</style>
```

</head>
<body>

<div class="sidebar">
<div class="sidebar">
    <h2>KONSULZI</h2>
    <a href="{{ route('admin.dashboard') }}">🏠 Dashboard Admin</a>
    <a href="{{ route('admin.pasien.index') }}">👥 Manajemen Pasien</a>
    <a href="{{ route('admin.ahli-gizi.index') }}">👩‍⚕️ Manajemen Ahli Gizi</a>
    <a href="{{ route('admin.manajemen-konsultasi') }}">💬 Manajemen Konsultasi</a>
    <a href="{{ route('admin.artikel-gizi.index') }}">📄 Artikel Gizi</a>
    
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">🚪 Logout</button>
    </form>
</div>

<div class="container mt-4">
    <h2>Tambah Ahli Gizi</h2>

```
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.ahli-gizi.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama:</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.ahli-gizi.index') }}" class="btn btn-secondary">Kembali</a>
</form>
```

</div>
