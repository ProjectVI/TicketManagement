<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('ticket_status', function($table)
			{
				 $table->increments('id')->unique();
				 $table->string('name',30);
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
			Schema::dropIfExists('ticket_status');
			DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
