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
            $table->dropForeign(['orp_id']); // El nombre del índice normalmente es <tabla>_<columna>_foreign

            // Luego elimina la columna
            $table->dropColumn('orp_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('liberacions', function (Blueprint $table) {
            $table->unsignedBigInteger('orp_id')->nullable()->after('id');

            // Vuelve a crear la foreign key
            $table->foreign('orp_id')->references('id')->on('orps')->onDelete('cascade');
        });
    }
};
