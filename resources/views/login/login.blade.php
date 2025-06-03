<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rekomendasi Wisata</title>
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    <style>
        .alert-error {
            background-color: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-box">

            <h2>Selamat Datang</h2>
            <p>Masuk ke Halaman Admin Harus melakukan Login terlebih dahulu</p>

            {{-- Tampilkan error jika login gagal --}}
            @if ($errors->has('email'))
                <div class="alert-error">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required autofocus>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>

                <button type="submit" class="btn-login">Masuk</button>
                <div class="back-link" style="margin-top: 15px; text-align: center;">
                    <a href="{{ url('/') }}" style="text-decoration: none; color: #007bff;">← Kembali ke Beranda</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
