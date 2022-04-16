@extends('layouts.app')

@section('title',"Agregar Venta")

@section('content')

<div class="container">
    <h1 class="text-center mt-5">Agregar Venta</h1>

    <div class="col-8 py-4 d-flex row mx-auto bg-white">
        <form action="/ventas/agregar_ventas" method="POST">
            @csrf
            <label class="form-label" for="">Cantidad:</label>
            <input class="form-control" type="number" name="cantidad" autocomplete="off">
            <br>
            <br>
            <label class="form-label" for="">Titulo:</label>
            <input class="form-control" type="text" name="venta" id="" autocomplete="off">
            <br>
            <br>
            <label class="form-label" for="">Descripción:</label>
            <input class="form-control" type="text" name="descripcion" id="" autocomplete="off">
            <br>
            <br>
            <label class="form-label" for="">Precio por unidad:</label>
            <input class="form-control" type="number" step="0.01" name="preciou" autocomplete="off">
            <br>
            <br>
            <label class="form-label" for="">Precio total:</label>
            <input class="form-control" type="number" step="0.01" name="preciot" autocomplete="off">
            <br>
            <br>
            <div class="d-flex justify-content-end">
                <input class="btn btn-primary " type="submit" value="Agregar">
            </div>
        </form>
    </div>
</div>

@endsection