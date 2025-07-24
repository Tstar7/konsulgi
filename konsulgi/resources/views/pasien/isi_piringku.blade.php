<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <title>Isi Piringku Cerdas - Dashboard Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0fdf4;
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

        .form-container {
            max-width: 900px;
            margin: auto;
            background: #d8f3dc;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .sidebar h2 {
            text-align: center;
            color:rgb(255, 255, 255);
        }

        h2 {
            text-align: center;
            color: #1b4332;
        }

        h3 {
            margin-top: 20px;
            color: #1b4332;
        }

        form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        label {
            display: flex;
            flex-direction: column;
            font-weight: bold;
            color: #2d6a4f;
        }

        input[type="text"],
        input[type="number"],
        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input:focus,
        select:focus {
            border-color: #52b788;
            outline: none;
        }

        button[type="submit"] {
            grid-column: 1 / -1;
            padding: 12px;
            background-color: #2d6a4f;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #40916c;
        }

        .error {
            grid-column: 1 / -1;
            background: #ffe5e5;
            color: #c1121f;
            border: 1px solid #c1121f;
            padding: 10px;
            border-radius: 6px;
        }

        /* Modal Overlay */
/* Modal background */
.modal {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.4);
  justify-content: center;
  align-items: center;
  backdrop-filter: blur(4px);
  padding: 20px;
}

.modal-content {
  background: linear-gradient(to bottom right, #f8fbff, #eef3f9);
  padding: 25px 20px;
  width: 360px;
  border-radius: 16px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  animation: fadeInScale 0.4s ease;
  position: relative;
  font-family: 'Segoe UI', 'Poppins', sans-serif;
  color: #2c3e50;
  text-align: left;
}

.close {
  position: absolute;
  top: 14px;
  right: 18px;
  font-size: 20px;
  font-weight: bold;
  color: #999;
  cursor: pointer;
  transition: color 0.2s ease;
}

.close:hover {
  color: #000;
}

.modal-content h2 {
  margin-top: 0;
  font-size: 22px;
  margin-bottom: 10px;
  color: #0077b6;
  border-bottom: 2px solid #90e0ef;
  padding-bottom: 5px;
}

.modal-content h3 {
  margin-top: 15px;
  font-size: 16px;
  color: #0096c7;
  margin-bottom: 6px;
}

.modal-content p {
  font-size: 13px;
  line-height: 1.5;
  color: #444;
  margin: 4px 0;
}

.result {
  background-color: #ffffffcc;
  padding: 10px 14px;
  border-radius: 10px;
  margin-bottom: 10px;
  box-shadow: 0 2px 8px rgba(0, 123, 255, 0.05);
}

@keyframes fadeInScale {
  from {
    opacity: 0;
    transform: scale(0.8);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

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
        padding-bottom: 0;
        border-bottom: none;
    }

    .sidebar a, .sidebar form button {
        padding: 10px 12px;
        font-size: 0.9rem;
        margin: 5px;
        border-radius: 6px;
        background-color: rgb(60, 132, 100);
        color: white;
        transition: background-color 0.3s;
        text-align: center;
    }

    .sidebar a:hover, .sidebar form button:hover {
        background-color: rgb(40, 167, 69);
    }

    .content {
        margin-left: 0;
        padding: 20px 15px;
    }

    .form-container {
        padding: 20px 15px;
        border-radius: 10px;
    }

    .modal-content {
        width: 95%;
        max-width: 400px;
        border-radius: 12px;
        padding: 20px 18px;
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
    <div class="form-container">
        <h2>Isi Piringku Cerdas</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pasien.isi_piringku.proses') }}" method="POST">
          <input type="hidden" name="konsultasi_id" value="{{ $konsultasi_id }}">

            @csrf

            <label>Nama:
                <input type="text" name="nama" value="{{ old('nama') }}" required>
            </label>

            <label>Umur:
                <input type="number" name="umur" value="{{ old('umur') }}">
            </label>

            <label>Jenis Kelamin:
                <select name="jenis_kelamin">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </label>

            <label>Penyakit:
                <select name="penyakit">
                    <option value="">-- Tidak Ada --</option>
                    <option value="diabetes">Diabetes</option>
                    <option value="stroke">Stroke</option>
                    <option value="jantung">Jantung</option>
                    <option value="kanker">Kanker</option>
                    <option value="hipertensi">Hipertensi</option>
                    <option value="ggtd">Gagal Ginjal Tanpa Dialisa</option>
                    <option value="ggdh">Gagal Ginjal dengan Hemodialisa</option>
                    <option value="ggcapd">Gagal Ginjal dengan CAPD</option>
                </select>
            </label>

            <label>Aktifitas:
                <select name="aktivitas" required>
                    <option value="">-- Pilih Aktivitas --</option>
                    <option value="jalan">Bisa Jalan</option>
                    <option value="bedrest">Istirahat / Bedrest</option>
                    <option value="sedang">Bedrest, tapi bisa bergerak terbatas</option>
                </select>
            </label>

            <label>Faktor Stress:
                <select name="faktor_stress" required>
                    <option value="tidak_ada">-- Tidak Ada --</option>
                    <option value="operasi">Operasi</option>
                    <option value="trauma">Trauma</option>
                    <option value="infeksi_berat">Infeksi Berat</option>
                    <option value="inflamasi_saluran_cerna">Peradangan saluran cerna</option>
                    <option value="patah_tulang">Patah Tulang</option>
                    <option value="infeksi_trauma">Infeksi + Trauma</option>
                    <option value="sepsis">Sepsis</option>
                    <option value="cedera_kepala">Cedera Kepala</option>
                    <option value="luka_bakar_ringan">Luka Bakar 0-20%</option>
                    <option value="luka_bakar_sedang">Luka Bakar 20-40%</option>
                    <option value="luka_bakar_berat">Luka Bakar 40-100%</option>
                </select>
            </label>

            <label>Berat Badan (kg):
                <input type="number" step="0.1" name="berat" value="{{ old('berat') }}" required>
            </label>

            <label>Tinggi Badan (cm):
                <input type="number" step="0.1" name="tinggi" value="{{ old('tinggi') }}" required>
            </label>

            <button type="submit">Hitung</button>
        </form>

        @if(session('hasil'))
<div id="hasilModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h2>Hasil Analisis Gizi</h2>

    <div class="result">
      <p><strong>Nama:</strong> {{ session('hasil')['nama'] }}</p>
      <p><strong>IMT:</strong> {{ session('hasil')['imt'] }} kg/m²</p>
      <p><strong>Kategori IMT:</strong> {{ session('hasil')['kategori'] }}</p>
    </div>

    <div class="result">
      <h3>Kebutuhan Gizi Harian</h3>
      <p><strong>Energi:</strong> {{ session('hasil')['kalori'] }} kkal/hari</p>
      <p><strong>Protein:</strong> {{ session('hasil')['protein'] }} gram</p>
      <p><strong>Karbohidrat:</strong> {{ session('hasil')['karbo'] }} gram</p>
      <p><strong>Lemak:</strong> {{ session('hasil')['lemak'] }} gram</p>
    </div>

    <div class="result">
      <h3>Kebutuhan Energi Dasar (BMR - Mifflin-St Jeor)</h3>
      <p><strong>BMR:</strong> {{ session('hasil')['bmr'] }} kkal/hari</p>
      <p><em>Rumus Mifflin digunakan untuk menghitung kebutuhan energi dasar berdasarkan berat, tinggi, usia, dan jenis kelamin.</em></p>
    </div>
  </div>
</div>

  </button>
</div>
@endif

    </div>

</div>


<script>

  function closeModal() {
    document.getElementById("hasilModal").style.display = "none";
  }

  window.onload = function () {
    var modal = document.getElementById("hasilModal");
    if (modal) {
      modal.style.display = "flex"; // agar muncul dengan flex (tengah)
    }
  }

  // Klik luar modal = tutup
  window.onclick = function (event) {
    var modal = document.getElementById("hasilModal");
    if (event.target === modal) {
      modal.style.display = "none";
    }
  }
</script>



</body>
</html>
