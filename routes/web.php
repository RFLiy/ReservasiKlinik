<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
    Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::delete('/reservasi/{id}/cancel', [ReservasiController::class, 'cancel'])->name('reservasi.cancel');

    // Route Riwayat (jika sudah ada)
    Route::get('/riwayat', [ReservasiController::class, 'riwayat'])->name('riwayat');
    Route::get('/cek-jadwal', [App\Http\Controllers\ReservasiController::class, 'cekJadwal'])->name('cek.jadwal');
});

require __DIR__.'/auth.php';
