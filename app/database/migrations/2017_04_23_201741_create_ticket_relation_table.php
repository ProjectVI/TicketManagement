<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketRelationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::table('tickets', function(Blueprint $table) {
					$table->foreign('channel_id')
								->references('id')->on('ticket_channels')
								->onUpdate('cascade')->onDelete('cascade');
					$table->foreign('subject_id')
								->references('id')->on('ticket_subjects')
								->onUpdate('cascade')->onDelete('cascade');
					$table->foreign('status_id')
								->references('id')->on('ticket_status')
								->onUpdate('cascade')->onDelete('cascade');
					$table->foreign('created_by')
								->references('id')->on('users')
								->onUpdate('cascade')->onDelete('cascade');
					$table->foreign('updated_by')
								->references('id')->on('users')
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
