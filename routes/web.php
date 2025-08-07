<?php

use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.main');
});

Route::resource('user', UsersController::class);
Route::view('/login','login');
