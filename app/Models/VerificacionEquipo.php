<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificacionEquipo extends Model
{
    use HasFactory;


    public function actividadAgua()
    {
        return $this->hasMany(actividadAgua::class);
    }
}
