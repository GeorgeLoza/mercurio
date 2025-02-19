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
        Schema::create('agua_fisicos', function (Blueprint $table) {
            $table->id();
            $table->string('estado')->nullable();
            $table->dateTime('tiempo')->nullable();
            $table->decimal('ph', 4, 2)->nullable();
            $table->decimal('dureza', 4, 2)->nullable();
            $table->decimal('cloruros', 4, 2)->nullable();
            $table->decimal('conductividad', 4, 2)->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('detalle_solicitud_planta_id')->nullable()->constrained()->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agua_fisicos');
    }
};
