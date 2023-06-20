<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_elementos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('elemento_id')->index('campaign_elementos_elemento_id_index');
            $table->unsignedBigInteger('tienda_id');
            $table->foreign('tienda_id', 'campaign_elementos_tienda_id_foreign')->references('id')->on('campaign_tiendas')->onDelete('cascade');
            $table->bigInteger('store_id')->index('campaign_elementos_store_id_index');
            $table->string('name', 100)->index('campaign_elementos_name_index');
            $table->string('country', 2)->index('campaign_elementos_country_index');
            $table->string('idioma')->nullable();
            $table->string('area', 20)->index('campaign_elementos_area_index');
            $table->string('zona', 20)->index('campaign_elementos_zona_index');
            $table->string('segmento', 20)->index('campaign_elementos_segmento_index');
            $table->string('storeconcept', 50)->index('campaign_elementos_storeconcept_index');
            $table->string('ubicacion', 20)->index('campaign_elementos_ubicacion_index');
            $table->string('mobiliario', 100)->index('campaign_elementos_mobiliario_index');
            $table->string('propxelemento', 50)->nullable()->index('campaign_elementos_propxelemento_index');
            $table->string('carteleria', 50)->index('campaign_elementos_carteleria_index');
            $table->string('medida', 50)->index('campaign_elementos_medida_index');
            $table->string('material', 50)->index('campaign_elementos_material_index');
            $table->integer('familia')->index('campaign_elementos_familia_index');
            $table->string('matmed')->index('campaign_elementos_matmed_index');
            $table->string('unitxprop', 20)->nullable();
            $table->string('imagen')->nullable();
            $table->string('elemento')->index('campaign_elementos_elemento_index');
            $table->string('ECI');
            $table->string('observaciones')->nullable();
            $table->decimal('precio', 8, 2)->nullable();
            $table->integer('estadorecepcion')->default(0);
            $table->string('obsrecepcion')->nullable();
            $table->dateTime('fecharecepcion')->nullable();
            $table->boolean('OK')->nullable()->default(0);
            $table->boolean('KO')->nullable()->default(0);
            $table->timestamp('deleted_at')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('campaign_elementos');
    }
}
