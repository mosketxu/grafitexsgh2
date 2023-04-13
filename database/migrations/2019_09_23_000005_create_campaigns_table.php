<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('campaign_name', 100)->unique('campaigns_campaign_name_unique');
            $table->date('campaign_initdate');
            $table->date('campaign_enddate');
            $table->integer('campaign_state')->default('0');
            $table->date('fechainstal1')->nullable();
            $table->date('fechainstal2')->nullable();
            $table->date('fechainstal3')->nullable();
            $table->string('montaje1')->nullable();
            $table->string('montaje2')->nullable();
            $table->string('montaje3')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('campaigns');
    }
}
