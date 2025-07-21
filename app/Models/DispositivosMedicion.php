<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositivosMedicion extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'dispositivo',
        'marca',
        'modelo',
        'capacidadMedicion',
        'rangoUso',
        'areaUso',
        'responsable',
        'baja',
        'observaciones',
    ];
    public function dispositivoRefractometro()
    {
        return $this->hasMany(DispositivoRefractometro::class, 'dispositivos_medicion_id');
    }
    public function dispositivoPhmetro()
    {
        return $this->hasMany(DispositivoPhmetro::class, 'dispositivos_medicion_id');
    }
    public function dispositivoTemperatura()
    {
        return $this->hasMany(DispositivoTemperatura::class, 'dispositivos_medicion_id');
    }
}
