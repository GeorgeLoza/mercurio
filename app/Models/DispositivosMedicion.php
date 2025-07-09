<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositivosMedicion extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'dispositivo',
        'marca',
        'modelo',
        'capacidadMedicion',
        'rangoUso',
        'areaUso',
        'responsable',
        'baja',
        'observaciones',
    ];
}
