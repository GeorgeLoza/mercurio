<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalidadLeche extends Model
{
    use HasFactory;
    protected $fillable = [
        'tiempo',
        'user_id',
        'recepcion_leche_id',
        'temperatura',
        'ph',
        'acidez',
        'brix',
        'densidad',
        'prueba_alcohol',
        'contenido_graso',
        'tram_inicio',
        'tram_fin',
        'tram_lapso',
        'temperatura_congelacion',
        'porcentaje_agua',
        'observaciones',
        'usuarioTram',
        'usuarioSiembra',
        'usuarioLectura',
        'recuento',
        'tiempo_sembrado',
        'tiempo_lectura',
        'antibioricos',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function recepcion_leche()
    {
        return $this->belongsTo(RecepcionLeche::class);
    }

    public function utram(){
        return $this->belongsTo(User::class, 'usuarioTram');
    }
    public function usiembra(){
        return $this->belongsTo(User::class, 'usuarioSiembra');
    }
    public function ulectura(){
        return $this->belongsTo(User::class, 'usuarioLectura');
    }

}
