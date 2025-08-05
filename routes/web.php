<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.main');
});

Route::view('user', 'user.main');
Route::view('userEdit', 'user.edit');
Route::view('userTambah', 'user.tambah');
