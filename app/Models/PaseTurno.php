<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaseTurno extends Model
{
    use HasFactory;
    protected $fillable = [
        'tiempo',
        'user_id',
        'division_id',
        'observaciones',
        'urgente',
        'volumenes',
        'area',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
