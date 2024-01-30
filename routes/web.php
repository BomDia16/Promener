<?php

use App\Http\Controllers\CachorroController;
use App\Http\Controllers\PasseadorController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// User
Route::resources(['/user' => UserController::class]);
Route::get('/login', [UserController::class, 'index_login'])->name('user.login-view');
Route::get('/register', [UserController::class, 'index_register'])->name('user.register');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/user/logout', [UserController::class, 'logout'])->name('user.logout');

// Cachorro
Route::resources(['/cachorro' => CachorroController::class]);

// Passeador
Route::resources(['/passseador' => PasseadorController::class]);
Route::get('/passeador/login', [PasseadorController::class, 'index_login'])->name('passeador.login-view');
Route::get('/passeador/register', [PasseadorController::class, 'index_register'])->name('passeador.register');
Route::post('/passeador/login-envia', [PasseadorController::class, 'login'])->name('passeador.login');
Route::post('/passeador/logout', [PasseadorController::class, 'logout'])->name('passeador.logout');

// Pedidos
Route::resources(['/pedido' => PedidoController::class]);
Route::get('/passeador/pedido', [PedidoController::class, 'passeador'])->name('passeador.pedido');