<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesPerchaseRequestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_perchase_request_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_request_number');
            $table->integer('purchase_requested_item');
            $table->integer('purchase_requested_qty');
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
        Schema::dropIfExists('sales_perchase_request_details');
    }
}
