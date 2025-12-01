<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaisController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('login.iniciarSesion');
});

Route::resource('pais',PaisController::class);
Route::get('/admin/inicio', function () {
    return view('layout.admin');
});


Route::post('/login', [UserController::class, 'login'])->name('users.login');
