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
        Schema::create('estado_tanques', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo');
            $table->foreignId('origen_id')->constrained()->onDelete('restrict');
            $table->boolean('pasteurizado');
            $table->boolean('envasado');
            $table->boolean('enchaquetado');
            $table->boolean('recirculado');
            $table->boolean('agitado');
            $table->decimal('volumen', 10, 4)->nullable();
            $table->string('zip')->nullable();
            $table->string('observaciones')->nullable();

            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_tanques');
    }
};
