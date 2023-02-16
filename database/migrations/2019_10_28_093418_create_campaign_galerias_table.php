<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignGaleriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_galerias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id');
            $table->string('mobiliario', 100);
            $table->string('carteleria', 50);
            $table->string('medida', 50);
            $table->string('elemento')->index('campaign_galerias_elemento_index');
            $table->string('ECI', 3)->nullable();
            $table->string('imagen')->default('pordefecto.jpg');
            $table->string('observaciones')->nullable();
            $table->timestamps();
            
            $table->foreign('campaign_id', 'campaign_galerias_campaign_id_foreign')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_galerias');
    }
}
