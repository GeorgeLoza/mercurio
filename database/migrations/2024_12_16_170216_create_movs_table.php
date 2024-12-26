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
        Schema::create('movs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo');
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->boolean('tipo');
            $table->foreignId('autorizante')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('entregante')->nullable()->constrained('users')->onDelete('restrict');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movs');
    }
};
