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
        Schema::table('calidad_leches', function (Blueprint $table) {

            $table->foreignId('usuarioTram')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('usuarioSiembra')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('usuarioLectura')->nullable()->constrained('users')->onDelete('restrict');
            $table->integer('recuento')->nullable();
            $table->dateTime('tiempo_sembrado')->nullable();
            $table->dateTime('tiempo_lectura')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calidad_leches', function (Blueprint $table) {
            $table->dropColumn('usuarioTram');
            $table->dropColumn('usuarioSiembra');
            $table->dropColumn('usuarioLectura');
            $table->dropColumn('recuento');
            $table->dropColumn('tiempo_sembrado');
            $table->dropColumn('tiempo_lectura');
        });
    }
};
