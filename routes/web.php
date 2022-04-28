<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/ventas/agregar_venta', [PrincipalController::class, 'agregar']);
Route::get('/ventas/ver_ventas', [PrincipalController::class, 'ver']);
Route::get('/ventas/eliminar_venta/{id}', [PrincipalController::class, 'eliminar']);
Route::get('/ventas/editar_venta/{id}', [PrincipalController::class, 'muestraeditar']);
Route::get('/ventas/pdf/pdf_venta/{id}', [PrincipalController::class, 'imprimir']);
Route::post('ventas/agregar_venta', [PrincipalController::class, 'guardar']);
Route::post('/guardaedicion', [PrincipalController::class, 'guardaredicion']);

Route::get('ventas/eliminar_producto/{id}', [ProductoController::class, 'eliminar']);
Route::get('/editar_producto/{id}', [ProductoController::class, 'muestraeditar']);
Route::post('/ventas/agregar_producto', [ProductoController::class, 'guardar']);
Route::post('/guardaedicion_producto', [ProductoController::class, 'guardaredicion_producto']);