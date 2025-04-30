<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinoSolucion extends Model
{
    use HasFactory;
    protected $fillable = [

        'item_solucion_id',

        'concentracion',
        'descripcion',

    ];


    public function item()
    {
        return $this->belongsTo(itemSolucion::class);
    }
}
