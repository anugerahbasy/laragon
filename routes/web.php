<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::get('/tentang', function () {
    return view('tentang');
});

// Route::resource('/fakultas', FakultasController::class);
Route::resource('fakultas', FakultasController::class)
    ->parameters([
        'fakultas' => 'fakultas'
    ]); // ubah parameter route menjadi fakultas (awalnya fakultas/{fakulta} menjadi fakultas/{fakultas})
Route::resource('/periode', PeriodeController::class);
Route::resource('/prodi', ProdiController::class);
Route::resource('/mahasiswa', MahasiswaController::class);


require __DIR__.'/auth.php';
//  test