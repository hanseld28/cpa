<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateQuestionsTable.
 */
class CreateQuestionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
            $table->increments('id');
			$table->string('description');
			$table->integer('evaluation_form_id')->unsined();
			
			$table->timestamps();
			
			$table->foreign('evaluation_form_id')->references('id')->on('evaluation_forms');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_evaluation_form_id_foreign');
		});
		Schema::drop('questions');
	}
}
