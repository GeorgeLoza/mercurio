<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperatura extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv'; // Conexión específica
    protected $table = 'Temperaturas';// Tabla en SQL Server
    protected $fillable = [
        'time_stamps', 
        'temp_1',
        'temp_2',
        'temp_3'
    ]; // Campos asignables

}
