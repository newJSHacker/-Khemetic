<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quotation_number');
            $table->integer('quoted_item_code');
            $table->integer('quoted_item_price');
            $table->integer('quoted_item_qty');
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
        Schema::dropIfExists('temp_quotations');
    }
}
