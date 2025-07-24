<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Ahli Gizi - Riwayat Konsultasi</title>
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

        .sidebar a:hover, .sidebar form button:hover {
            background-color: rgb(40, 167, 69);
        }

        .content {
            margin-left: 250px;
            padding: 30px;
            flex: 1;
        }

        .content h2 {
            color: #2d6a4f;
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 1.8rem;
        }

        .notification {
            padding: 15px;
            border-radius: 8px;
            color: white;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .notification-success { background: #2d6a4f; }
        .notification-error { background: #d00000; }
        .notification-info { background: #40916c; }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-top: 20px;
            min-width: 700px;
        }

        th, td {
            padding: 10px 15px;
            border-bottom: 1px solid #e0e0e0;
            text-align: center;
        }

        th {
            background-color: #d8f3dc;
            color: #1b4332;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            border: none;
            cursor: pointer;
        }

        .btn-success { background-color: #28a745; color: white; }
        .btn-primary { background-color: #007bff; color: white; }

        .action-container {
            display: flex;
            gap: 6px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Modal */
        #modalHasil {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }

        #modalHasil > div {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body { flex-direction: column; }

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

            .sidebar a, .sidebar form button {
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
                font-size: 0.85rem;
                min-width: 600px;
            }

            .btn {
                padding: 6px 10px;
                font-size: 0.8rem;
            }

            .action-container {
                flex-direction: column;
                gap: 5px;
            }
        }
        .aksi-buttons {
    display: flex;
    justify-content: flex-start;
    gap: 10px;
    margin-top: 30px;
}

.aksi-buttons a {
    display: inline-block;
    padding: 8px 14px;
    background-color: #2d6a4f;
    color: white;
    text-decoration: none;
    font-size: 13px;
    border-radius: 5px;
    font-weight: bold;
}

.aksi-buttons a:hover {
    background-color: #1b4332;
}

td.hasil {
    max-width: 250px;
    word-wrap: break-word;
    white-space: normal;
}

td.keluhan {
    max-width: 250px;
    word-wrap: break-word;
    white-space: normal;
}

.table-container {
    overflow-x: auto;
    width: 100%;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    margin-top: 20px;
    min-width: 700px; /* penting agar scroll muncul */
}

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
        padding: 20px 15px;
    }

    table {
        font-size: 0.85rem;
        min-width: 600px;
    }

    .btn {
        padding: 6px 10px;
        font-size: 0.8rem;
    }

    .action-container {
        flex-direction: column;
        gap: 5px;
        align-items: center;
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
    @if(session('success'))
    <div class="notification notification-success">{{ session('success') }}</div>
    @endif

    <h2>Riwayat Konsultasi</h2>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal</th>
                    <th>Keluhan</th>
                    <th>Kalkulator BMI</th>
                    <th>Status</th>
                    <th>Hasil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($riwayat as $konsultasi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $konsultasi->pasien->nama }}</td>
                    <td>{{ $konsultasi->tanggal_konsultasi }}</td>
                    <td class="keluhan">{{ $konsultasi->keluhan }}</td>
                    @php
    $gizi = json_decode($konsultasi->isi_piringku_hasil, true);
@endphp
<td>
    @if ($gizi)
        <button onclick="bukaModalGizi({{ $konsultasi->id }})" class="btn btn-success">Lihat Gizi</button>
    @else
        <span class="text-muted">-</span>
    @endif
</td>

                    <td>
                        <form action="{{ route('ahli_gizi.update_status', $konsultasi->id) }}" method="POST">
                            @csrf @method('PUT')
                            <select name="status" onchange="this.form.submit()">
                                <option value="pending" {{ $konsultasi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="berlangsung" {{ $konsultasi->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                                <option value="selesai" {{ $konsultasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </td>
                    <td class="hasil">
                        @if($konsultasi->hasil)
                            {{ $konsultasi->hasil }}
                        @else
                            <em>Belum diisi</em>
                        @endif
                    </td>
                    <td>
                        <div class="action-container">
                            @if (!empty($konsultasi->pasien->no_whatsapp))
                            @php
                                $wa = preg_replace('/[^0-9]/', '', $konsultasi->pasien->no_whatsapp);
                                $pesan = urlencode("Halo, saya ingin melanjutkan konsultasi gizi via KONSULZI.");
                            @endphp
                            <a href="https://wa.me/{{ $wa }}?text={{ $pesan }}" target="_blank" class="btn btn-success">Chat</a>
                            @else
                            <span style="color: gray; font-style: italic;">Tidak Ada WA</span>
                            @endif

                            <button class="btn btn-primary" onclick="bukaModal({{ $konsultasi->id }}, '{{ $konsultasi->pasien->nama }}', '{{ $konsultasi->tanggal_konsultasi }}')">Input Hasil</button>

                            @if ($konsultasi->isi_piringku_hasil)
                            <a href="{{ route('ahli_gizi.lihat_pdf', $konsultasi->id) }}" target="_blank" class="btn btn-success">Lihat PDF</a>
                            <a href="{{ route('ahli_gizi.download_pdf', $konsultasi->id) }}" class="btn btn-primary">Download PDF</a>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; font-style: italic;">Belum ada riwayat konsultasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @foreach ($riwayat as $konsultasi)
    @php
        $gizi = json_decode($konsultasi->isi_piringku_hasil, true);
    @endphp
    @if ($gizi)
    <div id="modal-gizi-{{ $konsultasi->id }}" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 9999;">
        <div style="background: white; padding: 20px; border-radius: 10px; width: 90%; max-width: 450px;">
            <span class="close" onclick="tutupModalGizi({{ $konsultasi->id }})" style="float: right; font-size: 20px; cursor: pointer;">&times;</span>
            <h3>Hasil Analisis Gizi</h3>
            <p><strong>IMT:</strong> {{ $gizi['imt'] }} ({{ $gizi['kategori'] }})</p>
            <p><strong>Energi:</strong> {{ $gizi['kalori'] }} kkal/hari</p>
            <p><strong>Protein:</strong> {{ $gizi['protein'] }} gram</p>
            <p><strong>Karbohidrat:</strong> {{ $gizi['karbo'] }} gram</p>
            <p><strong>Lemak:</strong> {{ $gizi['lemak'] }} gram</p>
            <p><strong>BMR:</strong> {{ $gizi['bmr'] }} kkal/hari</p>
        </div>
    </div>
    @endif
@endforeach

    </div>
</div>

<!-- Modal Input Hasil -->
<div id="modalHasil">
    <div>
        <form method="POST" action="{{ route('ahli_gizi.simpan_hasil') }}">
            @csrf
            <input type="hidden" name="konsultasi_id" id="inputKonsultasiId">
            <h3 id="modalTitle">Input Hasil Konsultasi</h3>
            <p id="modalInfoPasien"></p>
            <textarea name="hasil" rows="5" required placeholder="Masukkan hasil konsultasi..." style="width:100%; padding:10px; border-radius:5px; border:1px solid #ccc;"></textarea>
            <br><br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-success" onclick="tutupModal()">Batal</button>
        </form>
    </div>
</div>

<script>
    
    function bukaModal(id, nama, tanggal) {
        document.getElementById('modalHasil').style.display = 'flex';
        document.getElementById('inputKonsultasiId').value = id;
        document.getElementById('modalInfoPasien').innerText = `Pasien: ${nama} | Tanggal: ${tanggal}`;
    }

    function tutupModal() {
        document.getElementById('modalHasil').style.display = 'none';
    }

    function bukaModalGizi(id) {
        const modal = document.getElementById('modal-gizi-' + id);
        if (modal) modal.style.display = 'flex';
    }

    function tutupModalGizi(id) {
        const modal = document.getElementById('modal-gizi-' + id);
        if (modal) modal.style.display = 'none';
    }

    // Tutup modal jika klik di luar konten
    window.addEventListener('click', function (event) {
        document.querySelectorAll('.modal').forEach(modal => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
