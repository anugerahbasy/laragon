<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/debug-env', function () {
    return 'APP_KEY is: ' . (env('APP_KEY') ? 'Detected' : 'Empty');
});
