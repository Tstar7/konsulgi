<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: #f0f8f5;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }


        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: url('{{ asset('images/bg-login.jpg') }}') no-repeat center center/cover;
            z-index: -2;
        }

        body::after {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(255, 255, 255, 0.6); /* atau rgba(0,0,0,0.3) untuk gelap */
            z-index: -1;
        }

        .form-box {
            background-color: #fff;
            padding: 2rem;
            border-radius: 1rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-top: 5px solid #28a745;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .form-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .form-box img {
            width: 155px;
            margin-bottom: 0.2rem;
        }

        .form-box h3 {
            margin-bottom: 0.5rem;
            color: #155724;
        }

        .form-box p {
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-top: 1rem;
            font-weight: bold;
            text-align: left;
            color: #333;
        }

        input {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 0.3rem;
            font-size: 1rem;
        }

        button {
            margin-top: 1.5rem;
            width: 100%;
            padding: 0.75rem;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 4px 0 #1c7c31;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

        .error {
            color: red;
            margin-top: 1rem;
        }
    </style>
</head>
<body>

<div class="form-box">
            {{-- Logo RS --}}
        <img src="{{ asset('images/logo-rs.png') }}" alt="Logo RS">

        <h3>Login Admin</h3>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.login') }}" method="POST">
    @csrf
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">LOGIN</button>
    </form>
</div>

<footer style="position: absolute; bottom: 20px; width: 100%; text-align: center; font-size: 0.9rem; color: #777;">
    Copyrights © 2025 All Rights Reserved by SIMRS
</footer>

</body>
</html>
