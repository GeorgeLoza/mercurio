<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubrutaAcopio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'detalle',
        'ruta_acopio_id',
    ];
    public function ruta_acopio()
    {
        return $this->belongsTo(RutaAcopio::class);
    }
    public function recepcion_leche()
    {
        return $this->hasMany(RecepcionLeche::class);
    }
}
