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
            @foreach ($app as $item)
                <div class="head">                
                        <span class="title">{{ $status === 'New' ? 'Pending review..' : $status }}</span>                
                </div>
                <div class="app-hero">
                    <div class="app-label">Topic:</div>
                    <div class="app-content">{{ $item->topic }}</div>
                    <div class="app-label">Message:</div>
                    <div class="app-content">{{ $item->message }}</div>
                    <hr>
                    <div class="app-label">Status:</div>
                    <div class="app-content">{{ $status === 'New' ? 'Pending review..' : $status }}</div>
                    @if ($status !== 'New')
                        <div class="app-label">Manager comment:</div>
                        <div class="app-content">{{ $item->comment }}</div>
                    @endif
                    <a href="{{ route('apps.index') }}" class="back-btn">Back</a>
                </div>
            @endforeach
    </body>
</html>