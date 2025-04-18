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
        Schema::table('microbiologia_externos', function (Blueprint $table) {
            $table->string('observaciones')->nullable()->after('moh_lev2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('microbiologia_externos', function (Blueprint $table) {
            $table->dropColumn('observaciones');
        });
    }
};
