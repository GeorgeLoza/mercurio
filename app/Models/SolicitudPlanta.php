<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudPlanta extends Model
{
    use HasFactory;
    protected $fillable = [
        'tiempo',
        'codigo',
        'estado',
        'user_id',
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleSolicitudPlanta::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
