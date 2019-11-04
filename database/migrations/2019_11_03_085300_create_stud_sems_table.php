<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudSemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_sems', function (Blueprint $table) {
            $table->integer('student_id')->unsigned();
            $table->integer('semester_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('semester_id')->references('id')->on('semesters');

            $table->primary(['student_id','semester_id']);

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
        Schema::dropIfExists('stud_sems');
    }
}
