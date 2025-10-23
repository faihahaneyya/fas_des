<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PeminjamanController;

// Route untuk dashboard
Route::get('/', function () {
    return view('guest.dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('guest.dashboard');
})->name('dashboard');

// Routes CRUD Warga
Route::resource('warga', WargaController::class);

// Routes CRUD Fasilitas
Route::get('/fasilitas', function () {
    return view('guest.fasilitas.index');
})->name('fasilitas.index');

Route::get('/fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
Route::post('/fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
Route::get('/fasilitas/{id}', [FasilitasController::class, 'show'])->name('fasilitas.show');
Route::get('/fasilitas/{id}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
Route::put('/fasilitas/{id}', [FasilitasController::class, 'update'])->name('fasilitas.update');
Route::delete('/fasilitas/{id}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');

// Form peminjaman
Route::get('/BalaiDesa/form-peminjaman', [PeminjamanController::class, 'create'])
    ->name('BalaiDesa.form-peminjaman');

    Route::get('/peminjaman/success', [PeminjamanController::class, 'success'])
    ->name('peminjaman.success');
// Resource route untuk peminjaman (CRUD otomatis)
Route::resource('peminjaman', PeminjamanController::class);
// Route tambahan untuk halaman sukses peminjaman


// kita exclude 'create' karena form khusus sudah ada di /BalaiDesa/form-peminjaman

// Route tambahan untuk halaman sukses peminjaman

Route::get('/guest/formlogin', function () {
    // Hapus semua session
    session()->flush();

    // Tampilkan langsung halaman login
    return view('guest.formlogin')->with('pesan', 'Anda telah logout.');
});

//Route::resource('auth', AuthController::class);

// Tampilkan form login
Route::get('/guest/formlogin', [AuthController::class, 'index'])->name('auth.index');

// Proses login (POST)
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

// Logout
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');


