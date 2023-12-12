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
        Schema::create('escaparates', function (Blueprint $table) {
            $table->id();
            $table->string('escaparate')->index()->unique();
            $table->integer('ancho')->nullable()->default(0);
            $table->integer('alto')->nullable()->default(0);
            $table->decimal('area', 8, 2)->nullable()->default(0.00);
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('escaparates');
    }
};
