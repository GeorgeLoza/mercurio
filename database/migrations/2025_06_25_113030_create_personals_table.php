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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo')->unique();
            $table->string('nombre');
            $table->string('turno')->nullable();
            $table->string('cargo')->nullable();
            $table->string('area')->nullable();
            $table->string('estado')->nullable();
            $table->string('hisopado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
