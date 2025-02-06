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
        Schema::table('calidad_leches', function (Blueprint $table) {
            //
            $table->boolean('antibioticos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calidad_leches', function (Blueprint $table) {
            //
            $table->boolean('antibioticos');
        });
    }
};
