<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUcartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ucarts', function (Blueprint $table) {
            $table->increments('cid');
            $table->integer('item_code');
            $table->integer('item_qty');
            $table->integer('date_of_addition');
            $table->integer('user_measurment_id');
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
        Schema::dropIfExists('ucarts');
    }
}
