<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create ()
    {
        return view('auth/login');
    }

    public function store (Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);
        if (!Auth::attempt($credentials, $request->boolean('rem'))) {
            throw ValidationException::withMessages([
                'email' => 'Email or Password entered incorrectly'
            ]);
        }
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }
    public function destroy (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
