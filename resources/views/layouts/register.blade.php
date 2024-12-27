<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar</title>
        <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="register">
                <form action="">
                    <h1>Daftar</h1>
                    <hr>
                    <p>Kreasi Dapur</p>
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" placeholder="Nama Lengkap" required>
                    
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="example@gmail.com" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Password" required>

                    <label for="confirm-password">Konfirmasi Password</label>
                    <input type="password" id="confirm-password" placeholder="Konfirmasi Password" required>

                    <button type="submit">Daftar</button>
                    <p>
                        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                    </p>
                </form>
            </div>
            <div class="right">
                <img src="image/foto-rendang.png" alt="">
            </div>
        </div>
    </body>
</html>
