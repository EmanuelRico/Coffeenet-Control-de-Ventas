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
        $producto->preciou = floatval($request->preciou);
        $producto->importe = floatval($request->importe);
        $producto->id_venta = $request->id_venta;
        $producto->save();

        return redirect()->back();
    }

    public function guardaredicion_producto(Request $request)
    {
        $producto = Productos::find($request->id);

        $producto->cantidad = $request->cantidad;
        $producto->producto = $request->producto;
        $producto->descripcion = $request->descripcion;
        $producto->preciou = floatval($request->preciou);
        $producto->importe = floatval($request->importe);
        
        $producto->save();

        return redirect()->back();
    }
}
