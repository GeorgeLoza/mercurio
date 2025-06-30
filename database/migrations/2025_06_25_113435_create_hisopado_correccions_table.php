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
        Schema::create('hisopado_correccions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hisopado_id')->constrained();
            $table->dateTime('fechaCapacitacion')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hisopado_correccions');
    }
};
