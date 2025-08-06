<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;

// Redirect halaman utama ke halaman absensi
Route::get('/', function () {
    return redirect()->route('absensi.index');
});

// Route untuk operasi CRUD absensi
Route::resource('absensi', AbsensiController::class);

// Route untuk melakukan check-out
Route::patch('absensi/{id}/checkout', [AbsensiController::class, 'checkout'])->name('absensi.checkout');

// Route untuk menghapus semua data absensi
Route::delete('absensi/clear-all', [AbsensiController::class, 'clearAll'])->name('absensi.clearAll');
