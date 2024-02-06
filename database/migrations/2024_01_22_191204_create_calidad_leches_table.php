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
        Schema::create('calidad_leches', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('recepcion_leche_id')->nullable()->constrained()->onDelete('restrict');
            $table->decimal('temperatura', 5, 2)->nullable();
            $table->decimal('ph', 4, 2)->nullable();
            $table->decimal('acidez', 4, 3)->nullable();
            $table->decimal('brix', 4, 2)->nullable();
            $table->decimal('densidad', 4, 3)->nullable();
            $table->boolean('prueba_alcohol')->nullable();
            $table->decimal('contenido_graso', 4, 2)->nullable();
            $table->time('tram_inicio')->nullable();
            $table->time('tram_fin')->nullable();
            $table->time('tram_lapso')->nullable();
            $table->decimal('temperatura_congelacion', 5, 3)->nullable();
            $table->decimal('porcentaje_agua', 5, 3)->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calidad_leches');
    }
};
