<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositivoPhmetro extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_hora',
        'verificacion_temperatura1',
        'verificacion_temperatura2',
        'verificacion_temperatura3',
        'verificacion_4',
        'verificacion_7',
        'verificacion_10',
        'requiere_ajuste',
        'verificacion_ajuste_temperatura1',
        'verificacion_ajuste_temperatura2',
        'verificacion_ajuste_temperatura3',
        'verificacion_ajuste_4',
        'verificacion_ajuste_7',
        'verificacion_ajuste_10',
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
