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
        Schema::table('orps', function (Blueprint $table) {
            $table->boolean('revisado')->default(false);
            $table->foreignId('revisor_id')->nullable()->constrained('users')->onDelete('restrict');
            $table->dateTime('fechaRevision')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orps', function (Blueprint $table) {
             $table->dropColumn('revisado');
            $table->dropColumn('revisor_id');
            $table->dropColumn('fecha_revision');
        });
    }
};
