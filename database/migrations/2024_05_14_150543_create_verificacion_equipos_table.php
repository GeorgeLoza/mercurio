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
        Schema::create('verificacion_equipos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo');
            $table->string('sal_1');
            $table->decimal('temperatura_1', 4, 2)->nullable();
            $table->decimal('por_hum_rel_1', 4, 2)->nullable();
            $table->decimal('act_agua_1', 4, 2)->nullable();
            $table->string('sal_2');
            $table->decimal('temperatura_2', 4, 2)->nullable();
            $table->decimal('por_hum_rel_2', 4, 2)->nullable();
            $table->decimal('act_agua_2', 4, 2)->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verificacion_equipos');
    }
};
