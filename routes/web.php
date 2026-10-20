<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

//ver la pagina del login
Route::get('/login',[AuthController::class, 'showLogin'])->name('login');;

//enviar lso datos email y contraseña al cerebro
Route::post('/login', [AuthController::class, 'login']);

//ver el dashboard
Route::get('/dashboard', [TaskController::class, 'index'])->middleware('auth');