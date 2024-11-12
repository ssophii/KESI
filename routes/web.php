<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;


Route::get('/', function () {
    return view('welcome');
});

Route::put('/admin/riwayat/{id}', [AdminController::class, 'updateRiwayat'])->name('admin.updateRiwayat');
Route::delete('/admin/riwayat/{id}', [AdminController::class, 'deleteRiwayat'])->name('admin.deleteRiwayat');
Route::post('/admin/riwayat/store', [AdminController::class, 'storeRiwayat'])->name('admin.storeRiwayat');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/riwayat-kesehatan', [AdminController::class, 'riwayatKesehatan'])->name('admin.riwayat-kesehatan');
});

Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
    // Route::get('/admin/pemasukkan', [ProfileController::class, 'pemasukkan'])->name('bendahara.pemasukan');
});

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
    // Route::get('/admin/pemasukkan', [ProfileController::class, 'pemasukkan'])->name('bendahara.pemasukan');
});

require __DIR__.'/auth.php';
