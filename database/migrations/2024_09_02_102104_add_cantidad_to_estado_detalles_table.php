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
        Schema::table('estado_detalles', function (Blueprint $table) {
            $table->decimal('cantidad', 8, 2)->nullable()->after('user_id'); // Ajusta la posición del campo según lo que prefieras
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estado_detalles', function (Blueprint $table) {
            $table->dropColumn('cantidad');
        });
    }
};
