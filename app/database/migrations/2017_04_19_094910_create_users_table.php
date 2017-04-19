<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('users', function(Blueprint $table)
      {
					$table->increments('id')->unique();
					$table->string('firstname', 32);
					$table->string('surname', 32);
					$table->string('email', 100);
					$table->string('username', 32);
					$table->string('password', 64);
					$table->string('remark', 30)->nullable();
					$table->char('flag', 1);
					$table->integer('team_id')->unsigned();
					$table->integer('role_id')->unsigned();
					$table->string('remember_token', 100)->nullable();
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
			Schema::dropIfExists('users');
	}

}
