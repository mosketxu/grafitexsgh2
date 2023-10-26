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
        Schema::create('peticion_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peticion_id')->constrained('peticiones')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->string('comentario', 150);
            $table->integer('unidades')->default(0);
            $table->decimal('preciounidad', 8, 2)->default(0.00);
            $table->decimal('total', 8, 2)->default(0.00);
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
        Schema::dropIfExists('peticion_detalles');
    }
};
