<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hasil Isi Piringku Cerdas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f9f6;
      padding: 40px 20px;
      color: #1b4332;
      margin: 0;
    }

    .container {
      max-width: 720px;
      margin: auto;
      background: #ffffff;
      border-radius: 16px;
      padding: 35px 30px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }

    h2 {
      text-align: center;
      color: #2d6a4f;
      margin-bottom: 30px;
    }

    .result {
      margin-bottom: 30px;
      background-color: #f1fdf4;
      border-left: 5px solid #2d6a4f;
      padding: 20px 25px;
      border-radius: 8px;
      transition: box-shadow 0.3s ease;
    }

    .result:hover {
      box-shadow: 0 5px 15px rgba(45, 106, 79, 0.2);
    }

    .result p {
      font-size: 1.05rem;
      margin: 8px 0;
    }

    .result h3 {
      margin-top: 0;
      color: #2d6a4f;
    }

    .btn-back {
      display: inline-block;
      text-align: center;
      padding: 12px 24px;
      background-color: #2d6a4f;
      color: white;
      border-radius: 10px;
      text-decoration: none;
      font-weight: bold;
      font-size: 1rem;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn-back:hover {
      background-color: #40916c;
      transform: scale(1.05);
    }

    @media (max-width: 600px) {
      .container {
        padding: 25px 20px;
      }

      .btn-back {
        width: 100%;
        text-align: center;
        display: block;
        margin-top: 20px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Hasil Analisis Gizi</h2>

  <div class="result">
    <p><strong>Nama:</strong> {{ $data['nama'] }}</p>
    <p><strong>IMT:</strong> {{ $imt }} kg/m²</p>
    <p><strong>Kategori IMT:</strong> {{ $kategori }}</p>
  </div>

  <div class="result">
    <h3>Kebutuhan Gizi Harian</h3>
    <p><strong>Energi:</strong> {{ $kalori }} kkal/hari</p>
    <p><strong>Protein:</strong> {{ $protein }} gram</p>
    <p><strong>Karbohidrat:</strong> {{ $karbo }} gram</p>
    <p><strong>Lemak:</strong> {{ $lemak }} gram</p>
  </div>

  <div class="result">
  <h3>Kebutuhan Energi Dasar (BMR - Mifflin-St Jeor)</h3>
  <p><strong>BMR:</strong> {{ $bmr }} kkal/hari</p>
  <p><em>Rumus Mifflin digunakan untuk menghitung kebutuhan energi dasar berdasarkan berat, tinggi, usia, dan jenis kelamin.</em></p>
</div>

  <a href="{{ route('pasien.isi_piringku') }}" class="btn-back">🔙 Kembali Isi Data</a>
</div>

</body>
</html>
