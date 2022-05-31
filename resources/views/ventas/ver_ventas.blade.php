@extends('layouts.app')

@section('title', 'Ver Ventas')

@section('content')
    <div class="container">
        <h1 class="text-center pt-5 mb-5">Ventas</h1>
        <div class="d-flex justify-content-end">
            @if ($contador > 0)
                <a href="/ventas/pdf/pdf_venta_global/" class="btn btn-outline-primary border-3 me-2">Reporte de ventas
                    acumuladas</a>
                <button type="button" class="btn btn-outline-danger border-3 me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar todas
                    las ventas</button>
                <a href="/export-csv" class="btn btn-primary">Exportar Excel</a>
            @endif
        </div>
        @if ($contador == 0)
            <h1 class="text-center mt-5 mb-5">No hay ventas para mostrar.</h1>
        @else
            <div class="col-10 mx-auto bg-white py-2 px-3 my-2 d-flex row justify-content-center align-items-center mt-5">
                <table class="table table-striped shadow-sm rounded">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Cliente</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Anticipo</th>
                            <th scope="col">Importe de Venta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $adelantof=0; $preciotf = 0;?>
                        @foreach ($ventas as $venta)
                            <tr class="text-center">
                                <td>{{ $venta->nombre_cliente }}</td>
                                <td>{{ $venta->celular_cliente }}</td>
                                <?php $adelantof = number_format($venta->adelanto, 2); ?>
                                <td>${{ $adelantof }}</td>
                                <?php $preciotf = number_format($venta->preciot, 2); ?>
                                <td>${{ $preciotf }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger border-3 me-2" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $venta->id }}">Eliminar</button>
                                    <a class="btn btn-info me-3" href="/ventas/editar_venta/{{ $venta->id }}">Editar</a>
                                    <a class="fa-regular fa-file-pdf fa-2xl me-3"
                                        href="/ventas/pdf/pdf_venta/{{ $venta->id }}"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar todas las ventas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro/a de eliminar todas las ventas?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary border-3"
                                data-bs-dismiss="modal">Cancelar</button>
                            <form action="/ventas/eliminar_ventas" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar las ventas</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($ventas as $venta)
            <div class="modal fade" id="exampleModal2{{ $venta->id }}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Eliminar Venta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro/a de eliminar esta venta?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary border-3"
                                data-bs-dismiss="modal">Cancelar</button>
                            <a class="btn btn-danger mx-3" href="/ventas/eliminar_venta/{{ $venta->id }}">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection
