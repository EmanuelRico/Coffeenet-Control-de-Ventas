<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $table = 'ventas';
    protected $fillable=[
        'nombre_cliente',
        'celular_cliente',
        'adelanto' => 'decimal:2',
        'preciot' => 'decimal:2'
    ];
}
