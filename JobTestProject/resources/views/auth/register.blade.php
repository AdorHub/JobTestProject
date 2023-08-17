<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
        <link rel="stylesheet" href="/assets/style.css">
    </head>
    <body>
        <header>
            <h2 class="logo">Logo</h2>
            <nav class="navigation">
                <a href="{{ route('login') }}">Log In</a>
            </nav>
        </header>
        <div class="hero">
            <div class="container">
                <!--LOGIN MENU-->
                <div class="form-box">
                    <h2>Registration</h2>
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="input-box">
                            <input type="text" value="{{ old('name') }}" name="name">
                            <label>Login</label>
                            @error('name')
                                <p class="err-msg">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-box">
                            <input type="email" value="{{ old('email') }}" name="email">
                            <label>Email</label>
                            @error('email')
                                <p class="err-msg">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-box">
                            <input type="password" name="password" required>
                            <label >Password</label>
                        </div>
                        <div class="input-box">
                            <input type="password" name="password_confirmation" required>
                            <label>Confirm Password</label>
                            @error('password')
                                <p class="err-msg">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="btn" type="submit">Done</button>
                        <div class="reglog-link">Already have an account?<a href="{{ route('login') }}">Login</a></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>