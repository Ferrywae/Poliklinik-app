<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', fn () => view('welcome'))->name('welcome');

Route::get('/dashboard', function () {
    if (auth()->check()) {
        return match (auth()->user()->role) {
            'admin'  => redirect()->route('admin.dashboard'),
            'dokter' => redirect()->route('dokter.dashboard'),
            default  => redirect()->route('pasien.dashboard'),
        };
    }
    return redirect()->route('login');
})->name('dashboard');

/* ---------- AUTH ---------- */
Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register'])->name('register.post');

Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

/* ---------- DASHBOARD PER ROLE ---------- */
Route::middleware(['auth','role:admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
});
Route::middleware(['auth','role:dokter'])->prefix('dokter')->as('dokter.')->group(function () {
    Route::view('/dashboard', 'dokter.dashboard')->name('dashboard');
});
Route::middleware(['auth','role:pasien'])->prefix('pasien')->as('pasien.')->group(function () {
    Route::view('/dashboard', 'pasien.dashboard')->name('dashboard');
});

/* (Opsional) Fallback: kembali ke welcome */
Route::fallback(fn () => redirect()->route('welcome'));
