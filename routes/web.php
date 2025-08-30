<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TapelController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.main');
});

Route::resource('user', UsersController::class);
Route::resource('role', RoleController::class);
Route::resource('instansi', InstansiController::class);
Route::view('loginjal','auth.login');
Route::view('jadwal','jadwal.tambah');

Route::get('login', [AuthController::class, 'viewLogin']);
Route::post('doLogin', [AuthController::class, 'login'])->name('doLogin');
Route::resource('tapel', TapelController::class);

Route::get('/dashboard', function () {
    return view('dashboard.main');
})->name('dashboard');

Route::controller(PresensiController::class)->group(function () {
    Route::get('presensi', 'viewPresensi');
});
