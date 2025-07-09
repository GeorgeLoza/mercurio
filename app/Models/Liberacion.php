<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liberacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'orp_id',
    ];


    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }

    public function detalles()
{
    return $this->hasMany(LiberacionDetalle::class);
}
}
