<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Status;
use Illuminate\Http\Request;

class AppManagerController extends Controller
{
    public function index ()
    {
        $apps = Application::all();
        return view('manager/index', compact('apps'));
    }

    public function show (Application $app) {
        $app = Application::find($app);
        return view('manager/show', compact('app'));
    }

    public function edit (Application $app)
    {
        $app = Application::find($app);
        $statuses = Status::all();
        return view('manager/edit', compact('app', 'statuses'));
    }

    public function update(Application $app) {

        $data = request()->validate([
            'status_id' => '',
            'comment' => ''
        ]);

        $app->update($data);
        return redirect()->route('appss.index');
    }
}
