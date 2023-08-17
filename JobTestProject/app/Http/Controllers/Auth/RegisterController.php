<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create ()
    {
        return view('auth/register');
    }

    public function store (Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
