<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizeResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quize_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exam_id');
            $table->string('user_id');
            $table->string('yes_ans');
            $table->string('no_ans');
            $table->string('result_json');
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
        Schema::dropIfExists('quize_results');
    }
}
