<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesSdnDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_sdn_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sales_sdn_number');
            $table->integer('sales_delivered_item');
            $table->integer('sales_delivered_qty');
            $table->string('sales_receiver');
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
        Schema::dropIfExists('sales_sdn_details');
    }
}
