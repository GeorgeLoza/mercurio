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
        Schema::create('parametro_leches', function (Blueprint $table) {
            $table->id();
          

            $table->decimal('temperatura_max', 5, 2)->nullable();
            $table->decimal('ph_min', 4, 2)->nullable();
            $table->decimal('ph_max', 4, 2)->nullable();
            $table->decimal('acidez_min', 4, 3)->nullable();
            $table->decimal('acidez_max', 4, 3)->nullable();
            $table->decimal('brix_min', 4, 2)->nullable();
            $table->decimal('contenido_graso_min', 5, 2)->nullable();
            $table->decimal('temperatura_congelada_min', 5, 2)->nullable();
            $table->decimal('temperatura_congelada_max', 5, 2)->nullable();
            $table->decimal('densidad_min', 4, 3)->nullable();
            $table->decimal('densidad_max', 4, 3)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametro_leches');
    }
};
