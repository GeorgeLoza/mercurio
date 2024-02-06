<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutaAcopio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'detalle',
    ];
    public function subruta_acopio()
    {
        return $this->hasMany(SubrutaAcopio::class);
    }
}
