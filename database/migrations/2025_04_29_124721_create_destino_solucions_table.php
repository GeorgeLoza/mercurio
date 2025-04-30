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
        Schema::create('destino_solucions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_solucion_id')->constrained()->onDelete('restrict');
            $table->decimal('concentracion', 5, 2);
            $table->string('descripcion');
            $table->string('codigo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destino_solucions');
    }
};
