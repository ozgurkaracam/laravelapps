<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('answer_id');
//            $table->unsignedBigInteger('quiz_id');
//            $table->unsignedBigInteger('question_id');

            $table->foreign('user_id')->on('users')->references('id')->onDelete('CASCADE');
            $table->foreign('answer_id')->on('answers')->references('id')->onDelete('CASCADE');
//            $table->foreign('quiz_id')->on('quiz_id')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('results');
    }
}
