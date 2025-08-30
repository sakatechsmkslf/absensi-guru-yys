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

Route::get('login', [AuthController::class, 'viewLogin']);
Route::post('doLogin', [AuthController::class, 'login'])->name('doLogin');
Route::resource('tapel', TapelController::class);


Route::controller(PresensiController::class)->group(function () {
    Route::get('presensi', 'viewPresensi');
    Route::post('prosesPresensi', 'prosesPresensi')->name('prosesPresensi');
});
