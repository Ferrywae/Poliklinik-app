<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

// Halaman awal
Route::get('/', fn () => view('welcome'));

// 🔐 Auth
Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register'])->name('register.post');

Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

// 🚦 Shortcut /dashboard → auto-redirect sesuai role (opsional tapi berguna)
Route::middleware('auth')->get('/dashboard', function () {
    return match (Auth::user()->role) {
        'admin'  => redirect()->route('admin.dashboard'),
        'dokter' => redirect()->route('dokter.dashboard'),
        default  => redirect()->route('pasien.dashboard'),
    };
})->name('dashboard');

// 🎯 Dashboard per role
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
});

Route::middleware(['auth','role:dokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', fn () => view('dokter.dashboard'))->name('dokter.dashboard');
});

Route::middleware(['auth','role:pasien'])->prefix('pasien')->group(function () {
    Route::get('/dashboard', fn () => view('pasien.dashboard'))->name('pasien.dashboard');
});
