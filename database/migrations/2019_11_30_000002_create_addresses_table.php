<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('store_id');
            $table->string('countrycode', 2);
            $table->string('channel');
            $table->string('storename');
            $table->string('address');
            $table->string('number');
            $table->string('city');
            $table->string('province');
            $table->string('postalcode');
            $table->string('phone');
            $table->string('email');
            $table->string('storeconcept');
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
