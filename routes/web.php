<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : view('auth.login');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/dashboard', [DashboardController::class, 'update'])->name('dashboard.update');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, "show"])->name('register');

    Route::post('register', [RegisterController::class, "create"])->name('register.create');

    Route::post('/login', [LoginController::class, "login"])->name('login');
});
