<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.main');
});

Route::resource('user', UsersController::class);
Route::resource('role', RoleController::class);
