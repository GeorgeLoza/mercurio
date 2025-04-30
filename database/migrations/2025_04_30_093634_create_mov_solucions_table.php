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
        Schema::create('mov_solucions', function (Blueprint $table) {
            $table->id();

            $table->dateTime('tiempo');
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->boolean('tipo');
            $table->foreignId('autorizante')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('entregante')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('item_solucion_id')->constrained()->onDelete('restrict');
            $table->foreignId('destino_solucion_id')->constrained()->onDelete('restrict');
            $table->string('estado');
            $table->decimal('concentracion', 5, 2);

            $table->decimal('confirmacion', 5, 2);
            $table->decimal('cantidad', 9, 4);
            $table->decimal('saldo', 10, 4)->default(0);
            $table->decimal('cantidad_mezcla', 9, 4);
            $table->decimal('porcentaje', 6, 3);
            $table->string('observacion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mov_solucions');
    }
};
