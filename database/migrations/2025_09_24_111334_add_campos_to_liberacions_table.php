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
        Schema::table('liberacions', function (Blueprint $table) {
            //
             // FK a users para liberador y autorizador
            $table->foreignId('liberador_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->foreignId('autorizador_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            // Campos adicionales
            $table->string('estado')->nullable();
            $table->string('tipo')->nullable();
            $table->date('fecha_liberacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('liberacions', function (Blueprint $table) {
            //
                $table->dropForeign(['liberador_id']);
            $table->dropForeign(['autorizador_id']);
            $table->dropColumn(['liberador_id','autorizador_id','estado','tipo','fecha_liberacion']);

        });
    }
};
