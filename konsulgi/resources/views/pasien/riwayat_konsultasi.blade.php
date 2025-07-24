<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Riwayat Konsultasi</title>
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
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 30px;
            border: 1px solid #b7e4c7;
        }

        th, td {
            padding: 12px 20px;
            border: 1px solid #b7e4c7;
            text-align: left;
        }

        th {
            background-color: #d8f3dc;
            color: #1b4332;
            font-weight: bold;
        }

        th:nth-child(1) { width: 40px; }
        th:nth-child(2) { width: 160px; }
        th:nth-child(3) { width: 100px; }
        th:nth-child(4) { width: 200px; }
        th:nth-child(5) { width: 100px; }
        th:nth-child(6) { width: 100px; }

        tr:hover {
            background-color: #f1fdf6;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            font-style: italic;
            color: #666;
        }

        .btn {
    padding: 7px 14px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: background-color 0.3s ease;
    display: inline-block;
    cursor: pointer;
    user-select: none;
}

.btn-success {
    background-color: #28a745;
    color: white;
    border: none;
}

.btn-success:hover {
    background-color: #1e7e34;
    color: white;
    text-decoration: none;
}

.text-muted {
    color: #6c757d;
    font-style: italic;
}

.modal {
    display: none;
    position: fixed;
    z-index: 999;
    inset: 0;
    background: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(2px);
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.modal-content {
    background: #fff;
    padding: 25px 30px;
    border-radius: 10px;
    max-width: 500px;
    width: 100%;
    position: relative;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    animation: slideDown 0.3s ease-out;
}

.modal-content h3 {
    margin-top: 0;
    margin-bottom: 15px;
    color: #2d6a4f;
}

.modal-content p {
    margin: 8px 0;
    font-size: 14px;
    color: #333;
}

.modal .close {
    position: absolute;
    top: 12px;
    right: 16px;
    font-size: 20px;
    font-weight: bold;
    color: #888;
    cursor: pointer;
}

.modal .close:hover {
    color: #333;
}

.aksi-wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 6px;
}

@keyframes slideDown {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
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

    .sidebar a,
    .sidebar form button {
        padding: 10px 12px;
        font-size: 0.9rem;
        margin: 5px;
        border-radius: 6px;
        background-color: rgb(60, 132, 100);
        color: white;
        transition: background-color 0.3s;
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

    table {
        font-size: 0.9rem;
        overflow-x: auto;
        display: block;
    }

    th, td {
        white-space: nowrap;
    }

    .modal-content {
        width: 95%;
        max-width: 400px;
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
    <div class="header">
        <h2>Riwayat Konsultasi</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th style="text-align: center;">Nama Ahli Gizi</th>
                <th style="text-align: center;">Tanggal</th>
                <th style="text-align: center;">Keluhan</th>
                <th style="text-align: center;">Kalkulator BMI</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Hasil</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
    @forelse ($riwayat as $konsultasi)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $konsultasi->ahliGizi->nama ?? '-' }}</td>
        <td style="text-align: center;">{{ \Carbon\Carbon::parse($konsultasi->tanggal_konsultasi)->format('d-m-Y') }}</td>
        <td>{{ $konsultasi->keluhan }}</td>
        <td style="text-align: center;">
    @php
        $gizi = json_decode($konsultasi->isi_piringku_hasil, true);
    @endphp

    @if ($gizi)
        <button onclick="bukaModal({{ $loop->iteration }})" class="btn btn-success">
    Lihat Gizi
</button>


        <!-- Modal -->
        <div id="modal-{{ $loop->iteration }}" class="modal">
    <div class="modal-content">
        <span class="close" onclick="tutupModal({{ $loop->iteration }})">&times;</span>
        <h3>Hasil Analisis Gizi</h3>
        <p><strong>IMT:</strong> {{ $gizi['imt'] }} ({{ $gizi['kategori'] }})</p>
        <p><strong>Energi:</strong> {{ $gizi['kalori'] }} kkal/hari</p>
        <p><strong>Protein:</strong> {{ $gizi['protein'] }} gram</p>
        <p><strong>Karbohidrat:</strong> {{ $gizi['karbo'] }} gram</p>
        <p><strong>Lemak:</strong> {{ $gizi['lemak'] }} gram</p>
        <p><strong>BMR:</strong> {{ $gizi['bmr'] }} kkal/hari</p>
    </div>
</div>

    @else
        <span class="text-muted">-</span>
    @endif
</td>
        <td style="text-align: center;">
            @php
                $status = strtolower($konsultasi->status);
                $warna = match($status) {
                    'selesai' => '#38b000',
                    'berlangsung' => '#f9c74f',
                    'pending' => '#adb5bd',
                    default => '#ccc'
                };
            @endphp
            <span style="background-color: {{ $warna }}; color: #fff; padding: 5px 10px; border-radius: 20px; font-size: 0.8rem;">
                {{ ucfirst($konsultasi->status) }}
            </span>
        </td>
        <td>
    {{ $konsultasi->hasil ?? '-' }}
</td>
        <td style="text-align: center;">
    <div class="aksi-wrapper">
        @if (!empty($konsultasi->ahliGizi->no_whatsapp))
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $konsultasi->ahliGizi->no_whatsapp) }}" target="_blank" class="btn btn-success">
                Chat
            </a>
        @else
            <span class="text-muted">Tidak Ada</span>
        @endif

        <a href="{{ route('pasien.export-pdf', $konsultasi->id) }}" target="_blank" class="btn btn-success">
            Lihat PDF
        </a>

        <a href="{{ route('pasien.export-pdf-download', $konsultasi->id) }}" class="btn btn-success">
            Download PDF
        </a>
    </div>
</td>

    </tr>
    @empty
    <tr>
        <td colspan="6" class="no-data">Belum ada riwayat konsultasi.</td>
    </tr>
    @endforelse
</tbody>

    </table>
</div>
<script>
    function bukaModal(id) {
        document.getElementById('modal-' + id).style.display = 'flex';
    }
    function tutupModal(id) {
        document.getElementById('modal-' + id).style.display = 'none';
    }

    // Tutup modal jika klik di luar konten
    window.onclick = function(event) {
        document.querySelectorAll('.modal').forEach(modal => {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    }
</script>

</body>
</html>
