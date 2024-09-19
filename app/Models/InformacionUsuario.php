<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionUsuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'procedencia',
        'direccion',
        'abreviatura',
        'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
