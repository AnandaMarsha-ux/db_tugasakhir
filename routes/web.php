<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PengembalianBukuController;
use App\Http\Controllers\PeminjamanController;
use App\Models\Buku;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/register');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| DASHBOARD USER (DATA PERPUSTAKAAN)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-user', function () {
    $buku = Buku::all();
    return view('dashboard-user', compact('buku'));
})->middleware('auth');

/*
|--------------------------------------------------------------------------
| CRUD PERPUSTAKAAN
|--------------------------------------------------------------------------
*/
Route::resource('perpustakaan', PerpustakaanController::class)
    ->middleware('auth');

/*
|-------------------------------------------------------------------------- 
| CRUD PENGUNJUNG
|-------------------------------------------------------------------------- 
*/
Route::resource('pengunjung', PengunjungController::class)
    ->middleware('auth');

/*
|-------------------------------------------------------------------------- 
| PENGEMBALIAN BUKU
|-------------------------------------------------------------------------- 
*/
Route::get('/pengembalian-buku', 
    [PengembalianBukuController::class, 'index']
)->middleware('auth')->name('pengembalian.index');

Route::post('/pengembalian-buku', 
    [PengembalianBukuController::class, 'store']
)->middleware('auth')->name('pengembalian.store');

Route::delete('/pengembalian-buku/{id}', 
    [PengembalianBukuController::class, 'destroy']
)->middleware('auth')->name('pengembalian.destroy');

Route::get('/peminjaman', [PeminjamanController::class, 'index'])
    ->name('peminjaman');

Route::post('/peminjaman', [PeminjamanController::class, 'store'])
    ->name('peminjaman.store');
