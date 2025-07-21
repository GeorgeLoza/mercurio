<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositivoRefractometro extends Model
{
    use HasFactory;
        protected $fillable = [
        'fecha_hora',
        'verificacion_temperatura',
        'verificacion_concentracion_0',
        'verificacion_concentracion_25',
        'requiere_ajuste',
        'verificacion_ajuste_temperatura',
        'verificacion_ajuste_concentracion_0',
        'verificacion_ajuste_concentracion_25',
        'dispositivos_medicion_id',
        'user_id',
        'estado',
        'observaciones',

    ];
    public function dispositivosMedicion()
    {
        return $this->belongsTo(DispositivosMedicion::class, 'dispositivos_medicion_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
