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
            $table->integer('aer_mes2')->nullable();
            $table->integer('col_tot2')->nullable();
            $table->integer('moh_lev2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('microbiologia_externos', function (Blueprint $table) {
            $table->dropColumn(['aer_mes2', 'col_tot2', 'moh_lev2']);
        });
    }
};
