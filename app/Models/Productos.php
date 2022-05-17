<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $fillable=[
        'cantidad',
        'producto',
        'descripcion',
        'preciou' => 'decimal:2',
        'importe' => 'decimal:2'
    ];
}
