<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles', function(Blueprint $table)
		{
				$table->increments('id')->unique();
		 		$table->string('name', 15);
		 		$table->char('flag', 1);
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
			DB::statement('SET FOREIGN_KEY_CHECKS = 0');
			Schema::dropIfExists('roles');
			DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
