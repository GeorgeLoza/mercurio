<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origen extends Model
{
    use HasFactory;
    protected $fillable = [
        'alias',
        'descripcion',
        'codigo_maquina',
    ];
    
    public function estadoPlanta()
    {
        return $this->hasMany(EstadoPlanta::class);
    }
    public function parametroLinea()
    {
        return $this->hasMany(ParametroLinea::class);
    }
}
