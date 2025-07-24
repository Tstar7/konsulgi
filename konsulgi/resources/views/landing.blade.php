<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>KONSELZI - Konseling Gizi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f4f4f4;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #ffffff;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        header img.logo {
            height: 50px;
        }

        .login-btn {
            background-color: #28a745;
            color: white;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: background 0.3s;
        }

        .login-btn:hover {
            background-color: #218838;
        }

        main {
            flex: 1;
            padding: 2rem 1rem;
            width: 100%;
            max-width: 900px;
            margin: auto;
        }

        .slider {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
            border-radius: 10px;
        }

        .slides {
            display: flex;
            width: 600%;
            animation: slide 24s infinite;
        }

        .slides img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        @keyframes slide {
            0%   { margin-left: 0%; }
            16%  { margin-left: 0%; }
            20%  { margin-left: -100%; }
            36%  { margin-left: -100%; }
            40%  { margin-left: -200%; }
            56%  { margin-left: -200%; }
            60%  { margin-left: -300%; }
            76%  { margin-left: -300%; }
            80%  { margin-left: -300%; }
            96%  { margin-left: -400%; }
            100% { margin-left: -400%; }
        }

        .description {
            margin-top: 2rem;
            background-color: PaleGreen;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(221, 221, 221, 0.05);
        }

        .description h2 {
            color: #155724;
            margin-bottom: 1rem;
        }

        .description p {
            color: #333;
            line-height: 1.6;
        }

        footer {
            background-color: #ffffff;
            color: #444;
            text-align: center;
            padding: 1rem;
            font-size: 0.9rem;
            border-top: 1px solid #ccc;
        }

        @media (max-width: 600px) {
            .slides img {
                height: 250px;
            }

            .slider {
                height: 250px;
            }

            .description h2 {
                font-size: 1.2rem;
            }

            .description p {
                font-size: 0.95rem;
            }
        }

        @media (max-width: 600px) {
    header {
        flex-direction: column;
        align-items: flex-start;
    }

    header > div:first-child {
        margin-bottom: 0.5rem;
    }

    .login-btn {
        margin-top: 0.5rem;
    }

    header .logo {
        height: 40px;
    }
}

.description p {
    color: #333;
    line-height: 1.6;
    margin-bottom: 1rem; /* Memberi jarak antar paragraf */
}

/* Modal wrapper */
.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    justify-content: center;
    align-items: center;
}

/* Modal box */
.modal-content {
    background-color: #fff;
    padding: 2rem 1.5rem;
    border-radius: 1rem;
    max-width: 420px;
    width: 90%;
    box-shadow: 0 12px 30px rgba(0,0,0,0.2);
    position: relative;
    animation: fadeIn 0.3s ease;
}

/* Close button */
.modal-content .close {
    position: absolute;
    top: 12px; right: 18px;
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
    cursor: pointer;
}

/* Form box */
.form-box {
    text-align: center;
}

.form-box img {
    width: 100px;
    margin-bottom: 0.8rem;
}

.form-box h3 {
    margin-bottom: 0.3rem;
    color: #155724;
    font-size: 1.2rem;
}

.form-box p {
    font-size: 0.9rem;
    margin-bottom: 1rem;
    color: #555;
}

/* Input styling */
label {
    display: block;
    margin-top: 1rem;
    font-weight: 600;
    text-align: left;
    font-size: 0.9rem;
    color: #333;
}

input {
    width: 100%;
    padding: 0.55rem;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin-top: 0.25rem;
    font-size: 0.95rem;
}

/* Button styling */
button {
    margin-top: 1.5rem;
    width: 100%;
    padding: 0.7rem;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s;
}

button:hover {
    background-color: #218838;
}

.error {
    color: red;
    font-size: 0.9rem;
    margin-top: 1rem;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-15px); }
    to { opacity: 1; transform: translateY(0); }
}

.role-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    margin-top: 1rem;
    animation: fadeIn 0.3s ease;
}

.role-btn {
    padding: 0.75rem;
    font-size: 1rem;
    font-weight: 600;
    border: none;
    background: linear-gradient(135deg, #28a745, #218838);
    color: white;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.role-btn:hover {
    background: linear-gradient(135deg, #218838, #1c7430);
    transform: scale(1.02);
    box-shadow: 0 6px 16px rgba(0,0,0,0.15);
}

.login-form {
    display: none;
    flex-direction: column;
    gap: 1rem;
    margin-top: 1.5rem;
    animation: fadeIn 0.3s ease;
}

/* Styling Checkbox Ingat Saya */
.login-form label {
     
    font-weight: 600;
    display: flex;
    align-items: center;
    font-size: 0.9rem;
    color: #555;
    gap: 0.5rem;
    margin: 5px 0 4px;
}

.login-form input[type="checkbox"] {
    accent-color: #28a745;
    transform: scale(1.1);
    cursor: pointer;
    margin: 0;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    padding: 0.75rem 1rem;
    border: 1px solid #f5c6cb;
    border-radius: 6px;
    margin-bottom: 1rem;
    text-align: center;
}

    </style>
</head>
<body>

<header>
    <img src="{{ asset('images/logo-rs.png') }}" alt="Logo RSUP" class="logo">
    <span style="margin-left: 152x; display : flex; flex-direction: column; font-size: 1.5rem; font-weight: bold; color: #28a745;">KONSULZI</span>
    <div>
        <a href="#" class="login-btn" onclick="openModal()">Login</a>
        
    </div>
</header>

<main>
    <div class="slider">
        <div class="slides">
            <img src="{{ asset('images/gizi1.jpg') }}" alt="Gambar 1">
            <img src="{{ asset('images/gizi2.jpg') }}" alt="Gambar 2">
            <img src="{{ asset('images/gizi3.jpg') }}" alt="Gambar 3">
            <img src="{{ asset('images/gizi4.jpg') }}" alt="Gambar 4">
            <img src="{{ asset('images/gizi5.jpg') }}" alt="Gambar 5">
            <img src="{{ asset('images/gizi6.jpg') }}" alt="Gambar 6">
        </div>
    </div>

    <div class="description">
        <h2>Apa itu KONSULZI?</h2>
        <p>
            KONSULZI merupakan kepanjangan dari Konseling Gizi Online.
        </p>
        <p>
            Gizi merupakan faktor yang sangat penting dalam menjaga kesehatan fisik kita. 
            Tanpa gizi yang cukup dan seimbang, tubuh kita tidak akan mampu berfungsi dengan baik. Oleh karena itu, 
            penting bagi kita untuk memperhatikan asupan gizi kita sehari-hari.
        </p>
        <p>
            Menurut <strong>Dr. Aris Wibudi, SpGK</strong>, seorang ahli gizi dari Rumah Sakit Pusat Angkatan Darat Gatot Subroto, 
            “Gizi yang seimbang sangat penting untuk menjaga kesehatan fisik kita. Gizi yang cukup dan seimbang dapat 
            memberikan energi yang dibutuhkan oleh tubuh untuk beraktivitas sehari-hari.”
        </p>
        <p>
            Melalui layanan <strong>KONSULZI</strong>, Anda bisa berkonsultasi langsung dengan ahli gizi 
            RSUP Dr. Mohammad Hoesin untuk mendapatkan panduan makan seimbang sesuai kondisi kesehatan Anda. 
            Layanan ini mudah diakses, cepat, dan dapat dipercaya.
        </p>
    </div>
</main>
<!-- MODAL LOGIN -->
  <div class="modal" id="loginModal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      @if(session('error'))
  <div class="error">{{ session('error') }}</div>
@endif

      <h3>Pilih Login Sebagai</h3>

      <!-- Pilihan Role -->
      <div class="role-buttons" id="roleButtons">
        <button class="role-btn" onclick="showForm('admin')">Admin</button>
        <button class="role-btn" onclick="showForm('pasien')">Pasien</button>
        <button class="role-btn" onclick="showForm('dokter')">Ahli Gizi</button>
      </div>

    <!-- Form Login Pasien -->
      <form action="{{ route('pasien.login') }}" method="POST" class="login-form" id="form-pasien">
        @csrf
        <h3>Login Pasien</h3>
        <input type="text" name="no_rekam_medis" placeholder="Nomor Rekam Medik" required>
        <input type="date" name="tanggal_lahir" required>
        <button type="submit">Login Pasien</button>
      </form>

      <!-- Form Login Admin -->
      <form action="{{ route('admin.login') }}" method="POST" class="login-form" id="form-admin">
        @csrf
        <h3>Login Admin</h3>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login Admin</button>
      </form>

      <!-- Form Login Ahli -->
      <form action="{{ route('ahli_gizi.login') }}" method="POST" class="login-form" id="form-dokter">
        @csrf
        <h3>Login Ahli Gizi</h3>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login Ahli Gizi</button>
      </form>
    </div>
  </div>

  <!-- JAVASCRIPT -->
  <script>
    function openModal() {
    document.getElementById('loginModal').style.display = 'flex';
    document.getElementById('roleButtons').style.display = 'flex';
    hideAllForms();
}

    function closeModal() {
      document.getElementById('loginModal').style.display = 'none';
    }

    function showForm(role) {
    hideAllForms();
    document.getElementById('roleButtons').style.display = 'none';
    document.getElementById('form-' + role).style.display = 'flex';
}

    function hideAllForms() {
      const forms = document.querySelectorAll('.login-form');
      forms.forEach(form => form.style.display = 'none');
    }

    // Optional: close modal when clicking outside
    window.onclick = function(event) {
      const modal = document.getElementById('loginModal');
      if (event.target === modal) {
        modal.style.display = "none";
      }
    }
    @if(session('error'))
    // Buka modal otomatis kalau ada error
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('loginModal').style.display = 'flex';
    });
  @endif
  </script>

</body>
</html>