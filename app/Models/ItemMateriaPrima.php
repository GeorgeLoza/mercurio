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
        'nivel_inspeccion',
        'nca_max',
        'nca_min',
        'Nivel_dilucion',
        'temp_max',
        'temp_min',
        'ph_max',
        'ph_min',
        'solidos_max',
        'solidos_min',
        'acidez_max',
        'acidez_min',
        'densidad_max',
        'densidad_min',
        'viscosidad_max',
        'viscosidad_min',
        'organoleptica',


    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaMateriaPrima::class, 'categoria_materia_prima_id');
    }
    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id');
    }
}
