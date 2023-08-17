<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index ()
    {
        $apps = Application::where('user', auth()->user()->name)->get();
        return view('apps/index', compact('apps'));
    }

    public function create ()
    {
        return view('apps/create');
    }

    public function store (Request $request)
    {
        $request->validate([
            'topic' => ['string', 'required'],
            'message' => ['string', 'required']
        ]);
        Application::create([
            'topic' => $request->topic,
            'message' => $request->message,
            'user' => auth()->user()->name,
        ]);
        return redirect()->route('apps.index');
    }

    public function show (Application $app)
    {
        $status = $app->status->status;
        $app = Application::find($app);
        

        return view('apps/show', compact('app', 'status'));
    }
}
