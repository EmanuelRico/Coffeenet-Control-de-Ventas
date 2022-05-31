<?php

namespace App\Exports;

use App\Models\Ventas;
use Maatwebsite\Excel\Concerns\FromCollection;

class VentasExport implements FromCollection
{

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return ["id", "nombre_cliente", "celular_cliente", "adelanto", "preciot"];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ventas::select('id', 'nombre_cliente', 'celular_cliente', 'adelanto', 'preciot')->get();
    }
}
