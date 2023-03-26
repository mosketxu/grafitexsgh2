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
        Schema::table('campaign_tiendas', function (Blueprint $table) {
            $table->foreignId('montador_id')->nullable()->after('store_id')->constrained('entidades');
            $table->date('fechaprev1')->nullable()->after('montador_id');
            $table->date('fechaprev2')->nullable()->after('fechaprev1');
            $table->date('fechaprev3')->nullable()->after('fechaprev2');
            $table->date('fechamontador1')->nullable()->after('fechaprev3');
            $table->date('fechamontador2')->nullable()->after('fechamontador1');
            $table->date('fechamontador3')->nullable()->after('fechamontador2');
            $table->string('montaje1')->nullable()->after('fechamontador3');
            $table->string('montaje2')->nullable()->after('montaje1');
            $table->string('montaje3')->nullable()->after('montaje2');
            $table->date('observacionesmontador')->nullable()->after('montaje3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_tiendas', function (Blueprint $table) {
            $table->dropColumn('montador_id');
            $table->dropColumn('fechaprev1');
            $table->dropColumn('fechaprev2');
            $table->dropColumn('fechaprev3');
            $table->dropColumn('fechamontador1');
            $table->dropColumn('fechamontador2');
            $table->dropColumn('fechamontador3');
            $table->dropColumn('montaje1');
            $table->dropColumn('montaje2');
            $table->dropColumn('montaje3');
            $table->dropColumn('observacionesmontador');
        });
    }
};
