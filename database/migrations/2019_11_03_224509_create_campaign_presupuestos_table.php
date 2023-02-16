<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignPresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_presupuestos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id');
            $table->string('referencia', 100);
            $table->date('fecha');
            $table->string('version', 50)->nullable();
            $table->string('atencion', 50)->nullable();
            $table->decimal('total', 8, 2)->default(0.00);
            $table->string('observaciones')->nullable();
            $table->string('estado', 10)->default('creado');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            
            $table->foreign('campaign_id', 'campaign_presupuestos_campaign_id_foreign')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_presupuestos');
    }
}
