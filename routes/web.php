<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeriodeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang', function () {

    return view('tentang');
    
});

Route::resource('/fakultas', FakultasController::class);
Route::resource('/periode', PeriodeController::class);