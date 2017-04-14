<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// Roles

        DB::table('roles')->delete();
        Role::create(array(
            'role_id' => '1',
            'role_name'=> 'Admin',
            'flag' => 'A',
        ));
        Role::create(array(
            'role_id' => '2',
            'role_name'=> 'Manager',
            'flag' => 'A',
        ));
        Role::create(array(
            'role_id' => '3',
            'role_name'=> 'Staff',
            'flag' => 'A',
        ));

        // Teams

        DB::table('teams')->delete();
        Team::create(array(
            'team_id' => '1',
            'team_name'=> 'RST',
            'flag' => 'A',
        ));
        Team::create(array(
            'team_id' => '2',
            'team_name'=> 'CR',
            'flag' => 'A',
        ));

        // Users

        DB::table('users')->delete();

        User::create(array(
            'id' => '1',
            'firstname'=> 'admin',
            'surname'  => 'projectvi',
            'email'    => 'adminprojectvi@ait.ac.th',
            'username' => 'adminprojectvi',
            'password' => Hash::make('projectvi'),
            'role_id' => '1',
            'team_id' => '1',
            'flag' => 'A',
        ));
        User::create(array(
            'id' => '2',
            'firstname'=> 'projectvi',
            'surname'  => 'manager',
            'email'    => 'managerprojectvi@ait.ac.th',
            'username' => 'managerprojectvi',
            'password' => Hash::make('projectvi'),
            'role_id' => '2',
            'team_id' => '2',
            'flag' => 'A',
        ));
        User::create(array(
            'id' => '3',
            'firstname'=> 'projectvi',
            'surname'  => 'staff',
            'email'    => 'staffprojectvi@ait.ac.th',
            'username' => 'staffprojectvi',
            'password' => Hash::make('projectvi'),
            'role_id' => '3',
            'team_id' => '2',
            'flag' => 'A',
        ));

        // Ticket Channel

        DB::table('ticket_channels')->delete();
        Channel::create(array(
            'channel_id' => '1',
            'channel_name'=> 'Email',
        ));
        Channel::create(array(
            'channel_id' => '2',
            'channel_name'=> 'Chat',
        ));
        Channel::create(array(
            'channel_id' => '3',
            'channel_name'=> 'Phone',
        ));

        // Ticket Status

        DB::table('ticket_status')->delete();
        Status::create(array(
            'status_id' => '1',
            'status_name'=> 'Open',
        ));
        Status::create(array(
            'status_id' => '2',
            'status_name'=> 'Pending',
        ));
        Status::create(array(
            'status_id' => '3',
            'status_name'=> 'Close(RST)',
        ));
        Status::create(array(
            'status_id' => '4',
            'status_name'=> 'Close(AR)',
        ));

        // Ticket Subject

        DB::table('ticket_subjects')->delete();
        Subject::create(array(
            'subject_id' => '1',
            'subject_name'=> 'Sub1',
        ));
        Subject::create(array(
            'subject_id' => '2',
            'subject_name'=> 'Sub2',
        ));
        Subject::create(array(
            'subject_id' => '3',
            'subject_name'=> 'Sub3',
        ));


	}

}
