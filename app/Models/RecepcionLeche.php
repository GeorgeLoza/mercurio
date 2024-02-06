<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecepcionLeche extends Model
{
    use HasFactory;
    protected $fillable = [
        'tiempo',
        'subruta_acopio_id',
        'estado',
        'cantidad',
        'user_id',
    ];
    public function subruta_acopio()
    {
        return $this->belongsTo(SubrutaAcopio::class);
    }
    public function calidad_leche()
    {
        return $this->hasMany(CalidadLeche::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
