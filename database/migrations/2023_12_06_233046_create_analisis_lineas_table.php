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
        Schema::create('analisis_lineas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitud_analisis_linea_id')->nullable()->constrained()->onDelete('restrict');
            $table->dateTime('tiempo')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');
            $table->decimal('temperatura', 5, 2)->nullable();
            $table->decimal('ph', 4, 2)->nullable();
            $table->decimal('acidez', 4, 3)->nullable();
            $table->decimal('brix', 4, 2)->nullable();
            $table->decimal('viscosidad', 5, 2)->nullable();
            $table->decimal('densidad', 4, 3)->nullable();
            $table->boolean('color')->nullable();
            $table->boolean('olor')->nullable();
            $table->boolean('sabor')->nullable();
            $table->string('aspecto')->nullable();
            $table->decimal('peso',6,2)->nullable();
            $table->decimal('volumen',6,2)->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisis_lineas');
    }
};
