<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <link rel="stylesheet" href="/assets/style.css">
    </head>
    <body>
        <header>
            <h2 class="logo">Logo</h2>
            <nav class="navigation">
                @guest
                    <a href="{{ route('login') }}">Log In</a>
                    <a href="{{ route('register') }}">Register</a>
                @endguest
                @auth
                    <a href="{{ route('home') }}">Home</a>
                    <span class="nickname">{{ Auth::user()->name }}</span>
                    <a class="logout-btn" href="{{ route('welcome') }}">(logout)</a>
                @endauth
            </nav>
        </header>
        <div class="hero"></div>
    </body>
</html>