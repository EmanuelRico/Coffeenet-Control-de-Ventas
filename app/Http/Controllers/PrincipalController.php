<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Productos;
use Barryvdh\DomPDF\Facade\PDF;
//use App\Models\LogVentas;

class PrincipalController extends Controller
{
    public function agregar()
    {
        $ventas = Ventas::all();
        return view('/ventas/agregar_venta')->with('ventas', $ventas);
    }

    public function ver()
    {
        $ventas = Ventas::all();
        return view('/ventas/ver_ventas')->with('ventas', $ventas);
    }

    public function imprimir($id)
    {
        $venta = Ventas::find($id);
        $productos = Productos::all()->where('id_venta', '=', $id);

        $pdf = PDF::loadView('pdf.pdf_venta', compact('venta'), compact('productos'));
        $pdf->setPaper('Letter');
        return $pdf->stream();
    }

    public function eliminar($id)
    {
        $venta = Ventas::find($id);
        $venta->delete();
        return redirect()->back();
    }

    public function muestraeditar($id)
    {
        $venta = Ventas::find($id);
        $productos = Productos::all()->where('id_venta', '=', $id);

        return view('/ventas/editar_venta')->with('venta', $venta)->with('productos', $productos);
    }

    public function guardar(Request $request)
    {
        $venta = new Ventas();
        $venta->nombre_cliente = $request->nombre_cliente;
        $venta->celular_cliente = $request->celular_cliente;
        $venta->save();

        /*$log = new LogVentas();
        $log->idventas = $ventas->id;
        $log->cantidadN = $ventas->cantidad;
        $log->ventaN = $ventas->venta;
        $log->descripcionN = $ventas->descripcion;
        $log->cantidadO = $ventas->cantidad;
        $log->ventaO = $ventas->venta;
        $log->descripcionO = $ventas->descripcion;
        $log->save();*/

        return redirect()->action('App\Http\Controllers\PrincipalController@muestraeditar', ['id' => $venta->id]);
    }

    public function guardaredicion(Request $request)
    {
        $venta = Ventas::find($request->id);

        /*$log = new LogVentas();
        $log->idventas = $ventas->id;
        $log->cantidadO = $ventas->cantidad;
        $log->ventaO = $ventas->venta;
        $log->descripcionO = $ventas->descripcion;
        $log->cantidadN = $request->cantidad;
        $log->ventaN = $request->venta;
        $log->descripcionN = $request->descripcion;
        */

        $venta->nombre_cliente = $request->nombre_cliente;
        $venta->celular_cliente = $request->celular_cliente;
        $venta->adelanto = $request->adelanto;
        $venta->preciot = $request->preciot;
        $venta->save();

        //$log->save();

        return redirect('/ventas/ver_ventas');
    }
}
