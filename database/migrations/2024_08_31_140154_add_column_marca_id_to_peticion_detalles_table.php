<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peticion_detalles', function (Blueprint $table) {
            $table->foreignId('marca_id')->nullable()->after('producto_id')->constrained('marcas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peticion_detalles', function (Blueprint $table) {
            $table->dropColumn('marca_id');
        });
    }
};
