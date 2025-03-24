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
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orp_id')->nullable()->constrained()->onDelete('restrict');
            $table->date('fechaSiembra')->nullable();
            $table->integer('numero')->nullable();
            $table->foreignId('origen_id')->nullable()->constrained()->onDelete('restrict');
            $table->string('rt')->nullable();
            $table->string('moho')->nullable();
            $table->date('fechaFq')->nullable();
            $table->decimal('temperatura', 4, 2)->nullable();
            $table->decimal('ph', 4, 2)->nullable();
            $table->foreignId('usuario_siembra')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('usuario_rt')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('usuario_moho')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('usuario_fq')->nullable()->constrained('users')->onDelete('restrict');
            $table->string('observaciones_micro')->nullable();
            $table->string('observaciones_fq')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }
};
