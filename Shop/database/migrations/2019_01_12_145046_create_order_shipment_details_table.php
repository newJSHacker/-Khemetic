<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderShipmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_shipment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('receiver_name');
            $table->string('receiver_email');
            $table->string('receiver_contact');
            $table->string('receiver_alternative_contact');
            $table->string('receiver_address');
            $table->string('receiver_shipment_landmark');
            $table->string('receiver_country');
            $table->string('receiver_city');
            $table->string('receiver_stat');
            $table->string('receiver_zipcode');
            $table->string('receiver_shipment_method');
            $table->integer('user_temp_order_id');
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
        Schema::dropIfExists('order_shipment_details');
    }
}
