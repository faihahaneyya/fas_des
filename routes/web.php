<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PeminjamanController;

// =========================
// DASHBOARD
// =========================
// Route::get('/', function () {
//     return view('guest.dashboard');
// })->name('dashboard');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('layouts.guest.dashboard');
// });

// =========================
// HALAMAN TENTANG
// =========================
Route::get('/tentang', function () {
    return view('layouts.guest.tentang');
})->name('tentang');

// =========================
// HALAMAN KONTAK
// =========================
Route::get('/kontak', function () {
    return view('layouts.guest.kontak');
})->name('kontak');

// =========================
// AUTH (LOGIN & REGISTER)
// =========================

// Halaman login
Route::get('/guest/formlogin', [AuthController::class, 'index'])->name('login');

// Proses login
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

// Halaman register
Route::get('/guest/formregister', [AuthController::class, 'register'])->name('register');

// Proses register
Route::post('/guest/formregister', [AuthController::class, 'storeRegister'])->name('auth.register');

// Logout
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

// =========================
// CRUD WARGA
// =========================
Route::resource('warga', WargaController::class);

// =========================
// CRUD FASILITAS
// =========================
Route::get('/fasilitas', function () {
    return view('guest.fasilitas.index');
})->name('fasilitas.index');

Route::get('/fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
Route::post('/fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
Route::get('/fasilitas/{id}', [FasilitasController::class, 'show'])->name('fasilitas.show');
Route::get('/fasilitas/{id}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
Route::put('/fasilitas/{id}', [FasilitasController::class, 'update'])->name('fasilitas.update');
Route::delete('/fasilitas/{id}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');
Route::resource('users', UserController::class);

// =========================
// PEMINJAMAN FASILITAS
// =========================

// Form peminjaman khusus
Route::get('/BalaiDesa/form-peminjaman', [PeminjamanController::class, 'create'])
    ->name('BalaiDesa.form-peminjaman');

// Halaman sukses peminjaman
Route::get('/peminjaman/success', [PeminjamanController::class, 'success'])
    ->name('peminjaman.success');

// Resource route untuk peminjaman (CRUD otomatis)
Route::resource('peminjaman', PeminjamanController::class)
    ->except(['create']); // create khusus sudah ada di /BalaiDesa/form-peminjaman
    
