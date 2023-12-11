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
        Schema::create('peticiones', function (Blueprint $table) {
            $table->id();
            $table->string('peticion', 100);
            $table->foreignId('peticionario_id')->constrained('users');
            $table->foreignId('peticionestado_id')->constrained('estados_peticion');;
            $table->date('fecha');
            $table->decimal('total', 8, 2)->default(0.00);
            $table->boolean('enviado')->default('0');
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
        Schema::dropIfExists('peticiones');
    }
};
