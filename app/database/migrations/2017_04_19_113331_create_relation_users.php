<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::table('users', function(Blueprint $table) {
          $table->foreign('role_id')
								->references('id')->on('roles')
              	->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('team_id')
              	->references('id')->on('teams')
              	->onUpdate('cascade')->onDelete('cascade');
      });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
