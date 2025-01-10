<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoTanque extends Model
{
    use HasFactory;

    protected $fillable = [

        'tiempo',
        'origen_id',
        'pasteurizado',
        'envasado',
        'enchaquetado',
        'recirculado',
        'agitado',
        'volumen',
        'zip',
        'observaciones',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function origen()
    {
        return $this->belongsTo(Origen::class);
    }

}
