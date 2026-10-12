<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth')->group(function () {
    Route::post('/requests', [ServiceRequestController::class, 'store']);
    Route::get('/requests/create', [ServiceRequestController::class, 'create'])->name('requests.create');
    Route::get('/requests/{id}', [ServiceRequestController::class, 'show'])->name('requests.show');
});
