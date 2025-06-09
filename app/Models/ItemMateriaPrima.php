<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMateriaPrima extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo', 'nombre', 'nivel_inspeccion', 'nca_max', 'nca_min',
        'Nivel_dilucion', 'temp_max', 'temp_min', 'ph_max', 'ph_min',
        'solidos_max', 'solidos_min', 'acidez_max', 'acidez_min',
        'densidad_max', 'densidad_min', 'viscosidad_max', 'viscosidad_min',
        'organoleptica', 'categoria_materia_prima_id', 'unidad_id'
    ];


    public function categoria()
    {
        return $this->belongsTo(CategoriaMateriaPrima::class);
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }
}
