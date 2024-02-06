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
        Schema::create('contadors', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo');
            $table->integer('cantidad');
            $table->string('tipo');
            $table->string('observaciones')->nullable();
            $table->foreignId('almacen_producto_terminado_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('orp_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contadors');
    }
};
