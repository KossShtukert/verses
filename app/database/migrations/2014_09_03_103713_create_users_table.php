<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create(
			'users',
			function (Blueprint $table) {
				$table->increments('id');
				$table->string('email', 30)->unique();
				$table->string('password', 60);
				$table->string('first_name', 20)->nullable();
				$table->string('last_name', 20)->nullable();
				$table->string('nick_name', 20)->nullable();
				$table->boolean('isAdmin');
				$table->boolean('isActive')->index();
				$table->string('activationCode');
				$table->rememberToken();
				$table->timestamps();
			}
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users');
	}

}
