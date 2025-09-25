<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liberacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'orp_id',

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
    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }

    public function detalles()
    {
        return $this->hasMany(LiberacionDetalle::class);
    }
}
