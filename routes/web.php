<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaisController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\DeportistaController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('login.iniciarSesion');
});

Route::resource('pais',PaisController::class);
Route::resource('disciplina',DisciplinaController::class);
Route::resource('deportista',DeportistaController::class);
Route::resource('user',UserController::class);

Route::get('/admin/inicio', function () {
    return view('layout.admin');
});


Route::post('/login', [UserController::class, 'login'])->name('users.login');

Route::get('/login', function () {
    return view('login.iniciarSesion');
})->name('login');  

Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

