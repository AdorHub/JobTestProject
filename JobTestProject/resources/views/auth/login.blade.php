<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="/assets/style.css">
    </head>
    <body>
        <header>
            <h2 class="logo">Logo</h2>
            <nav class="navigation">
                <a href="{{ route('register') }}">Register</a>
            </nav>
        </header>
        <div class="hero">
            <div class="container">
                <!--REGISTER MENU-->
                <div class="form-box">
                    <h2>Log In</h2>
                    <form action="{{ route('login.store') }}" method="post">
                        @csrf
                        <div class="input-box">
                            <input type="email" value="{{ old('email') }}" name="email" autofocus required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <input type="password" name="password" required>
                            <label>Password</label>
                            @error('email')
                                <p class="err-msg">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="rem">
                            <input type="checkbox" id="rem" name="rem">
                            <label for="rem">Remember me</label>
                        </div>
                        <button class="btn" type="submit">Login</button>
                        <div class="reglog-link">Don't have an account?<a href="{{ route('register') }}">Register</a></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>