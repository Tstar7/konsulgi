<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Ahli Gizi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * { box-sizing: border-box; }

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
      transition: transform 0.3s ease;
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
      transition: margin-left 0.3s ease;
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

    /* ==================== Responsive ==================== */
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

      .stats {
        flex-direction: column;
        gap: 15px;
      }

      .info-box {
        padding: 25px;
      }

      .info-box h3 {
        font-size: 1.6rem;
      }

      .info-box .jam {
        font-size: 1.3rem;
      }
    }

    @media (max-width: 480px) {
      .info-box h3 {
        font-size: 1.4rem;
      }

      .info-box p {
        font-size: 0.95rem;
      }

      .info-box .jam {
        font-size: 1.1rem;
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
      <h2>Selamat Datang, {{ Auth::guard('ahli_gizi')->user()->username }}!</h2>
    </div>

    <div class="stats">
      <div class="stat-box">
        <h3>Jumlah Konsultasi Masuk</h3>
        <p>{{ $jumlahKonsultasi }}</p>
      </div>
    </div>
  </div>

</body>
</html>
