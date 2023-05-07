<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->bigIncrements('question_id');
            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')
                  ->references('quiz_id')
                  ->on('quiz')
                  ->onDelete('cascade');
            $table->string('question');
            $table->string('answer');
            $table->boolean('correction');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_questions');
    }
}