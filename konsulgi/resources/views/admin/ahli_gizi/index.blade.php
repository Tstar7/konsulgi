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

/* Tombol Edit */
.btn-edit {
    background-color: #2d6a4f;
    color: white;
}

.btn-edit:hover {
    background-color: #40916c;
    transform: translateY(-1px);
}

/* Tombol Hapus */
.btn-hapus {
    background-color: rgb(189, 24, 24);
    color: white;
}

.btn-hapus:hover {
    background-color: #a00000;
    transform: translateY(-1px);
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

        th, td {
            padding: 12px 20px;
            border-bottom: 1px solid #e0e0e0;
            text-align: left;
        }

        th {
            background-color: #d8f3dc;
            color: #1b4332;
        }

        td.actions {
            text-align: center;
        }

        tr:hover {
            background-color: #f1fdf7;
        }

        .button-delete {
            background-color: #e63946;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 5px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .button-delete:hover {
            background-color: #c82333;
        }

        .modal-konfirmasi {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 999;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    padding: 25px;
    border-radius: 10px;
    max-width: 500px;
    width: 90%;
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
    <h3>Daftar Profil Ahli Gizi</h3>

    <button onclick="openTambahModal()" class="btn-tambah-pasien">+ Tambah Ahli Gizi</button>

    <table border="1"> 
        <thead>
            <tr>
                <th style="width: 50px;">No</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">No Whatsapp</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ahliGizi as $index => $ahli)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ahli->nama }}</td>
                    <td>{{ $ahli->no_whatsapp }}</td>
                    <td style="text-align: center;">

                
        <!-- Tombol trigger modal Edit -->
            <button type="button" class="btn-aksi btn-edit" onclick="openEditModal({{ $ahli->id }})">Edit</button>

        <!-- Tombol trigger modal -->
            <button type="button" class="btn-aksi btn-hapus" onclick="openModal({{ $ahli->id }})">Hapus</button>

        <!-- Modal konfirmasi -->
        <div id="modal-{{ $ahli->id }}" class="modal-konfirmasi">
    <div class="modal-content">
        <p>Yakin ingin menghapus ahli gizi <strong>{{ $ahli->nama }}</strong>?</p>
        <form action="{{ route('admin.ahli-gizi.destroy', $ahli->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-aksi btn-hapus">Ya, Hapus</button>
            <button type="button" class="btn-aksi btn-edit" onclick="closeModal({{ $ahli->id }})">Batal</button>
        </form>
    </div>
</div>

<!-- Modal Edit Ahli Gizi -->
<div id="modal-edit-{{ $ahli->id }}" class="modal-konfirmasi">
    <div class="modal-content">
        <h4>Edit Data Ahli Gizi</h4>
        <form action="{{ route('admin.ahli-gizi.update', $ahli->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="nama" value="{{ $ahli->nama }}" placeholder="Nama Lengkap" required style="margin-bottom: 10px; padding: 8px; width: 100%;">
            <input type="text" name="no_whatsapp" value="{{ $ahli->no_whatsapp }}" placeholder="No WhatsApp" required style="margin-bottom: 10px; padding: 8px; width: 100%;">
            <div style="text-align: right;">
                <button type="submit" class="btn-aksi btn-edit">Simpan</button>
                <button type="button" class="btn-aksi btn-hapus" onclick="closeEditModal({{ $ahli->id }})">Batal</button>
            </div>
        </form>
    </div>
</div>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Belum ada data ahli gizi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Tambah Ahli Gizi -->
<div id="modal-tambah" class="modal-konfirmasi" style="display: none; position: fixed; top: 0; left: 0; 
    width: 100%; height: 100%; background-color: rgba(0,0,0,0.4); z-index: 1000; justify-content: center; align-items: center;">
    <div class="modal-content" style="background-color: white; padding: 30px; border-radius: 12px; max-width: 500px; width: 90%;">
        <h3 style="margin-top: 0;">Tambah Data Ahli Gizi</h3>
        <form action="{{ route('admin.ahli-gizi.store') }}" method="POST">
            @csrf
            <input type="text" name="username" value="{{ $ahli->username }}" placeholder="Username" required style="margin-bottom: 10px; padding: 8px; width: 100%;">
            <input type="text" name="password" value="{{ $ahli->password }}" placeholder="Password" required style="margin-bottom: 10px; padding: 8px; width: 100%;">
            <input type="text" name="nama" placeholder="Nama Lengkap" required style="margin-bottom: 15px; padding: 10px; width: 100%;">
            <input type="text" name="no_whatsapp" placeholder="No WhatsApp" required style="margin-bottom: 15px; padding: 10px; width: 100%;">
            <div style="text-align: right;">
                <button type="submit" class="btn-aksi btn-edit">Simpan</button>
                <button type="button" class="btn-aksi btn-hapus" onclick="closeTambahModal()">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openTambahModal() {
        document.getElementById('modal-tambah').style.display = 'flex';
    }

    function closeTambahModal() {
        document.getElementById('modal-tambah').style.display = 'none';
    }

    function openEditModal(id) {
    document.getElementById('modal-edit-' + id).style.display = 'flex';
}

    function closeEditModal(id) {
    document.getElementById('modal-edit-' + id).style.display = 'none';
}

    function openModal(id) {
        document.getElementById(`modal-${id}`).style.display = 'flex';
    }

    function closeModal(id) {
        document.getElementById(`modal-${id}`).style.display = 'none';
    }

    // Tutup modal saat klik luar modal
    window.onclick = function(event) {
        document.querySelectorAll('.modal-konfirmasi').forEach(function(modal) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    }
</script>


</body>
</html>
