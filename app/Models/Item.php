<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable =[

        'nombre',
        'codigo',
        'unidad',

    ];

    public function detalleMovs()
    {
        return $this->hasMany(DetalleMov::class);
    }

}
