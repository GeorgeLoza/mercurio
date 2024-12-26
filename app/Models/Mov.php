<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mov extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'tiempo',
        'user_id',
        'tipo',
        'autorizante',
        'entregante',
        'estado',
    ];  

    public function detalleMovs()
    {
        return $this->hasMany(DetalleMov::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function autorizante(){
        return $this->belongsTo(User::class, 'autorizante');
    }
    public function entregante(){
        return $this->belongsTo(User::class, 'entregante');
    }
  

    
}
