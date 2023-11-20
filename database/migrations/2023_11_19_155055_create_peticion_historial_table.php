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
        Schema::create('peticion_historial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peticion_id')->constrained('peticiones')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('estadopeticion_id')->constrained('estados_peticion');
            $table->text('observaciones')->nullable();
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
        Schema::dropIfExists('peticion_historial');
    }
};
