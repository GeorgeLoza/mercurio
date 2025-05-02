<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemSolucion extends Model
{
    use HasFactory;

    protected $fillable =[

        'nombre',
        'codigo',
        'unidad',
        'concentracion',


    ];

    public function movSolucion()
    {
        return $this->hasMany(movSolucion::class);
    }

}
