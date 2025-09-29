<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiberacionOrp extends Model
{
     use HasFactory;


    protected $fillable = ['liberacion_id', 'orp_id'];

    public function liberacion()
    {
        return $this->belongsTo(Liberacion::class);
    }

    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }
}
