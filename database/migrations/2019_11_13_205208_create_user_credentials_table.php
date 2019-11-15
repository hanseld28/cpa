<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUserCredentialsTable.
 */
class CreateUserCredentialsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_credentials', function(Blueprint $table) {
			$table->increments('id');
			
			$table->integer('user_id')->unsined();
			$table->integer('user_type_id')->unsined();
			
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::table('user_credentials', function(Blueprint $table) {
			$table->dropForeign('user_credentials_user_id_foreign');
			$table->dropForeign('user_credentials_user_type_id_foreign');
		});

		Schema::drop('user_credentials');
	}
}
