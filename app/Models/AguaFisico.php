<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AguaFisico extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'tiempo',
        'ph',
        'dureza',
        'cloruros',
        'conductividad',
        'user_id',
        'detalle_solicitud_planta_id',

    ];
    public function user()
    {
        return $this->belongsto(User::class);
    }

    public function detalleSolicitudPlanta()
    {
        return $this->belongsto(DetalleSolicitudPlanta::class);
    }
}
