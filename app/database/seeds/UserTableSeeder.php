<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'firstname' => 'Werapat',
            'surname'   => 'Threerawipark',
            'email'     => 'teeravipark@gmail.com',
            'username'  => 'teeravipark',
            'team_id'   => 1,
            'remark'    => 'test',
            'flag'      => 'A',
            'role_id'   => 1,
            'password'  => Hash::make('qwertyui'),
        ));
    }

}
