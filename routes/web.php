<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\SoalController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('FormRegister');

Route::get('/soal', function () {
    return view('aplikasitryout.soal');
});

Route::get('/hasil', function () {
    return view('aplikasitryout.hasil');
});
