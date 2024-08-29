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
        Schema::table('campaign_elementos', function (Blueprint $table) {
            $table->string('store_cluster', 20)->nullable()->after('storeconcept')->index('campaign_elementos_store_cluster_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_elementos', function (Blueprint $table) {
            $table->dropColumn('store_cluster');
        });
    }
};
