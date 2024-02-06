<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPlanta extends Model
{
    use HasFactory;
    protected $fillable = [
        'tiempo',
        'user_id',
        'origen_id',
        'proceso',
        'orp_id',
        'etapa_id',
        'preparacion',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function origen()
    {
        return $this->belongsTo(Origen::class);
    }
    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }
    public function etapa()
    {
        return $this->belongsTo(Etapa::class);
    }
    public function solicitudAnalisisLinea()
    {
        return $this->hasMany(SolicitudAnalisisLinea::class);
    }
}
