<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cambio extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'imagen1',
        'roles',
        'nota',
    ];
    protected $casts = [
        'roles' => 'array', // Esto convierte el JSON a array automáticamente
    ];
}
