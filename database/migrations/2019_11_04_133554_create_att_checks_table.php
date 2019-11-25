<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('att_checks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('stud_sem_id')->unsigned();
            $table->bigInteger('att_sched_id')->unsigned();
            $table->timestamp('check_time');
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('valid');

            $table->foreign('stud_sem_id')->references('id')->on('stud_sems');
            $table->foreign('att_sched_id')->references('id')->on('att_scheds');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('att_checks');
    }
}
