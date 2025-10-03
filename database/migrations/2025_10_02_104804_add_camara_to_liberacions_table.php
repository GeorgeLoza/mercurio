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
               Schema::table('liberacions', function (Blueprint $table) {
            $table->string('camara')->nullable()->after('id');
        });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('liberacions', function (Blueprint $table) {
            $table->dropColumn('camara');
        });
    }
};
