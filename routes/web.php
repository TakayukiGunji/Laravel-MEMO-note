<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "こんにちは、Laravel！";
});

use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);
