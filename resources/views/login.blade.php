<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @laravelPWA
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div class="logo-container">
        <img src="/images/emojione_books.png" alt="Logo">
    </div>
    <div class="login-container">
        <p class="text"><span>Homer </span> / Login</p>
        <h3>Login</h3>
        <p>Input your username and password.</p>
        <form action="login" method="POST">
            @csrf
            <h5>Email</h5>
            <input type="text" id="email" name="email" placeholder="Email" required>
            <h5>Password</h5>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        @if (Session::has('error'))
            <div class="alert alert-danger" style="color: red; margin-top: 20px; text-align: center;">
                {{ Session::get('error') }}
            </div>
        @endif
    @if ($errors->any())
        <div class="alert alert-danger col-md-6">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <div class="bawah">
        <p class="regis">Don't have an account? <a href="{{ route('register') }}">Create one!</a></p>
        <footer>
            &copy; 2024 Perpustakaan Online. All rights reserved.
        </footer>
    </div>

    <script src="/js/login.js"></script>
</body>
</html>
