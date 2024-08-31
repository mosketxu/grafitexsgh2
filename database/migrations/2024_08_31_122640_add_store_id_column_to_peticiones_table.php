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
        Schema::table('peticiones', function (Blueprint $table) {
            $table->bigInteger('store_id')->after('peticionario_id');
            $table->foreign('store_id', 'peticiones_store_id_foreign')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peticiones', function (Blueprint $table) {
            $table->dropColumn('store_id');
        });
    }
};
