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
            $table->date('fechainstal1')->nullable();
            $table->date('fechainstal2')->nullable();
            $table->date('fechainstal3')->nullable();
            $table->string('monta_desmonta1')->nullable();
            $table->string('monta_desmonta2')->nullable();
            $table->string('monta_desmonta3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropColumn('fechainstal1');
            $table->dropColumn('monta_desmonta1');
            $table->dropColumn('fechainstal2');
            $table->dropColumn('monta_desmonta2');
            $table->dropColumn('fechainstal3');
            $table->dropColumn('monta_desmonta3');

        });
    }
};
