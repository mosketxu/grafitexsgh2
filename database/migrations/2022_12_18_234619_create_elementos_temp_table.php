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
        Schema::create('elementos_temp', function (Blueprint $table) {
                $table->string('elementificador',400)->index();
                $table->bigInteger('ubicacion_id');
                $table->string('ubicacion',30);
                $table->bigInteger('mobiliario_id');
                $table->string('mobiliario',100);
                $table->bigInteger('propxelemento_id');
                $table->string('propxelemento',50);
                $table->bigInteger('carteleria_id');
                $table->string('carteleria',50);
                $table->bigInteger('medida_id');
                $table->string('medida',50)->index();
                $table->bigInteger('material_id');
                $table->string('material',50)->index();
                $table->bigInteger('familia_id')->index()->default(1);
                $table->string('matmed')->index();
                $table->integer('unitxprop')->default(0);
                $table->string('observaciones',250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elementos_temp');
    }
};
