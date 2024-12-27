<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="login">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <h1>Login</h1>
                    <hr>
                    <p>Kreasi Dapur</p>
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="example@gmail.com" required>
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                    <button>Login</button>
                    <p>
                        Belum punya akun? <a href="{{ route('register')}}">Daftar</a>
                    </p>
                </form>
            </div>
            <div class="right">
                <img src="image/main_img.png" alt="">
            </div>
        </div>
    </body>
</html>