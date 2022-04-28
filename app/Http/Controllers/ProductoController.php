<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductoController extends Controller
{

    public function eliminar($id)
    {
        $producto = Productos::find($id);
        $producto->delete();
        return redirect()->back();
    }

    public function muestraeditar($id)
    {
        $producto = Productos::find($id);

        return view('editar')->with('producto', $producto);
    }

    public function guardar(Request $request)
    {
        $producto = new Productos();
        $producto->cantidad = $request->cantidad;
        $producto->producto = $request->producto;
        $producto->descripcion = $request->descripcion;
        $producto->preciou = $request->preciou;
        $producto->importe = $request->importe;
        $producto->id_venta = $request->id_venta;
        $producto->save();

        /*$log = new logproductos();
        $log->idproducto = $producto->id;
        $log->articuloN = $producto->articulo;
        $log->cantidadN = $producto->cantidad;
        $log->fecha_terminacionN = $producto->fecha_terminacion;
        $log->save();*/

        return redirect()->back();
    }

    public function guardaredicion_producto(Request $request)
    {
        $producto = Productos::find($request->id);

        /*$log = new logproductos();
        $log->idproducto = $producto->id;
        $log->articuloO = $producto->articulo;
        $log->cantidadO = $producto->cantidad;
        $log->fecha_terminacionO = $producto->fecha_terminacion;
        $log->articuloN = $request->articulo;
        $log->cantidadN = $request->cantidad;
        $log->fecha_terminacionN = $request->fecha_terminacion;*/

        $producto->cantidad = $request->cantidad;
        $producto->producto = $request->producto;
        $producto->descripcion = $request->descripcion;
        $producto->preciou = $request->preciou;
        $producto->importe = $request->importe;
        
        $producto->save();
        //$log->save();

        return redirect()->back();
    }
}
