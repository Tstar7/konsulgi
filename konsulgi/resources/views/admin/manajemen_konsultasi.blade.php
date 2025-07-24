<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
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
      flex-direction: column;
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

    .sidebar form {
  margin: 0;
  padding: 0;
}

.sidebar form button {
  font-family: inherit;
  font-size: 1rem;
  color: white;
  background: none;
  border: none;
  text-align: left;
  padding: 15px 30px;
  width: 100%;
  cursor: pointer;
  transition: background 0.3s;
}

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
            margin-bottom: 20px;
        }

        form[method="GET"] {
            margin-bottom: 25px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            align-items: flex-end;
        }

        form > div {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 600;
            margin-bottom: 6px;
            color: #1b4332;
            font-size: 0.95rem;
        }

        input[type="date"],
        select {
            padding: 8px 12px;
            border: 1.8px solid #a5d6a7;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            min-width: 180px;
            background-color: white;
        }

        input[type="date"]:focus,
        select:focus {
            outline: none;
            border-color: #2d6a4f;
            box-shadow: 0 0 5px #40916c;
        }

        form > div:last-child {
            display: flex;
            gap: 10px;
        }

        form button[type="submit"] {
            padding: 10px 20px;
            background-color: #2d6a4f;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button[type="submit"]:hover {
            background-color: #40916c;
        }

        form a {
            align-self: center;
            padding: 10px 18px;
            font-weight: 600;
            color: #2d6a4f;
            text-decoration: none;
            border: 2px solid #2d6a4f;
            border-radius: 6px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        form a:hover {
            background-color: #2d6a4f;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border-radius: 12px;
            overflow: hidden;
        }

        thead tr {
            background-color: #2d6a4f;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            user-select: none;
        }

        th, td {
            padding: 14px 20px;
            border-bottom: 1px solid #e0e0e0;
            text-align: left;
            font-size: 0.95rem;
        }

        td.actions {
            text-align: center;
        }

        tbody tr:hover {
            background-color: #d8f3dc;
            transition: background-color 0.3s ease;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr td:nth-child(1) {
            width: 50px;
            text-align: center;
            font-weight: 600;
            color: #40916c;
        }

        tbody tr td:nth-child(5) {
            text-transform: capitalize;
            font-weight: 600;
            color: #2d6a4f;
        }

        /* Pagination styling (Laravel default links) */
        .pagination {
            margin-top: 25px;
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            font-size: 0.9rem;
        }

        .pagination a,
        .pagination span {
            padding: 6px 12px;
            border: 1.8px solid #2d6a4f;
            color: #2d6a4f;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .pagination a:hover {
            background-color: #2d6a4f;
            color: white;
        }

        .pagination .active span {
            background-color: #2d6a4f;
            color: white;
            border-color: #2d6a4f;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .content {
                padding: 20px 25px;
                margin-left: 0;
            }
            .sidebar {
                width: 200px;
                padding-top: 20px;
            }
            form[method="GET"] {
                flex-direction: column;
                gap: 15px;
            }
            form > div {
                min-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                display: none;
            }
            body {
                flex-direction: column;
            }
            .content {
                margin-left: 0;
                padding: 15px 15px;
            }
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            tbody tr {
                margin-bottom: 20px;
                border-radius: 12px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.05);
                background-color: white;
                padding: 15px;
            }
            tbody tr td {
                border: none;
                padding-left: 50%;
                position: relative;
                text-align: right;
                font-size: 1rem;
            }
            tbody tr td::before {
                position: absolute;
                top: 14px;
                left: 20px;
                width: 45%;
                white-space: nowrap;
                font-weight: 700;
                color: #2d6a4f;
                content: attr(data-label);
                text-align: left;
                font-size: 0.9rem;
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
    <h3>Manajemen Konsultasi</h3>

    <form method="GET" action="{{ route('admin.manajemen-konsultasi') }}">
        <div>
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $tanggal) }}" />
        </div>

        <div>
            <label for="ahli_gizi_id">Ahli Gizi:</label>
            <select name="ahli_gizi_id" id="ahli_gizi_id">
                <option value="">-- Semua Ahli Gizi --</option>
                @foreach($ahliGiziList as $ahli)
                    <option value="{{ $ahli->id }}" @if($ahliGiziId == $ahli->id) selected @endif>{{ $ahli->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="pasien_id">Pasien:</label>
            <select name="pasien_id" id="pasien_id">
                <option value="">-- Semua Pasien --</option>
                @foreach($pasienList as $pasien)
                    <option value="{{ $pasien->id }}" @if($pasienId == $pasien->id) selected @endif>{{ $pasien->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit">Cari</button>
            <a href="{{ route('admin.manajemen-konsultasi') }}">Reset</a>
        </div>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Nama Ahli Gizi</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($konsultasis as $index => $konsultasi)
            <tr>
                <td data-label="No">{{ $konsultasis->firstItem() + $index }}</td>
                <td data-label="Nama Pasien">{{ $konsultasi->pasien->nama ?? '-' }}</td>
                <td data-label="Nama Ahli Gizi">{{ $konsultasi->ahliGizi->nama ?? '-' }}</td>
                <td data-label="Tanggal">{{ \Carbon\Carbon::parse($konsultasi->tanggal_konsultasi)->format('d M Y H:i') }}</td>
                <td data-label="Status" style="text-transform: capitalize;">{{ $konsultasi->status }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center; padding: 30px 0;">Data konsultasi tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $konsultasis->withQueryString()->links() }}
    </div>
</div>

</body>
</html>
