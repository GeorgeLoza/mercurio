<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orp extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'producto_id',
        'lote',
        'estado',
        'tiempo_elaboracion',
        'fecha_vencimiento1',
        'fecha_vencimiento2',
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    public function estadoDetalle()
    {
        return $this->hasMany(EstadoDetalle::class);
    }
    public function contador()
    {
        return $this->hasMany(Contador::class);
    }
}
