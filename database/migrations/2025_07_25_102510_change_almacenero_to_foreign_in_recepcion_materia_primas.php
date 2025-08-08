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
        Schema::table('recepcion_materia_primas', function (Blueprint $table) {

            $table->unsignedBigInteger('almacenero_materia_prima_id')->nullable()->after('correccion');

            $table->foreign('almacenero_materia_prima_id')
                ->references('id')
                ->on('almacenero_materia_primas') // ajusta el nombre real
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recepcion_materia_primas', function (Blueprint $table) {

            $table->dropForeign(['almacenero_materia_prima_id']);
            $table->dropColumn('almacenero_materia_prima_id');
        });
    }
};
