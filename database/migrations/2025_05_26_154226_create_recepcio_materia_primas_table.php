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
        Schema::create('recepcio_materia_primas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo');
            $table->string('ubicación');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('item_materia_prima_id')->constrained();
            $table->decimal('cantidad', 10, 3);
            $table->decimal('unidades', 10, 3)->nullable();
            $table->foreignId('proveedor_materia_prima_id')->constrained();
            $table->string('marca')->nullable();
            $table->boolean('limpieza_transporte');
            $table->boolean('sin_elementos');
            $table->boolean('cerrado');
            $table->string('lote')->nullable();
            $table->date('fecha_elaboracion')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->boolean('nit');
            $table->boolean('rs');
            $table->boolean('certificado');
            $table->string('observacion')->nullable();
            $table->string('correccion')->nullable();
            $table->string('almacenero')->nullable();
            $table->string('codigo_certificado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recepcio_materia_primas');
    }
};
