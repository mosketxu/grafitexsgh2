<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaestrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestros', function (Blueprint $table) {
            $table->id();
            $table->string('store', 5)->index('maestros_store_index');
            $table->string('country', 2);
            $table->string('name', 100)->index('maestros_name_index');
            $table->string('area', 20);
            $table->string('segment2018', 20)->nullable();
            $table->string('segmento', 20)->index('maestros_segmento_index');
            $table->string('channel')->nullable();
            $table->string('store_cluster')->nullable();
            $table->string('storeconcept', 50);
            $table->string('furniture_type')->nullable();
            $table->string('elementificador', 400);
            $table->string('ubicacion', 20);
            $table->string('mobiliario', 100)->index('maestros_mobiliario_index');
            $table->string('propxelemento', 50)->index('maestros_propxelemento_index');
            $table->string('carteleria', 50);
            $table->string('medida', 50)->index('maestros_medida_index');
            $table->string('material', 50)->index('maestros_material_index');
            $table->string('unitxprop', 20)->nullable();
            $table->string('matmed')->index('maestros_matmed_index');
            $table->string('observaciones')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('maestros');
    }
}
