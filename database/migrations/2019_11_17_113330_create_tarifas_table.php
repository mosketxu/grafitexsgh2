<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->id();
            $table->string('zona', 2)->nullable();
            $table->string('familia', 50)->index('tarifas_familia_index');
            $table->integer('tipo')->default(0);
            $table->integer('tramo1')->default(1);
            $table->decimal('tarifa1', 8, 2)->default(0.00);
            $table->integer('tramo2')->default(0);
            $table->decimal('tarifa2', 8, 2)->default(0.00);
            $table->integer('tramo3')->default(0);
            $table->double('tarifa3', 8, 2)->default(0.00);
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
        Schema::dropIfExists('tarifas');
    }
}
