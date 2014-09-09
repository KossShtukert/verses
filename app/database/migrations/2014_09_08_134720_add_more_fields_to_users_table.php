<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddMoreFieldsToUsersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table(
			'users', function (Blueprint $table) {
				$table->enum('gender', ['male', 'female'])->after('nick_name')->nullable();
				$table->date('birthday')->after('gender')->nullable();
				$table->string('about', 255)->after('birthday')->nullable();
			}
		);
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table(
			'users', function (Blueprint $table) {
				$table->dropColumn('gender');
				$table->dropColumn('birthday');
				$table->dropColumn('about');
			}
		);
	}
}