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
        Schema::create('liberacion_detalles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('liberacion_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('origen_id')->nullable()->constrained()->onDelete('restrict');
            $table->time('hora_sachet')->nullable();
            $table->decimal('peso', 6, 2)->nullable();
            $table->decimal('temperatura', 5, 2)->nullable();
            $table->decimal('ph', 4, 2)->nullable();
            $table->decimal('brix', 4, 2)->nullable();
            $table->decimal('acidez', 4, 3)->nullable();
            $table->decimal('viscosidad', 5, 2)->nullable();
            $table->boolean('color')->nullable();
            $table->boolean('olor')->nullable();
            $table->boolean('sabor')->nullable();
            $table->string('observaciones')->nullable();

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liberacion_detalles');
    }
};
