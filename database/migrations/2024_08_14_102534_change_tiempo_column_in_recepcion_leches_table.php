<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('recepcion_leches', function (Blueprint $table) {
            // Cambiar el tipo de dato de la columna 'tiempo' a datetime
            $table->datetime('tiempo')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recepcion_leches', function (Blueprint $table) {
            // Revertir el cambio al tipo de dato original
            $table->date('tiempo')->change();
        });
    }
};
