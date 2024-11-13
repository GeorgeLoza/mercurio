<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisisLinea extends Model
{
    use HasFactory;
    protected $fillable = [
        'solicitud_analisis_linea_id',
        'tiempo',
        'user_id',
        'temperatura',
        'ph',
        'ph',
        'acidez',
        'brix',
        'viscosidad',
        'densidad',
        'color',
        'olor',
        'sabor',
        'aspecto',
        'peso',
        'volumen',
        'observaciones',
        'tempUHT'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function solicitudAnalisisLinea()
    {
        return $this->belongsTo(SolicitudAnalisisLinea::class);
    }
}
