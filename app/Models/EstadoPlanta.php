<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EstadoPlanta extends Model
{
    use HasFactory;
    protected $fillable = [
        'tiempo',
        'user_id',
        'origen_id',
        'proceso',
        'etapa_id',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function origen()
    {
        return $this->belongsTo(Origen::class);
    }
    public function etapa()
    {
        return $this->belongsTo(Etapa::class);
    }
    public function solicitudAnalisisLinea()
    {
        return $this->hasMany(SolicitudAnalisisLinea::class);
    }
    public function estadoDetalle()
    {
        return $this->hasMany(EstadoDetalle::class);
    }


}
