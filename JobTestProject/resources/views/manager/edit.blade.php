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
            <form action="{{ route('appss.update', $item->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="head">                
                    <span class="title">{{ $item->user }}</span>                
                </div>
                <div class="app-hero">
                    <div class="app-label">Topic:</div>
                    <div class="app-content">{{ $item->topic }}</div>
                        <div class="app-label">Message:</div>
                        <div class="app-content">{{ $item->message }}</div>
                    <form action=""></form>
                    <div class="app-label">Status:</div>
                    <div class="app-content">
                    <select id="select" class="selector" name="status_id" onchange="run()">
                        @foreach ($statuses as $status)                            
                            <option id="option" {{ $status->id === $item->status_id ? ' selected' : ''}} value="{{ $status->id }}">{{ $status->status }}</option>
                        @endforeach
                    </select>
                    </div>
                        <div class="app-label">Comment to user:</div>
                        <textarea name="comment" class="app-content" required>{{ $item->comment }}</textarea>            
                    <button class="create-btn" type="submit">Save</button>
                    <a href="{{ route('appss.index') }}" class="back-btn">Back</a>
                </div>
            </form>                
            @endforeach
    </body>
</html>