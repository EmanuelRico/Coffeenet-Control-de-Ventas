<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProductoController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VentasExport;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/register', function () {
    if(Auth::user()->type==2){
        return redirect('/login');
    }
    else{
        return redirect('/login') ;
    }
})->name('register');

Route::get('/ventas/agregar_venta', [PrincipalController::class, 'agregar']);
Route::get('/ventas/ver_ventas', [PrincipalController::class, 'ver']);
Route::get('/ventas/eliminar_venta/{id}', [PrincipalController::class, 'eliminar']);
Route::post('/ventas/eliminar_ventas', [PrincipalController::class, 'eliminarventas']);
Route::get('/ventas/editar_venta/{id}', [PrincipalController::class, 'muestraeditar']);
Route::get('/ventas/pdf/pdf_venta/{id}', [PrincipalController::class, 'imprimir']);
Route::get('/ventas/pdf/pdf_venta_global/', [PrincipalController::class, 'imprimirglobal']);
Route::post('/ventas/agregar_venta', [PrincipalController::class, 'guardar']);
Route::post('/guardaedicion', [PrincipalController::class, 'guardaredicion']);

Route::get('/eliminar_producto/{id}', [ProductoController::class, 'eliminar']);
Route::get('/editar_producto/{id}', [ProductoController::class, 'muestraeditar']);
Route::post('/ventas/agregar_producto', [ProductoController::class, 'guardar']);
Route::post('/guardaedicion_producto', [ProductoController::class, 'guardaredicion_producto']);

Route::get('/ventas/reporte_ventas', [PrincipalController::class, 'grafica']);
Route::get('/nosotros', [PrincipalController::class, 'nosotros']);
Route::get('/productos', [PrincipalController::class, 'productos']);

Route::get('/export-csv', function () {
    return Excel::download(new VentasExport, 'ventas.csv');
});