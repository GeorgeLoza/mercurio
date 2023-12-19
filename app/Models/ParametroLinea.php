<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametroLinea extends Model
{
    use HasFactory;
    protected $fillable = [
        'producto_id',
        'etapa_id',
        'origen_id',
        'temperatura_min',
        'temperatura_max',
        'ph_min',
        'ph_max',
        'acidez_min',
        'acidez_max',
        'brix_min',
        'brix_max',
        'viscosidad_min',
        'viscosidad_max',
        'densidad_min',
        'densidad_max',
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    public function etapa()
    {
        return $this->belongsTo(Etapa::class);
    }
    public function origen()
    {
        return $this->belongsTo(Origen::class);
    }
}
