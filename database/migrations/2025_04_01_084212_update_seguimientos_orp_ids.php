<?php

use Illuminate\Support\Facades\DB;
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
        Schema::table('seguimientos', function (Blueprint $table) {
            $table->json('orp_ids')->nullable()->after('orp_id'); // Agregar nueva columna JSON
        });

        // Migrar los datos de 'orp_id' a 'orp_ids'
        DB::statement('UPDATE seguimientos SET orp_ids = JSON_ARRAY(orp_id) WHERE orp_id IS NOT NULL');

        Schema::table('seguimientos', function (Blueprint $table) {
            $table->dropForeign(['orp_id']); // Eliminar la clave foránea
            $table->dropColumn('orp_id'); // Eliminar la columna antigua
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seguimientos', function (Blueprint $table) {
            $table->foreignId('orp_id')->nullable()->constrained()->onDelete('restrict'); // Restaurar la clave foránea
        });

        // Restaurar los datos (tomando el primer ID del array JSON)
        DB::statement('UPDATE seguimientos SET orp_id = JSON_UNQUOTE(JSON_EXTRACT(orp_ids, "$[0]")) WHERE JSON_LENGTH(orp_ids) > 0');

        Schema::table('seguimientos', function (Blueprint $table) {
            $table->dropColumn('orp_ids'); // Eliminar la columna JSON
        });
    }
};
