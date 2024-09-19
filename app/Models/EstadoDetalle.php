<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoDetalle extends Model
{
    use HasFactory;
    protected $fillable = [
        'orp_id',
        'estado_planta_id',
        'preparacion',
        'user_id',
        'cantidad',
    ];
    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }
    public function estadoPlanta()
    {
        return $this->belongsTo(EstadoPlanta::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
