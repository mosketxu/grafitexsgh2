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
        Schema::create('store_peticiones_productos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('store_id');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id','store_peticiones_producto_producto_id_foreign')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('store_id', 'store_peticiones_producto_store_id_foreign')->references('id')->on('stores')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_peticiones_productos');
    }
};
