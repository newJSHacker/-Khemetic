<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_reg_no');
            $table->string('supplier_name');
            $table->string('address');
            $table->integer('phone');
            $table->string('email');
            $table->string('website');
            $table->string('contact_person');
            $table->string('cp_designation');
            $table->integer('cp_phone');
            $table->string('cp_email');
            $table->integer('supplier_category');
            $table->integer('status');
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
        Schema::dropIfExists('suppliers');
    }
}
