<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
			
			$table->string('email', 100)->unique();
			$table->string('password', 300);
			$table->string('avatar', 2000);

			$table->integer('person_id')->unsined();

            $table->rememberToken();
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
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_person_id_foreign');
		});

		Schema::drop('users');
	}
}
