<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hisopado extends Model
{
    use HasFactory;

    protected $fillable = [

        'fechaMuestra',
        'muestreo',
        'personal_id',
        'usuarioSiembra',
        'fechaSiembra',
        'col',
        'usuarioLectura',
        'fechaLectura',
        'observacionSiembra',
        'observacionLectura',
        'usuarioObservacionesSiembra',
        'usuarioObservacionesLectura',
    ];
}
