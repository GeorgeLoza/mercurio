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
        Schema::create('recepcion_leches', function (Blueprint $table) {
            $table->id();
            $table->date('tiempo');
            $table->foreignId('subruta_acopio_id')->nullable()->constrained()->onDelete('restrict');
            $table->string('estado');
            $table->string('cantidad')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recepcion_leches');
    }
};
