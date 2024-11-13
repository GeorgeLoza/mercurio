<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('analisis_lineas', function (Blueprint $table) {
            $table->decimal('tempUHT', 6, 2)->nullable()->after('updated_at');
        });
    }
    
    public function down()
    {
        Schema::table('analisis_lineas', function (Blueprint $table) {
            $table->dropColumn('tempUHT');
        });
    }
    

    
};
