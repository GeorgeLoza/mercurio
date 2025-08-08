<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMateriaPrima extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'categoria_materia_prima_id',
        'codigo',
        'unidad_id',
        'descripcion',

    ];
}
