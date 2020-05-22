<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCurrentInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_current_inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_code');
            $table->integer('item_qty_in_hand');
            $table->integer('item_current_selling_price');
            $table->integer('item_current_purchase_price');
            $table->integer('item_current_avg_price');
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
        Schema::dropIfExists('item_current_inventories');
    }
}
