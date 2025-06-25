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
        'revisado',
        'revisor_id',
        'fecha_revision',
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
    public function color()
    {
        return $this->hasOne(Color::class);
    }
    public function seguimiento()
    {
        return $this->hasMany(Seguimiento::class);
    }
    public function revisor()
    {
        return $this->belongsTo(User::class, 'revisor_id');
    }

}
