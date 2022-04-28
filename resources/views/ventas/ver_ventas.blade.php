@extends('layouts.app')

@section('title',"Ver Ventas")

@section('content')

<div class="container">
    <h1 class="text-center pt-5">Ventas</h1>

    <div class="col-10 mx-auto bg-white py-2 px-3 my-2 d-flex row justify-content-center align-items-center">
        @foreach($ventas as $venta)
        <p class="fw-bold border rounded p-2 my-1">Cliente: {{$venta->nombre_cliente}} | Celular: {{$venta->celular_cliente}} | Importe de venta: ${{$venta->preciot}} <a class="btn btn-danger mx-3" href="/ventas/eliminar_venta/{{$venta->id}}">Eliminar</a> <a class="btn btn-info me-3" href="/ventas/editar_venta/{{$venta->id}}">Editar</a> <a class="fa-regular fa-file-pdf fa-2xl me-3" href="/ventas/pdf/pdf_venta/{{$venta->id}}"></a></p> 
        @endforeach
    </div>
</div>

@endsection