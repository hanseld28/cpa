<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePhonesTable.
 */
class CreatePhonesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phones', function(Blueprint $table) {
			$table->increments('id');
			
			$table->char('number',11);
			$table->integer('person_id')->unsined();

			$table->timestamps();
			$table->softDeletes();

			$table->foreign('person_id')->references('id')->on('people');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('phones', function(Blueprint $table) {
			$table->dropForeign('phones_person_id_foreign');
		});

		Schema::drop('phones');
	}
}
