@extends('layouts.app')

@section('title',"Página Principal")

@section('content')

<div class="container">
    <div class="row my-5">
        <div class="col-12 d-flex justify-content-evenly my-4">
            <a class="btn btn-outline-primary principal-btn py-4 fw-bold fs-2" href="/ventas/agregar_ventas">Agregar Venta</a>
            <a class="btn btn-outline-primary principal-btn py-4 fw-bold fs-2" href="/ventas/ver_ventas">Ver Ventas</a>
        </div>

        <div class="col-12 d-flex justify-content-evenly my-4">
            <a class="btn btn-outline-primary principal-btn py-4 fw-bold fs-2">hola</a>
            <a class="btn btn-outline-primary principal-btn py-4 fw-bold fs-2">hola</a>

        </div>
    
    </div>
</div>

@endsection
