<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('email');
            $table->string('password',255);
            $table->string('gender');
            $table->string('address');
            $table->string('token',100);
            $table->integer('status');
            $table->timestamp('login_at');
            $table->timestamps(); //will create created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
