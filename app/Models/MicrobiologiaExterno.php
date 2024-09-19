<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicrobiologiaExterno extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'fecha_sembrado',
        'estado',
        'ana_sem_id',
        'fecha_dia2',
        'aer_mes',
        'col_tot',
        'ana_dia2_id',
        'fecha_dia5',
        'moh_lev',
        'ana_dia5_id',
        'detalle_solicitud_planta_id',
    ];

    public function user1()
    {
        return $this->belongsTo(User::class, 'ana_sem_id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'ana_dia2_id');
    }
    public function user3()
    {
        return $this->belongsTo(User::class, 'ana_dia5_id');
    }
    public function detalleSolicitudPlanta()
    {
        return $this->belongsto(DetalleSolicitudPlanta::class);
    }
}
