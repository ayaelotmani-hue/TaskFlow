<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

// 1. Ver la página del login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// 2. Enviar los datos email y contraseña al cerebro
Route::post('/login', [AuthController::class, 'login']);

// 3. Ver el dashboard principal con contadores
Route::get('/dashboard', [TaskController::class, 'index'])->middleware('auth');

// 4. Ver el listado de tareas (tabla)
Route::get('/tareas', [TaskController::class, 'listado'])->name('tasks.index')->middleware('auth');

// 5. CARRETERA NUEVA: Abrir y VER el formulario de creación en pantalla
Route::get('/tareas/crear', [TaskController::class, 'create'])->name('tasks.create')->middleware('auth');

// 6. Recibir los datos del formulario y guardarlos en MySQL
Route::post('/tareas/crear', [TaskController::class, 'store'])->name('tasks.store')->middleware('auth');