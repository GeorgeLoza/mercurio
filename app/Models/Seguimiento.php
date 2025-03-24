<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;


    protected $fillable = [

        'orp_id',
        'fechaSiembra',
        'numero',
        'origen_id',
        'rt',
        'moho',
        'fechaFq',
        'temperatura',
        'ph',
        'usuario_siembra',
        'usuario_rt',
        'usuario_moho',
        'usuario_fq',
        'observaciones_micro',
        'observaciones_fq',
    ];


    public function orp()
    {
        return $this->belongsTo(Orp::class);
    }


    public function origen()
    {
        return $this->belongsTo(Origen::class);

    }
    public function user1()
    {
        return $this->belongsTo(User::class, 'usuario_siembra');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'usuario_rt');
    }
    public function user3()
    {
        return $this->belongsTo(User::class, 'usuario_moho');
    }
    public function user4()
    {
        return $this->belongsTo(User::class, 'usuario_fq');
    }
}
