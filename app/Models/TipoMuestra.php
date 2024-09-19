<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMuestra extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'norma_referencial',
        'unidad',
        'aclaUni',
        'min_mes',
        'min_mes_e',
        'max_mes',
        'max_mes_e',
        'min_colTot',
        'min_colTot_e',
        'max_colTot',
        'max_colTot_e',
        'min_mohLev',
        'min_mohLev_e',
        'max_mohLev',
        'max_mohLev_e',
    ];
}
