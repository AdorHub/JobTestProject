<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Applications</title>
        <link rel="stylesheet" href="/assets/style.css">
    </head>
    <body>
        <header>
            <h2 class="logo">Logo</h2>
            <nav class="navigation">
                <form action="{{ route('logout') }}" method="post">
                @csrf
                <a href="{{ route('home') }}">Home</a>
                <span class="nickname">{{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit()">(logout)</a>
                </form>
            </nav>
        </header>
        <div class="main">
            <div class="head">
                <span class="title">My Applications</span>
            </div>
            <div class="app-hero">
                @foreach ($apps as $app)
                <ul class="app-list">
                    <li><a href="{{ route('apps.show', $app->id) }}"><b>{{ $app->topic }}</b></a></li>
                </ul>
                @endforeach
                <a href="{{ route('apps.create') }}" class="create-btn">Create new</a>
            </div>
           
        </div>
    </body>
</html>