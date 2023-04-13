<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_elementos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('store_id');
            $table->unsignedBigInteger('elemento_id');
            $table->string('elementificador', 400)->index('store_elementos_elementificador_index');
            $table->timestamps();
            
            $table->foreign('elemento_id', 'store_elementos_elemento_id_foreign')->references('id')->on('elementos');
            $table->foreign('store_id', 'store_elementos_store_id_foreign')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_elementos');
    }
}
