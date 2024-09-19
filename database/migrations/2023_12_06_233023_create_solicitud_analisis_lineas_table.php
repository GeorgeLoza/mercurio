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
        Schema::create('solicitud_analisis_lineas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('estado_planta_id')->nullable()->constrained()->onDelete('restrict');
            $table->string('estado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_analisis_lineas');
    }
};
