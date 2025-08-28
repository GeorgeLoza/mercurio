<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecepcionLote extends Model
{
    use HasFactory;

    protected $fillable = [
        'recepcion_materia_prima_id',
        'lote',
        'fecha_elaboracion',
        'fecha_vencimiento',
    ];

    public function recepcionMateriaPrima()
    {
        return $this->belongsTo(RecepcionMateriaPrima::class);
    }
}
