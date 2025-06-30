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
        Schema::create('hisopados', function (Blueprint $table) {
           $table->id();
            $table->dateTime('fechaMuestra')->nullable();
            $table->foreignId('muestrero')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('personal_id')->constrained();
            $table->foreignId('usuarioSiembra')->nullable()->constrained('users')->onDelete('restrict');
            $table->date('fechaSiembra')->nullable();
            $table->string('col')->nullable();
            $table->foreignId('usuarioLectura')->nullable()->constrained('users')->onDelete('restrict');
            $table->date('fechaLectura')->nullable();
            $table->string('observacionSiembra')->nullable();
            $table->string('observacionLectura')->nullable();
            $table->foreignId('usuarioObservacionesSiembra')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('usuarioObservacionesLectura')->nullable()->constrained('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hisopados');
    }
};
