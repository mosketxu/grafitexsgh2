<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
            $table->id();
            $table->string('entidad')->unique();
            $table->boolean('montador')->nullable();
            $table->string('nif', 12)->nullable()->unique();
            $table->string('direccion', 100)->nullable();
            $table->string('cp', 10)->nullable();
            $table->string('localidad', 100)->nullable();
            $table->string('provincia')->nullable();
            $table->string('pais_id', 2)->nullable()->default('ES');
            $table->string('area_id', 2)->nullable()->default('ES');
            $table->string('tfno', 50)->nullable();
            $table->string('emailgral', 100)->nullable();
            $table->string('emailadm', 100)->nullable();
            $table->string('emailaux', 100)->nullable();
            $table->string('banco1')->nullable();
            $table->string('iban1')->nullable();
            $table->string('banco2')->nullable();
            $table->string('iban2')->nullable();
            $table->integer('metodopago_id')->nullable()->default(1);
            $table->integer('diavencimiento')->nullable()->default(10);
            $table->integer('vencimientofechafactura')->nullable();
            $table->string('observaciones')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('useremail')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('entidades');
    }
}
