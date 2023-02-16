<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifaFamiliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifa_familias', function (Blueprint $table) {
            $table->id();
            $table->string('matmed')->unique('tarifa_familias_matmed_unique');
            $table->unsignedBigInteger('tarifa_id')->default(1);
            $table->string('material', 100)->index('tarifa_familias_material_index');
            $table->string('medida', 100)->index('tarifa_familias_medida_index');
            $table->timestamps();
            
            $table->foreign('tarifa_id', 'tarifa_familias_tarifa_id_foreign')->references('id')->on('tarifas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarifa_familias');
    }
}
