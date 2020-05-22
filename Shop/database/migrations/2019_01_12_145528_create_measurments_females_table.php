<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurmentsFemalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurments_females', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('profile_name');
            $table->double('neck');
            $table->double('over_bust');
            $table->double('bust');
            $table->double('under_bust');
            $table->double('waist');
            $table->double('hips');
            $table->double('neck_to_heel');
            $table->double('neck_to_aboveknee');
            $table->double('aboveknee_to_ankle');
            $table->double('arm_lenth');
            $table->double('sholder_seam');
            $table->double('arm_hole');
            $table->double('baicep');
            $table->double('fore_arm');
            $table->double('wrist');
            $table->double('v_neck_cut');
            $table->double('shulder_to_waist');
            $table->double('waist_to_above_neck');
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
        Schema::dropIfExists('measurments_females');
    }
}
