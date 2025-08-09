<?php

use App\Http\Controllers\InstansiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.main');
});

Route::resource('instansi', InstansiController::class);
