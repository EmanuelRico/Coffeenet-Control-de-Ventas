<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
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

        $pdf = PDF::loadView('pdf.pdf_venta', compact('venta'));
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

        return view('/ventas/editar_venta')->with('venta', $venta);
    }

    public function guardar(Request $request)
    {
        $venta = new Ventas();
        $venta->cantidad = $request->cantidad;
        $venta->venta = $request->venta;
        $venta->descripcion = $request->descripcion;
        $venta->preciou = $request->preciou;
        $venta->preciot = $request->preciot;
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

        return redirect('/dashboard');
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

        $venta->cantidad = $request->cantidad;
        $venta->venta = $request->venta;
        $venta->descripcion = $request->descripcion;
        $venta->preciou = $request->preciou;
        $venta->preciot = $request->preciot;
        $venta->save();

        //$log->save();

        return redirect('/ventas/ver_ventas');
    }
}
