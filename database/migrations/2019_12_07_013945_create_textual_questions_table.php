<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextualQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textual_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_id')->unsined();
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions');
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('textual_questions', function(Blueprint $table) {
			$table->dropForeign('textual_questions_question_id_foreign');
        });
        
        Schema::dropIfExists('textual_questions');
    }
}
