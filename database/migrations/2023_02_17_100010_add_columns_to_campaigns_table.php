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
        Schema::table('campaigns', function (Blueprint $table) {
            $table->date('fechainstalini')->nullable();
            $table->date('fechainstalfin')->nullable();
            $table->boolean('estadoinstalacion')->nullable()->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign', function (Blueprint $table) {
            $table->dropColumn('fechainstalini');
            $table->dropColumn('fechainstalfin');
            $table->dropColumn('estadoinstalacion');

        });
    }
};
