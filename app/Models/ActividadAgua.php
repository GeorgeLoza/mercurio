<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadAgua extends Model
{
    use HasFactory;
    protected $fillable = [
        'estado',
        'tiempo',
        'temperatura',
        'por_hum_rel',
        'act_agua',
        'user_id',
        'verificacion_equipo_id',
        'detalle_solicitud_planta_id',
        'observaciones'

    ];

    public function user()
    {
        return $this->belongsto(User::class);
    }
    // public function verificacionEquipo()
    // {
    //     return $this->belongsto(verificacionEquipo::class);
    // }
    public function detalleSolicitudPlanta()
    {
        return $this->belongsto(DetalleSolicitudPlanta::class);
    }
}
