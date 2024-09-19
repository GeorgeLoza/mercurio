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
        Schema::table('calidad_leches', function (Blueprint $table) {
            // Cambiamos el campo 'temperatura_congelacion' a decimal(6,4)
            $table->decimal('temperatura_congelacion', 6, 4)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calidad_leches', function (Blueprint $table) {
            // Revertimos el cambio a decimal(5,3)
            $table->decimal('temperatura_congelacion', 5, 3)->nullable()->change();
        });
    }
};
