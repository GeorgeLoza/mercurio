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
        Schema::create('estado_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orp_id')->nullable()->constrained()->onDelete('restrict');
            $table->string('preparacion');
            $table->foreignId('estado_planta_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_detalles');
    }
};
