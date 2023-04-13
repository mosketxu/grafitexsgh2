<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignTiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_tiendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id');
            $table->foreign('campaign_id', 'campaign_tiendas_campaign_id_foreign')->references('id')->on('campaigns')->onDelete('cascade');
            $table->bigInteger('store_id')->index('campaign_tiendas_store_id_index');
            $table->foreignId('montador_id')->nullable()->constrained('entidades');
            $table->date('fechaprev1')->nullable();
            $table->date('fechaprev2')->nullable();
            $table->date('fechaprev3')->nullable();
            $table->date('fechamontador1')->nullable();
            $table->date('fechamontador2')->nullable();
            $table->date('fechamontador3')->nullable();
            $table->string('montaje1')->nullable();
            $table->string('montaje2')->nullable();
            $table->string('montaje3')->nullable();
            $table->decimal('preciomontador', 8, 2)->nullable()->default(0.00);
            $table->date('observacionesmontador')->nullable();
            $table->integer('estadomontaje')->nullable()->default('0');
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
        Schema::dropIfExists('campaign_tiendas');
    }
}
