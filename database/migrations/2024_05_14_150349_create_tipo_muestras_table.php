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
        Schema::create('tipo_muestras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('norma_referencial')->nullable();
            $table->string('unidad')->nullable();
            $table->string('aclaUni')->nullable();
            $table->string('min_mes')->nullable();
            $table->integer('min_mes_e')->nullable();
            $table->string('max_mes')->nullable();
            $table->integer('max_mes_e')->nullable();
            $table->string('min_colTot')->nullable();
            $table->integer('min_colTot_e')->nullable();
            $table->string('max_colTot')->nullable();
            $table->integer('max_colTot_e')->nullable();
            $table->string('min_mohLev')->nullable();
            $table->integer('min_mohLev_e')->nullable();
            $table->string('max_mohLev')->nullable();
            $table->integer('max_mohLev_e')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_muestras');
    }
};
