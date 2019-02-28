<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nrp_dosen');
            $table->string('name',100);
            $table->string('email');
            $table->string('password',255);
            $table->string('gender');
            $table->string('address');
            $table->string('token',100);
            $table->timestamp('login_at');
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
        Schema::dropIfExists('lecturer');
    }
}
