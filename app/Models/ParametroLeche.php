<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametroLeche extends Model
{
    use HasFactory;
    protected $fillable = [
        
        
        'temperatura_max',  
        'ph_min',
        'ph_max',
        'acidez_min',
        'acidez_max',
        'brix_min', 
        'contenido_graso_min', 
        'temperatura_congelada_min',
        'temperatura_congelada_max',
        'densidad_min',
        'densidad_max',
        

    ];
  
 
}
