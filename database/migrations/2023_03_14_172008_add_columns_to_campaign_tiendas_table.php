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
        Schema::table('campaign_tiendas', function (Blueprint $table) {
            $table->foreignId('proveedor_id')->nullable()->constrained('entidades')->after('store');
            $table->date('fechainiprev')->nullable()->after('proveedor_id');
            $table->date('fechafinprev')->nullable()->after('fechainiprev');
            $table->date('fechainimontador')->nullable()->after('fechafinprev');
            $table->date('fechafinmontador')->nullable()->after('fechainimontador');
            $table->date('observacionesmontador')->nullable()->after('fechafinmontador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_tiendas', function (Blueprint $table) {
            $table->dropColumn('proveedor_id');
            $table->dropColumn('fechainiprev');
            $table->dropColumn('fechafinprev');
            $table->dropColumn('fechainimontador');
            $table->dropColumn('fechafinmontador');
            $table->dropColumn('fechafinmontador');
            $table->dropColumn('observacionesmontador');
        });
    }
};
