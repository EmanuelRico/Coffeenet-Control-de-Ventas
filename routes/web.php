<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;

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

Route::get('/ventas/agregar_ventas', [PrincipalController::class, 'agregar']);
Route::get('/ventas/ver_ventas', [PrincipalController::class, 'ver']);
Route::get('/ventas/eliminar_venta/{id}', [PrincipalController::class, 'eliminar']);
Route::get('/ventas/editar_venta/{id}', [PrincipalController::class, 'muestraeditar']);

Route::post('ventas/agregar_ventas', [PrincipalController::class, 'guardar']);
Route::post('/guardaedicion', [PrincipalController::class, 'guardaredicion']);
