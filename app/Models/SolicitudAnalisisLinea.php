<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudAnalisisLinea extends Model
{
    use HasFactory;
    protected $fillable = [
        'tiempo',
        'user_id',
        'estado_planta_id',
        'estado',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function analisisLinea()
    {
        return $this->hasOne(AnalisisLinea::class);
    }
    public function estadoPlanta()
    {
        return $this->belongsTo(EstadoPlanta::class);
    }
    
}
