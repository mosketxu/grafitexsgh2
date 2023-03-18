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
        Schema::create('campaign_tienda_galerias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaigntienda_id')->constrained('campaign_tiendas')->onDelete('cascade');
            $table->string('imagen')->default('pordefecto.jpg');
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
        Schema::dropIfExists('campaign_tienda_galerias');
    }
};
