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
        Schema::create('seguimiento_htsts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo');
            $table->integer('codigo')->unique();
            $table->foreignId('orp_id')->nullable()->constrained()->onDelete('restrict');
            $table->string('preparacion')->nullable();
            $table->integer('lote')->nullable();
            $table->foreignId('origen_id')->nullable()->constrained()->onDelete('restrict');
            $table->date('fechaSiembra')->nullable();
            $table->integer('rt')->nullable();
            $table->integer('col')->nullable();
            $table->integer('moho')->nullable();
            $table->foreignId('usuario_solicitud')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('usuario_siembra')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('usuario_dia2')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('usuario_dia5')->nullable()->constrained('users')->onDelete('restrict');
            $table->string('observaciones')->nullable();
            $table->time('hora_sachet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_htsts');
    }
};
