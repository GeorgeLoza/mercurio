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
        Schema::create('microbiologia_externos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_sembrado')->nullable();
            $table->string('estado');
            $table->foreignId('ana_sem_id')->nullable()->constrained('users')->onDelete('restrict');
            $table->date('fecha_dia2')->nullable();
            $table->integer('aer_mes')->nullable();
            $table->integer('col_tot')->nullable();
            $table->foreignId('ana_dia2_id')->nullable()->constrained('users')->onDelete('restrict');
            $table->date('fecha_dia5')->nullable();
            $table->integer('moh_lev')->nullable();
            $table->foreignId('ana_dia5_id')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('detalle_solicitud_planta_id')->nullable()->constrained()->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('microbiologia_externos');
    }
};
