<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\Tipo_usuariosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\Tipos_ventasController;
use App\Http\Controllers\Tipos_pagosController;
use App\Http\Controllers\Fotos_productosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::resource('tiendas', TiendasController::class);
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('categorias', CategoriasController::class);
    Route::resource('tipo_usuarios', Tipo_usuariosController::class);
    Route::resource('proveedores', ProveedoresController::class);
    Route::resource('tipos_ventas', Tipos_ventasController::class);
    Route::resource('tipos_pagos', Tipos_pagosController::class);
    Route::resource('fotos_productos', Fotos_productosController::class);
    Route::resource('productos', ProductosController::class);
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::resource('clientes', ClientesController::class);
});

// Rutas agregadas para realizar la aunteticación
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');