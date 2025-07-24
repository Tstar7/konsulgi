<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
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
            padding: 8px 12px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }

        td {
            padding: 8px 12px;
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
}

.btn-tambah-pasien:hover {
    background-color: #40916c;
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
}

.btn-aksi {
    padding: 6px 12px;
    font-size: 0.8rem;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-right: 8px;
    text-decoration: none;
    display: inline-block;
}

.btn-edit {
    background-color: #2d6a4f;
    color: white;
}

.btn-edit:hover {
    background-color: #40916c;
    transform: translateY(-1px);
}

.btn-hapus {
    background-color:rgb(189, 24, 24);
    color: white;
}

.btn-hapus:hover {
    background-color: #a00000;
    transform: translateY(-1px);
}

.modal-konfirmasi {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: white;
    padding: 30px;
    border-radius: 12px;
    text-align: center;
    max-width: 400px;
    width: 90%;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    animation: fadeIn 0.3s ease-in-out;
}

.modal-content p {
    font-size: 1.1rem;
    margin-bottom: 20px;
    color: #333;
}

.modal-content .btn-aksi {
    margin: 5px 10px;
}

@keyframes fadeIn {
    from { transform: scale(0.95); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    list-style-type: none;
    padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination li a, .pagination li span {
    display: block;
    padding: 8px 12px;
    background-color: #2d6a4f;
    color: white;
    border-radius: 6px;
    text-decoration: none;
}

.pagination li a:hover {
    background-color: #40916c;
}

.pagination .active span {
    background-color: #52b788;
    font-weight: bold;
}

@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        padding: 15px;
        z-index: 10;
    }

    .sidebar h2 {
        width: 100%;
        font-size: 1.2rem;
        margin-bottom: 10px;
    }

    .sidebar a, .sidebar form button {
        font-size: 0.85rem;
        padding: 8px 10px;
        margin: 4px;
        border-radius: 6px;
        background-color: #3a7b61;
        width: auto;
    }

    .content {
        margin-left: 0;
        padding: 20px;
    }

    .stats {
        flex-direction: column;
        gap: 15px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    table {
        width: 100%;
        min-width: 600px;
    }

    .btn-tambah-pasien {
        padding: 10px 16px;
        font-size: 0.9rem;
    }

    .modal-content {
        width: 95%;
        padding: 20px;
    }

    .btn-aksi {
        font-size: 0.75rem;
        padding: 6px 10px;
    }
}

@media (max-width: 480px) {
    .sidebar h2 {
        font-size: 1rem;
    }

    .info-box h3 {
        font-size: 1.3rem;
    }

    .info-box p {
        font-size: 1rem;
    }

    .info-box .jam {
        font-size: 1rem;
    }

    .btn-tambah-pasien {
        font-size: 0.85rem;
    }

    .btn-aksi {
        font-size: 0.7rem;
    }
}

    </style>
</head>
<body>

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

<div class="content">
    <h3> Daftar Pasien</h3>

    <div style="margin: 20px 0;">
        <a href="javascript:void(0);" class="btn-tambah-pasien" onclick="openTambahModal()">➕ Tambah Pasien</a>
    </div>

    @if (session('success'))
    <div style="background-color: #d4edda; padding: 10px; border-radius: 8px; color: #155724; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.pasien.index') }}" method="GET" style="margin: 10px 0; display: flex; justify-content: flex-end;">
    <input type="text" name="search" placeholder="Cari nama atau no rekam medis" value="{{ request('search') }}"
           style="padding: 8px 12px; border-radius: 8px; border: 1px solid #ccc; width: 250px;">
    <button type="submit"
            style="padding: 8px 16px; background-color: #2d6a4f; color: white; border: none; border-radius: 8px; margin-left: 8px; cursor: pointer;">
        🔍 Cari
    </button>
</form>
    
    <div class="table-responsive">
    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>No Rekam Medis</th>
            <th>Tanggal Lahir</th>
            <th>No WhatsApp</th>
            <th>Jumlah Konsultasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        @if($pasien->isEmpty())
<tr>
    <td colspan="7" style="text-align: center; color: #888; padding: 20px;">Tidak ada pasien ditemukan.</td>
</tr>
@endif

    @foreach ($pasien as $index => $p)
        <tr>
            <td>{{ ($pasien->currentPage() - 1) * $pasien->perPage() + $loop->iteration }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->no_rekam_medis }}</td>
            <td>{{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d-m-Y') }}</td>
            <td>{{ $p->no_whatsapp }}</td>
            <td>{{ $p->konsultasi_count  }}</td>
            <td>
                
    <!-- Tombol trigger modal edit -->
<button type="button" class="btn-aksi btn-edit" onclick="openEditModal({{ $p->id }})">Edit</button>

    
    <!-- Tombol trigger modal -->
<button type="button" class="btn-aksi btn-hapus" onclick="openModal({{ $p->id }})">Hapus</button>

<!-- Modal konfirmasi -->
<div id="modal-{{ $p->id }}" class="modal-konfirmasi">
    <div class="modal-content">
        <p>Yakin ingin menghapus pasien <strong>{{ $p->nama }}</strong>?</p>
        <form action="{{ route('admin.pasien.destroy', $p->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-aksi btn-hapus">Ya, Hapus</button>
            <button type="button" class="btn-aksi btn-batal" onclick="closeModal({{ $p->id }})">Batal</button>
        </form>
        </div>
</div>

<!-- Modal Edit -->
<div id="modal-edit-{{ $p->id }}" class="modal-konfirmasi">
    <div class="modal-content">
        <h4>Edit Data Pasien</h4>
        <form action="{{ route('admin.pasien.update', $p->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="nama" value="{{ $p->nama }}" placeholder="Nama Lengkap" required style="margin-bottom: 10px; padding: 8px; width: 100%;">
            <input type="text" name="no_rekam_medis" value="{{ $p->no_rekam_medis }}" placeholder="No Rekam Medis" required style="margin-bottom: 10px; padding: 8px; width: 100%;">
            <input type="date" name="tanggal_lahir" value="{{ $p->tanggal_lahir }}" required style="margin-bottom: 10px; padding: 8px; width: 100%;">
            <input type="text" name="no_whatsapp" value="{{ $p->no_whatsapp }}" placeholder="No WhatsApp" style="margin-bottom: 10px; padding: 8px; width: 100%;">
            <div style="text-align: right;">
                <button type="submit" class="btn-aksi btn-edit">Simpan</button>
                <button type="button" class="btn-aksi btn-hapus" onclick="closeEditModal({{ $p->id }})">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tambah Pasien -->
<div id="modal-tambah" class="modal-konfirmasi">
    <div class="modal-content">
        <h4>Tambah Data Pasien</h4>
        <form action="{{ route('admin.pasien.store') }}" method="POST">
            @csrf
            <input type="text" name="nama" placeholder="Nama Lengkap" required style="margin-bottom: 10px; padding: 8px; width: 100%;">
            <input type="text" name="no_rekam_medis" placeholder="No Rekam Medis" required style="margin-bottom: 10px; padding: 8px; width: 100%;">
            <input type="date" name="tanggal_lahir" required style="margin-bottom: 10px; padding: 8px; width: 100%;">
            <input type="text" name="no_whatsapp" placeholder="No WhatsApp" style="margin-bottom: 10px; padding: 8px; width: 100%;">
            <div style="text-align: right;">
                <button type="submit" class="btn-aksi btn-edit">Simpan</button>
                <button type="button" class="btn-aksi btn-hapus" onclick="closeTambahModal()">Batal</button>
            </div>
        </form>
    </div>
</div>



        </tr>
    @endforeach

    @if ($pasien->isEmpty())
        <tr>
            <td colspan="7" style="text-align: center;">Data pasien tidak ditemukan.</td>
        </tr>
    @endif
</tbody>

</table>
</div>

<div style="margin-top: 20px; text-align: center;">
    @if ($pasien->lastPage() > 1)
        <ul class="pagination">
            @if ($pasien->onFirstPage())
                <li><span>&laquo;</span></li>
            @else
                <li><a href="{{ $pasien->previousPageUrl() }}">&laquo;</a></li>
            @endif

            @for ($i = 1; $i <= $pasien->lastPage(); $i++)
                @if ($i == $pasien->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                    <li><a href="{{ $pasien->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            @if ($pasien->hasMorePages())
                <li><a href="{{ $pasien->nextPageUrl() }}">&raquo;</a></li>
            @else
                <li><span>&raquo;</span></li>
            @endif
        </ul>
    @endif
</div>
</div>

<script>
    function openModal(id) {
        document.getElementById(`modal-${id}`).style.display = 'flex';
    }

    function closeModal(id) {
        document.getElementById(`modal-${id}`).style.display = 'none';
    }

    function openEditModal(id) {
        document.getElementById(`modal-edit-${id}`).style.display = 'flex';
    }

    function closeEditModal(id) {
        document.getElementById(`modal-edit-${id}`).style.display = 'none';
    }

    function openTambahModal() {
        document.getElementById('modal-tambah').style.display = 'flex';
    }

    function closeTambahModal() {
        document.getElementById('modal-tambah').style.display = 'none';
    }

    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        document.querySelectorAll('.modal-konfirmasi').forEach(modal => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
