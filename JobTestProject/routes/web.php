<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AppManagerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

#Views
Route::view('/', 'welcome')->name('welcome');
Route::view('/home', 'home')->middleware('auth')->name('home');


#Registration
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');
#Login
Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
#Logout
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');


# User | Apps
Route::get('/apps', [AppController::class, 'index'])->middleware('ismanager')->name('apps.index');
Route::get('/apps/create', [AppController::class, 'create'])->name('apps.create');
Route::post('/apps', [AppController::class, 'store'])->name('apps.store');
Route::get('/apps/{app}', [AppController::class, 'show'])->name('apps.show');

#Manager | Apps
Route::get('/applications', [AppManagerController::class, 'index'])->middleware('isuser')->name('appss.index');
Route::get('/applications/{app}/edit', [AppManagerController::class, 'edit'])->name('appss.edit');
Route::patch('/applications/{app}', [AppManagerController::class, 'update'])->name('appss.update');





