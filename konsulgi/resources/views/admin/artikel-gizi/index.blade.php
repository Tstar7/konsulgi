<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f9f6;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #2d6a4f;
            color: white;
            display: flex;
            flex-direction: column;
            padding-top: 30px;
            position: fixed;
            height: 100vh;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #40916c;
        }

        .sidebar a,
        .sidebar form button {
            padding: 15px 30px;
            font-size: 1rem;
            color: white;
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            text-align: left;
            width: 100%;
            transition: background 0.3s;
        }

        .sidebar a:hover,
        .sidebar form button:hover {
            background-color: #40916c;
        }

        /* Content */
        .content {
            margin-left: 250px;
            padding: 30px;
            flex: 1;
        }

        h3 {
            font-size: 2rem;
            font-weight: bold;
            color: #1b4332;
            margin-bottom: 20px;
        }

        /* Tombol Tambah Artikel */
        .btn-primary {
            background-color: #2d6a4f;
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn-primary:hover {
            background-color: #40916c;
            transform: translateY(-2px);
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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

        tr:hover {
            background-color: #f1fdf7;
        }

        td.actions {
            text-align: center;
        }

        /* Tombol Aksi */
        .btn {
            padding: 6px 12px;
            font-size: 0.85rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-right: 6px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-warning {
            background-color: #f0ad4e;
            color: white;
        }

        .btn-warning:hover {
            background-color: #ec9f34;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #b02a37;
        }

        /* Modal */
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
            text-align: center;
        }

        .modal-content h4 {
            margin-bottom: 20px;
        }

        .modal-content button {
            margin: 10px;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-confirm {
            background-color:rgb(189, 24, 24);
            color: white;
        }

        .btn-cancel {
            background-color: #ccc;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 200px;
                padding: 20px;
            }

            th, td {
                font-size: 0.9rem;
            }
        }

        .modal-content form label {
    font-weight: bold;
    color: #1b4332;
    margin-bottom: 6px;
    display: block;
}

.modal-content input[type="text"],
.modal-content input[type="date"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    width: 100%;
    margin-bottom: 15px;
    font-size: 1rem;
    transition: border-color 0.3s;
}

.modal-content input[type="text"]:focus,
.modal-content input[type="date"]:focus {
    border-color: #2d6a4f;
    outline: none;
}

.modal-content h4 {
    font-size: 1.5rem;
    font-weight: bold;
    color: #1b4332;
    margin-bottom: 20px;
    text-align: center;
}

.modal-content .btn-confirm {
    background-color: #2d6a4f;
    color: white;
    padding: 10px 20px;
    font-size: 1rem;
}

.modal-content .btn-cancel {
    background-color: #ccc;
    padding: 10px 20px;
    font-size: 1rem;
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
    <h3>Artikel Gizi</h3>

    <a href="{{ route('admin.artikel-gizi.create') }}" class="btn-primary">+ Tambah Artikel Baru</a>

    <table border="1"> 
        <thead>
            <tr>
                <th style="border-top-left-radius: 10px;">No</th>
                <th style="text-align: center;">Judul Artikel</th>
                <th style="text-align: center;">Tanggal</th>
                <th style="text-align: center;">Kategori</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($artikels as $index => $artikel)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $artikel->judul }}</td>
                    <td style="text-align: center;">{{ \Carbon\Carbon::parse($artikel->tanggal)->format('d/m/Y') }}</td>
                    <td style="text-align: center;">{{ $artikel->kategori }}</td>
                    <td class="actions">

                        <button style="text-align: center;" class="btn btn-danger" onclick="openModal({{ $artikel->id }})">Hapus</button>

                        <!-- Form delete untuk artikel ini -->
                        <form id="form-delete-{{ $artikel->id }}" action="{{ route('admin.artikel-gizi.destroy', $artikel->id) }}" method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">Belum ada artikel.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal konfirmasi -->
<div class="modal-konfirmasi" id="modalKonfirmasi">
    <div class="modal-content">
        <h4>Yakin ingin menghapus artikel ini?</h4>
        <button class="btn-confirm" onclick="submitHapus()">Ya, Hapus</button>
        <button class="btn-cancel" onclick="closeModal()">Batal</button>
    </div>
</div>


<script>
    let idToDelete = null;

    function openModal(id) {
        idToDelete = id;
        document.getElementById('modalKonfirmasi').style.display = 'flex';
    }

    function closeModal() {
        idToDelete = null;
        document.getElementById('modalKonfirmasi').style.display = 'none';
    }

    function submitHapus() {
        if (idToDelete) {
            document.getElementById('form-delete-' + idToDelete).submit();
        }
    }
</script>

</body>
</html>