@extends('layouts.app')

@section('title',"Editar Venta")

@section('content')

<div class="container">
    <h1 class="text-center mt-5">Editar venta</h1>

    <div class="col-8 py-4 d-flex row mx-auto bg-white">
        <form action="/guardaedicion" method="POST">
            @csrf
            <input type="hidden" name="id" id="" value="{{$venta->id}}">
            <label class="form-label" for="">Cantidad:</label>
            <input class="form-control" type="number" name="cantidad" autocomplete="off" value="{{$venta->cantidad}}">
            <br>
            <br>
            <label class="form-label" for="">Titulo:</label>
            <input class="form-control" type="text" name="venta" id="" autocomplete="off" value="{{$venta->venta}}">
            <br>
            <br>
            <label class="form-label" for="">Descripción:</label>
            <input class="form-control" type="text" name="descripcion" id="" autocomplete="off" value="{{$venta->descripcion}}">
            <br>
            <br>
            <label class="form-label" for="">Precio por unidad:</label>
            <input class="form-control" type="number" step="0.01" name="preciou" autocomplete="off" value="{{$venta->preciou}}">
            <br>
            <br>
            <label class="form-label" for="">Precio total:</label>
            <input class="form-control" type="number" step="0.01" name="preciot" autocomplete="off" value="{{$venta->preciot}}">
            <br>
            <br>
            <div class="d-flex justify-content-end">
                <input class="btn btn-warning" type="submit" value="Aceptar">
            </div>
        </form>
    </div>
</div>

@endsection