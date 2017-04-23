<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('tickets', function ($table) {
          $table->increments('id')->unique();
          $table->string('domain');
          $table->string('organization');
          $table->string('problem', 50)->nullable();
          $table->text('answer', 50)->nullable();
          $table->text('remark', 50)->nullable();
          $table->string('contact_name', 50)->nullable();
          $table->string('contact_phone', 20)->nullable();
          $table->string('contact_email', 50)->nullable();
          $table->string('channel_info', 15)->nullable();
          $table->integer('channel_id')->unsigned();
          $table->integer('subject_id')->unsigned();
          $table->integer('status_id')->unsigned();
					$table->integer('created_by')->unsigned();
          $table->integer('updated_by')->unsigned();
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
			Schema::dropIfExists('tickets');
			DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
