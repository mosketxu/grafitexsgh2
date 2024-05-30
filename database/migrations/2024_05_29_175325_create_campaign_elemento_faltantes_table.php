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
        Schema::create('campaign_elemento_faltantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaigntienda_id')->constrained('campaign_tiendas')->onDelete('cascade');
            $table->string('elementofaltante', 250);
            $table->integer('cantidad')->default(1);
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
        Schema::dropIfExists('campaign_elemento_faltantes');
    }
};
