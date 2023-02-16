<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignPresupuestoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_presupuesto_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('presupuesto_id');
            $table->string('familia', 20);
            $table->decimal('precio', 8, 2)->default(0.00);
            $table->integer('unidades')->default(0);
            $table->decimal('total', 8, 2)->default(0.00);
            $table->timestamps();
            
            $table->foreign('presupuesto_id', 'campaign_presupuesto_detalles_presupuesto_id_foreign')->references('id')->on('campaign_presupuestos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_presupuesto_detalles');
    }
}
