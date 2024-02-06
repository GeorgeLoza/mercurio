<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'abreviatura',
        'descripcion',
    ];
   
    public function parametroLinea()
    {
        return $this->hasMany(ParametroLinea::class);
    }
    public function estadoPlanta()
    {
        return $this->hasMany(EstadoPlanta::class);
    }
}
