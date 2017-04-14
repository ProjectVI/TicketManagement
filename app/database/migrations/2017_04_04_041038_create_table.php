<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('roles', function ($table) {
            $table->increments('role_id')->unique();
            $table->string('role_name', 15);
            $table->char('flag', 1);
        });
        Schema::create('teams', function ($table) {
            $table->increments('team_id')->unique();
            $table->string('team_name', 15);
            $table->char('flag', 1);
        });
        /*
        Schema::create('users', function ($table) {
            $table->increments('id')->unique();
            $table->string('firstname', 50);
            $table->string('surname', 50);
            $table->string('email', 50);
            $table->string('username', 30);
            $table->string('password', 30);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->integer('team_id')->unsigned();
            $table->string('remark', 30);
            $table->char('flag', 1);
            $table->integer('role_id')->unsigned();

        });

        Schema::table('users', function($table) {
            $table->foreign('role_id')
                ->references('role_id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('team_id')
                ->references('team_id')->on('teams')
                ->onUpdate('cascade')->onDelete('cascade');
        });
        */
        Schema::create('ticket_channels', function($table)
        {
            $table->increments('channel_id')->unique();
            $table->string('channel_name',15);
            $table->char('flag', 1);
        });

        Schema::create('ticket_subjects', function($table)
        {
            $table->increments('subject_id')->unique();
            $table->string('subject_name',50);
            $table->char('flag', 1);
        });

        Schema::create('ticket_status', function($table)
        {
            $table->increments('status_id')->unique();
            $table->string('status_name',15);
            $table->char('flag', 1);
        });

        Schema::create('tickets', function ($table) {
            $table->increments('ticket_id')->unique();
            $table->string('domain');
            $table->string('organization');
            $table->string('problem', 50);
            $table->text('answer', 50)->nullable();
            $table->text('remark', 50)->nullable();
            $table->string('contact_name', 50)->nullable();
            $table->string('contact_phone', 20)->nullable();
            $table->string('contact_email', 50)->nullable();
            $table->string('fax_id', 15)->nullable();
            $table->string('email_id', 15)->nullable();
            $table->string('chat_id', 15)->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->char('flag', 1);
            $table->integer('channel_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('status_id')->unsigned();
        });

        Schema::table('tickets', function($table) {
            $table->foreign('channel_id')
                ->references('channel_id')->on('ticket_channels')
                ->onDelete('cascade');
            $table->foreign('subject_id')
                ->references('subject_id')->on('ticket_subjects')
                ->onDelete('cascade');
            $table->foreign('status_id')
                ->references('status_id')->on('ticket_status')
                ->onDelete('cascade');
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
        Schema::dropIfExists('roles');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('ticket_chanels');
        Schema::dropIfExists('ticket_status');
        Schema::dropIfExists('ticket_subjects');
	}

}
