<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosPlantas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'envase',
        'neto',
        'unidad',
        'planta_id',
    ];
    
    public function planta()
    {
        return $this->belongsTo(Planta::class);
    }
    public function detalleSolicitudPlanta()
    {
        return $this->hasMany(DetalleSolicitudPlanta::class);
    }

    
}
