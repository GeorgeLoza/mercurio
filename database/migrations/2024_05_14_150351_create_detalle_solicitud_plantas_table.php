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
        Schema::create('detalle_solicitud_plantas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitud_planta_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('productos_planta_id')->nullable()->constrained()->onDelete('restrict');
            $table->string('subcodigo')->nullable();
            $table->string('lote')->nullable();
            $table->date('fecha_elaboracion')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->date('fecha_muestreo');
            $table->foreignId('tipo_muestra_id')->nullable()->constrained()->onDelete('restrict');
            $table->string('tipo_analisis');
            $table->string('otro')->nullable();
            $table->string('estado')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_solicitud_plantas');
    }
};
