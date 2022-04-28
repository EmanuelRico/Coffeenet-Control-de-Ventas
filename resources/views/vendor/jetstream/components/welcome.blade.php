@extends('layouts.app')

@section('title',"Página Principal")

@section('content')

<h1 class="text-center pt-5">Bienvenida/o a tu sistema de control de ventas.</h1>
<h2 class="text-center">Por favor escoge una acción</h2>

<div class="container d-flex justify-content-center align-items-center mt-5 mb-5">
        <div class="col-10 d-flex justify-content-between align-items-center">
            <a class="btn btn-outline-primary principal-btn py-4 fw-bold fs-2" href="/ventas/agregar_venta">Agregar Venta</a>
            <a class="btn btn-outline-primary principal-btn py-4 fw-bold fs-2" href="/ventas/ver_ventas">Ver Ventas</a>
        </div>
</div>

@endsection
