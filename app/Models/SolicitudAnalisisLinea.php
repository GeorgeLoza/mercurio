<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudAnalisisLinea extends Model
{
    use HasFactory;
    protected $fillable = [
        'orp_id',
        'tiempo',
        'user_id',
        'preparacion',
        'origen_id',
        'estado',
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
    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }
    public function analisisLinea()
    {
        return $this->hasMany(AnalisisLinea::class);
    }
    public function etapa()
    {
        return $this->belongsTo(Etapa::class);
    }
}
