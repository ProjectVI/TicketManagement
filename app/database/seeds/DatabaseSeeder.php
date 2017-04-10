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

		// $this->call('UserTableSeeder');
        DB::table('users')->delete();

        User::create(array(
            'first_name'=> 'projectvi',
            'last_name'  => 'admin',
            'email'    => 'projectvi@ait.ac.th',
            //'username' => 'projectvi',
            'password' => Hash::make('projectvi'),
//            'role_id' => '1',
//            'team' => 'DEV',
//            'flag' => 'A',
        ));
        User::create(array(
            'first_name'=> 'projectvi',
            'last_name'  => 'admin',
            'email'    => 'a@a.com',
            //'username' => 'projectvi',
            'password' => Hash::make('projectvi'),
//            'role_id' => '1',
//            'team' => 'DEV',
//            'flag' => 'A',
        ));
	}

}
