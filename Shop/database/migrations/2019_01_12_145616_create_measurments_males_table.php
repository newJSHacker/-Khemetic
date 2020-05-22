<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurmentsMalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurments_males', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('profile_name');
            $table->double('around_neck');
            $table->double('shoulder');
            $table->double('armhole');
            $table->double('around_chest');
            $table->double('around_navel');
            $table->double('around_wrist');
            $table->double('sherwani_length');
            $table->double('around_calf');
            $table->double('trouser_length');
            $table->double('biceps');
            $table->double('sleevs_length');
            $table->double('around_waist');
            $table->double('around_hip');
            $table->double('around_thigh');
            $table->double('around_knee');
            $table->double('trouser_inseams');
            $table->double('around_ankle');
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
        Schema::dropIfExists('measurments_males');
    }
}
