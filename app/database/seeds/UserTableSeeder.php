<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('roles')->delete();
        Role::create(array(
            'id' => 1,
            'name' => 'Admin',
            'flag'   => 'A',
        ));
        Role::create(array(
            'id' => 2,
            'name' => 'Manager',
            'flag'   => 'A',
        ));
        Role::create(array(
            'id' => 3,
            'name' => 'Staff',
            'flag'   => 'A',
        ));

        DB::table('teams')->delete();
        Team::create(array(
            'id' => 1,
            'name'=> 'RST',
            'flag' => 'A',
        ));
        Team::create(array(
            'id' => 2,
            'name'=> 'CR',
            'flag' => 'A',
        ));

        DB::table('users')->delete();
        User::create(array(
            'firstname' => 'Werapat',
            'surname'   => 'Threerawipark',
            'email'     => 'teeravipark@gmail.com',
            'username'  => 'teeravipark',
            'password'  => Hash::make('qwertyui'),
            'team_id'   => 1,
            'role_id'   => 1,
            'flag'      => 'A',
        ));
        User::create(array(
           'firstname'=> 'admin',
           'surname'  => 'projectvi',
           'email'    => 'adminprojectvi@ait.ac.th',
           'username' => 'adminprojectvi',
           'password' => Hash::make('projectvi'),
           'team_id'   => 1,
           'role_id'   => 1,
           'flag'      => 'A',
       ));
       User::create(array(
           'firstname'=> 'projectvi',
           'surname'  => 'manager',
           'email'    => 'managerprojectvi@ait.ac.th',
           'username' => 'managerprojectvi',
           'password' => Hash::make('projectvi'),
           'team_id'   => 2,
           'role_id'   => 2,
           'flag'      => 'A',
       ));
       User::create(array(
           'firstname'=> 'projectvi',
           'surname'  => 'staff',
           'email'    => 'staffprojectvi@ait.ac.th',
           'username' => 'staffprojectvi',
           'password' => Hash::make('projectvi'),
           'team_id'   => 2,
           'role_id'   => 3,
           'flag'      => 'A',
       ));
    }

}
