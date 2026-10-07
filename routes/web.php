<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use GuzzleHttp\AuthMiddleware;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $user = Auth::user();
    return view('welcome', ["name" => $user->name, "email" => $user->email]);
})->middleware('auth');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
