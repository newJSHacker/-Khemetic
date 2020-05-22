<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempSdnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_sdns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sales_sdn_number');
            $table->string('sales_delivered_item');
            $table->integer('sales_delivered_qty');
            $table->integer('sales_inv_code');

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
        Schema::dropIfExists('temp_sdns');
    }
}
