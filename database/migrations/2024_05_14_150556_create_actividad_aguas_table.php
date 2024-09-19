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
        Schema::create('actividad_aguas', function (Blueprint $table) {
            $table->id();
            $table->string('estado')->nullable();
            $table->dateTime('tiempo')->nullable();
            $table->decimal('temperatura', 4, 2)->nullable();
            $table->decimal('por_hum_rel', 4, 2)->nullable();
            $table->decimal('act_agua', 4, 2)->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('verificacion_equipo_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('detalle_solicitud_planta_id')->nullable()->constrained()->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividad_aguas');
    }
};
