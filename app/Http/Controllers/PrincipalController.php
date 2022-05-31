<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Productos;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;

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
        $contador = count(Ventas::all());
        return view('/ventas/ver_ventas')->with('ventas', $ventas)->with('contador', $contador);
    }

    public function imprimir($id)
    {
        $venta = Ventas::find($id);
        $productos = Productos::all()->where('id_venta', '=', $id);

        $pdf = PDF::loadView('pdf.pdf_venta', compact('venta'), compact('productos'));
        $pdf->setPaper('Letter');
        return $pdf->stream();
    }

    public function imprimirglobal()
    {

        $result = DB::select(DB::raw("SELECT DATE_FORMAT(fecha, '%d/%m/%y') AS fechas, SUM(preciot) AS ventasdiarias FROM ventas GROUP BY fecha"));

        $pdf = PDF::loadView('pdf.pdf_venta_global', compact('result'));
        $pdf->setPaper('Letter');
        return $pdf->stream();
    }

    public function grafica()
    {
        $result = DB::select(DB::raw("SELECT DATE_FORMAT(fecha, '%d/%m') AS fechas, SUM(preciot) AS ventasdiarias FROM ventas GROUP BY fecha"));
        $data = "";
        $contador = count(Ventas::all());

        foreach ($result as $val) {
            $data .= "['" . $val->fechas . "', " .$val->ventasdiarias . "],";
        }

        return view('/ventas/reporte_ventas', compact('data'))->with('contador', $contador);
    }

    public function nosotros()
    {
        return view('/nosotros');
    }

    public function productos()
    {
        return view('/productos');
    }

    public function eliminar($id)
    {
        $venta = Ventas::find($id);
        $venta->delete();
        return redirect()->back();
    }

    public function eliminarventas()
    {
        DB::table('ventas')->delete();
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
        $venta->fecha = now()->format('y/m/d');
        $venta->save();

        return redirect()->action('App\Http\Controllers\PrincipalController@muestraeditar', ['id' => $venta->id]);
    }

    public function guardaredicion(Request $request)
    {
        $venta = Ventas::find($request->id);

        $venta->nombre_cliente = $request->nombre_cliente;
        $venta->celular_cliente = $request->celular_cliente;
        $venta->adelanto = floatval($request->adelanto);
        $venta->preciot = floatval($request->preciot);
        $venta->save();

        //$log->save();

        return redirect('/ventas/ver_ventas');
    }
}
