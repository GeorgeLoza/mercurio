<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiberacionDetalle extends Model
{
    use HasFactory;
    protected $fillable = [
        'liberacion_id',
        'origen_id',
        'hora_sachet',
        'peso',
        'temperatura',
        'ph',
        'brix',
        'acidez',
        'viscosidad',
        'color',
        'olor',
        'sabor',
        'observaciones',
        'user_id',
    ];

    public function liberacion()
    {
        return $this->belongsTo(Liberacion::class);
    }
    public function origen()
    {
        return $this->belongsTo(Origen::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
