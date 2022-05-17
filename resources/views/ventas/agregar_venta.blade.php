@extends('layouts.app')

@section('title',"Agregar Venta")

@section('content')

    <h1 class="text-center py-5">Agregar Venta</h1>

    <div class="col-8 py-4 d-flex row mx-auto">
        <form action="/ventas/agregar_venta" method="POST">
            @csrf
            <label class="form-label" for="">Nombre del cliente:</label>
            <input class="form-control" type="text" name="nombre_cliente" autocomplete="off" required>
            <br>
            <br>
            <div class="d-flex justify-content-end">
                <input class="btn btn-info" type="submit" value="Continuar">
            </div>
        </form>
    </div>


@endsection