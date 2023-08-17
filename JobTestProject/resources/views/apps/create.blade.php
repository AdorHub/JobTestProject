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
                <span class="title">New application</span>
            </div>
            <div class="app-hero">
                <div class="app-create-block">
                    <form action="{{ route('apps.store') }}" method="post">
                    @csrf
                        <label for="">Topic</label>
                            <input type="text" id="topic" name="topic" required>
                        <label for="">Message</label>
                            <textarea name="message" id="message" required></textarea>
                            <button type="submit" class="app-create-btn">Send</button>
                    </form>
                </div>                    
            </div>           
        </div>
    </body>
</html>