<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEvaluationFormsTable.
 */
class CreateEvaluationFormsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluation_forms', function(Blueprint $table) {
            $table->increments('id');

			$table->string('title', 100);
			$table->string('description', 5000);
			
			$table->date('begin_date');
			$table->date('end_date');

            $table->rememberToken();
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('user_type_id')->references('id')->on('user_types');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('evaluation_forms');
	}
}
