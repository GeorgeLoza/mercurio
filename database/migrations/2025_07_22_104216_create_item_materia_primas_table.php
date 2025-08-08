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
        Schema::create('item_materia_primas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->foreignId('categoria_materia_prima_id')->constrained();
            $table->integer('nivel_inspeccion')->nullable();
            $table->decimal('nca_max', 10, 3)->nullable();
            $table->decimal('nca_min', 10, 3)->nullable();
            $table->decimal('Nivel_dilucion', 10, 3)->nullable();
            $table->decimal('temp_max', 10, 3)->nullable();
            $table->decimal('temp_min', 10, 3)->nullable();
            $table->decimal('ph_max', 10, 3)->nullable();
            $table->decimal('ph_min', 10, 3)->nullable();
            $table->decimal('solidos_max', 10, 3)->nullable();
            $table->decimal('solidos_min', 10, 3)->nullable();
            $table->decimal('acidez_max', 10, 3)->nullable();
            $table->decimal('acidez_min', 10, 3)->nullable();
            $table->decimal('densidad_max', 10, 3)->nullable();
            $table->decimal('densidad_min', 10, 3)->nullable();
            $table->decimal('viscosidad_max', 10, 3)->nullable();
            $table->decimal('viscosidad_min', 10, 3)->nullable();
            $table->boolean('organoleptica')->default(true);

            $table->foreignId('unidad_id')->constrained()->nullable()->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_materia_primas');
    }
};
