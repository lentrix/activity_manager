<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttSchedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('att_scheds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attendance_id')->unsigned();
            $table->string('label');
            $table->timestamp('open')->nullable();
            $table->timestamp('close')->nullable();
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
        Schema::dropIfExists('att_scheds');
    }
}
