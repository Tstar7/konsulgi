<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Pasien - Artikel Gizi</title>
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
      flex-direction: row;
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
      overflow-y: auto;
    }

    h1 {
      color: #1b4332;
      margin-bottom: 30px;
      font-weight: 700;
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
      font-size: 1.5rem;
      margin-bottom: 5px;
    }

    .section small {
      color: #40916c;
      font-style: italic;
      margin-bottom: 15px;
      display: block;
    }

    .section p {
      color: #2d6a4f;
      font-size: 1rem;
      line-height: 1.6;
      white-space: pre-wrap;
    }

    /* Responsive */
    @media (max-width: 768px) {
      body {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        padding: 10px 15px;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 8px;
      }

      .sidebar h2 {
        width: 100%;
        text-align: center;
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
        text-align: center;
      }

      .sidebar a:hover,
      .sidebar form button:hover {
        background-color: rgb(40, 167, 69);
      }

      .content {
        margin-left: 0;
        padding: 20px 15px;
      }

      .section h3 {
        font-size: 1.2rem;
      }

      .section p {
        font-size: 0.95rem;
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
    <h1>📚 Artikel Gizi</h1>

    @forelse($artikel as $item)
      <div class="section">
        <h3>{{ $item->judul }}</h3>
        <small>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }} | Kategori: {{ $item->kategori }}</small>
        <p>{!! nl2br(e($item->konten)) !!}</p>
      </div>
    @empty
      <p style="text-align:center; color: #6c757d;">Belum ada artikel gizi yang tersedia.</p>
    @endforelse
  </div>

</body>
</html>
