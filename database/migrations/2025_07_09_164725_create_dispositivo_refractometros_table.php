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
        Schema::create('dispositivo_refractometros', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora')->nullable();
            $table->decimal('verificacion_temperatura', 5, 2)->nullable();
            $table->decimal('verificacion_concentracion_0', 5, 2)->nullable();
            $table->decimal('verificacion_concentracion_25', 5, 2)->nullable();
            $table->boolean('requiere_ajuste')->nullable();
            $table->decimal('verificacion_ajuste_temperatura', 5, 2)->nullable();
            $table->decimal('verificacion_ajuste_concentracion_0', 5, 2)->nullable();
            $table->decimal('verificacion_ajuste_concentracion_25', 5, 2)->nullable();
            $table->foreignId('dispositivos_medicion_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');
            $table->string('estado')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivo_refractometros');
    }
};
