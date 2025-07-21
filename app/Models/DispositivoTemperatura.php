<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositivoTemperatura extends Model
{
    use HasFactory;

        protected $fillable = [
        'fecha_hora',
        'patron_1',
        'inst_1',
        'error_1',
        'patron_2',
        'inst_2',
        'error_2',
        'patron_3',
        'inst_3',
        'error_3',
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