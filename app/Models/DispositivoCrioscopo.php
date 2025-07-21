<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositivoCrioscopo extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_hora',
        'user_id',
        'punto_ajuste_a',
        'punto_ajuste_b',
        'dispositivos_medicion_id',
        'estado',
        'observaciones',
    ];
    protected $casts = [
    'punto_ajuste_a' => 'boolean',
    'punto_ajuste_b' => 'boolean',
];


    public function dispositivosMedicion()
    {
        return $this->belongsTo(DispositivosMedicion::class, 'dispositivos_medicion_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
