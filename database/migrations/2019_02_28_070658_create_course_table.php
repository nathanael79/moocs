<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('course_name');
            $table->text('keterangan');
            $table->string('pictures');
            $table->bigInteger('lecturer_id')->unsigned();
            $table->foreign('lecturer_id')->references('id')->on('lecturer')->onDelete('cascade');
            $table->bigInteger('course_category_id')->unsigned();
            $table->foreign('course_category_id')->references('id')->on('course_category')->onDelete('cascade');
            $table->timestamps();
            //$table->string('completion',100);
            $table->string('status',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}
