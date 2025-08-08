<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HisopadoCorreccion extends Model
{
    use HasFactory;
    protected $fillable = [
        'hisopado_id',
        'fechaCapacitacion',
        'user_id',
    ];

    public function hisopado()
    {
        return $this->belongsTo(Hisopado::class);
    }
   public function user()
    {
        return $this->belongsTo(User::class);
    }
}
