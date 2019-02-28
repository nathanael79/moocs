<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCourseDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_course_detail', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('sub_course_detail_name');
            $table->string('sub_course_detail_type');
            $table->string('sub_course_detail_path');
            $table->string('sub_course_detail_description');
            $table->bigInteger('view');
            $table->bigInteger('sub_course_id')->unsigned();
            $table->foreign('sub_course_id')->references('id')->on('sub_course');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_course_detail');
    }
}
