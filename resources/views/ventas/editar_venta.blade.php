@extends('layouts.app')

@section('title',"Editar Venta")

@section('content')

<div class="container">
    <h1 class="text-center pt-5">Editar venta</h1>

    <div class="col-8 py-4 d-flex row mx-auto bg-white">
        <form action="/guardaedicion" method="POST">
            @csrf
            <input type="hidden" name="id" id="" value="{{$venta->id}}">
            <label class="form-label" for="">Nombre del cliente:</label>
            <input class="form-control" type="text" name="nombre_cliente" autocomplete="off" value="{{$venta->nombre_cliente}}" required>
            <br>
            <br>
            <label class="form-label" for="">Celular del cliente:</label>
            <input class="form-control" type="number" name="celular_cliente" autocomplete="off" value="{{$venta->celular_cliente}}">
            <br>
            <br>
            <div class="d-flex justify-content-center align-items-center text-center">
                <button type="button" class="btn btn-outline-primary border-3 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Agregar Producto
                </button>
            </div>
            <div>
                <?php $preciouf = 0; $importef = 0;?>
                @foreach($productos as $producto)
                <?php $preciouf = number_format($producto->preciou, 2); ?>
                <?php $importef = number_format($producto->importe, 2); ?>
                <p class="fw-bold border rounded p-3 my-1 mb-3">Cantidad: {{$producto->cantidad}} | Producto: {{$producto->producto}} | Descripción: {{$producto->descripcion}} | Precio por unidad: ${{$preciouf}} | IMPORTE: ${{$importef}} <a class="btn btn-danger mx-3" href="/eliminar_producto/{{$producto->id}}">Eliminar</a> <a class="btn btn-info me-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{$producto->id}}">Editar</a></p>
                @endforeach
            </div>
            <br>
            <label class="form-label" for="">Anticipo:</label>
            <input class="form-control" type="number" step="0.01" name="adelanto" autocomplete="off" value="{{$venta->adelanto}}" required>
            <br>
            <br>
            <label class="form-label" for="">Precio total:</label>
            <input class="form-control" type="number" step="0.01" name="preciot" autocomplete="off" value="{{$venta->preciot}}" required>
            <br>
            <br>
            <div class="d-flex justify-content-end">
                <input class="btn btn-primary" type="submit" value="Confirmar Venta">
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <form action="/ventas/agregar_producto" method="POST">
                    @csrf
                    <label class="form-label" for="">Cantidad:</label>
                    <input class="form-control" type="number" name="cantidad" autocomplete="off" required>
                    <br>
                    <br>
                    <label class="form-label" for="">Producto:</label>
                    <input class="form-control" type="text" name="producto" id="" autocomplete="off" required>
                    <br>
                    <br>
                    <label class="form-label" for="">Descripción:</label>
                    <textarea class="form-control" name="descripcion" id="" rows="5" autocomplete="off" required></textarea>
                    {{-- <input class="form-control" type="text" name="descripcion" id="" autocomplete="off" required> --}}
                    <br>
                    <br>
                    <label class="form-label" for="">Precio por unidad:</label>
                    <input class="form-control" type="number" step="0.01" name="preciou" autocomplete="off" required>
                    <br>
                    <br>
                    <label class="form-label" for="">Importe:</label>
                    <input class="form-control" type="number" step="0.01" name="importe" autocomplete="off" required>
                    <input type="hidden" name="id_venta" value="{{$venta->id}}">
                    <br>
                    <br>
                    <div class="d-flex justify-content-end modal-footer pb-0 pe-0 pt-3">
                        <input class="btn btn-primary " type="submit" value="Agregar">
                        <button type="button" class="btn btn-danger me-0" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($productos as $producto)
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$producto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel{{$producto->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/guardaedicion_producto" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="inp-id" value="{{$producto->id}}">
                        <label class="form-label" for="">Cantidad:</label>
                        <input class="form-control" type="number" name="cantidad" id="inp-cantidad" value="{{$producto->cantidad}}" autocomplete="off" required>
                        <br>
                        <br>
                        <label class="form-label" for="">Producto:</label>
                        <input class="form-control" type="text" name="producto" id="inp-producto" value="{{$producto->producto}}" autocomplete="off" required>
                        <br>
                        <br>
                        <label class="form-label" for="">Descripción:</label>
                        <textarea class="form-control" name="descripcion" id="inp-descripcion" rows="5" autocomplete="off" required>{{$producto->descripcion}}</textarea>
                        {{-- <input class="form-control" type="text" name="descripcion" id="inp-descripcion" value="{{$producto->descripcion}}" autocomplete="off" required> --}}
                        <br>
                        <br>
                        <label class="form-label" for="">Precio por unidad:</label>
                        <input class="form-control" type="number" step="0.01" name="preciou" id="inp-preciou" value="{{$producto->preciou}}" autocomplete="off" required>
                        <br>
                        <br>
                        <label class="form-label" for="">Importe:</label>
                        <input class="form-control" type="number" step="0.01" name="importe" id="inp-importe" value="{{$producto->importe}}" autocomplete="off" required>
                        <br>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

@endsection