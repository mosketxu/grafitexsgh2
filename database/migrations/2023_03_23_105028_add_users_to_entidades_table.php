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
        Schema::table('entidades', function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable()->after('observaciones');
            $table->string('useremail')->nullable()->after('user_id')->unique();
            $table->string('password')->nullable()->after('useremail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entidades', function (Blueprint $table) {
            Schema::dropIfExists('user_id');
            Schema::dropIfExists('useremail');
            Schema::dropIfExists('password');
        });
    }
};
