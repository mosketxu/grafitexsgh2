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
        Schema::create('store_proporciones', function (Blueprint $table) {
            $table->bigInteger('store_id');
            $table->foreignId('proporcion_id')->constrained('montaje_proporciones')->onDelete('cascade');
            $table->timestamps();
            $table->foreign('store_id', 'store_proporciones_store_id_foreign')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_proporciones');
    }
};
