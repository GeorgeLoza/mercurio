<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liberacion extends Model
{
    use HasFactory;
    protected $fillable = [

        'liberador_id',
        'autorizador_id',
        'estado',
        'tipo',
        'fecha_liberacion'


    ];

    public function liberador()
    {
        return $this->belongsTo(User::class, 'liberador_id');
    }

    public function autorizador()
    {
        return $this->belongsTo(User::class, 'autorizador_id');
    }


    public function detalles()
    {
        return $this->hasMany(LiberacionDetalle::class);
    }

    public function orps()
    {
        return $this->belongsToMany(Orp::class, 'liberacion_orps');
    }
}
