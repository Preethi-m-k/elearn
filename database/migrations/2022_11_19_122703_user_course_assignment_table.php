<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserCourseAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_course_assignment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_id');
            $table->string('user_id');
            $table->string('file');
            $table->string('rating');
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
        Schema::dropIfExists('user_course_assignment');
    }
}
