<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="/assets/style.css">
    </head>
    <body>
        <header>
            <h2 class="logo">Logo</h2>
            <nav class="navigation">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <a href="{{ route('apps.index') }}">Applications</a>
                    <span class="nickname">{{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit()">(logout)</a>
                </form>
            </nav>
        </header>
        <div class="hero"></div>
    </body>
</html>