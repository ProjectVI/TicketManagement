<?php

class EventTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('ticket_channels')->delete();
        Channel::create(array(
            'id' => '1',
            'name'=> 'Email',
        ));
        Channel::create(array(
            'id' => '2',
            'name'=> 'Chat',
        ));
        Channel::create(array(
            'id' => '3',
            'name'=> 'Phone',
        ));

        DB::table('ticket_status')->delete();
        Status::create(array(
            'id' => '1',
            'name'=> 'Open',
        ));
        Status::create(array(
            'id' => '2',
            'name'=> 'Pending',
        ));
        Status::create(array(
            'id' => '3',
            'name'=> 'Close(RST)',
        ));
        Status::create(array(
            'id' => '4',
            'name'=> 'Close(AR)',
        ));

        DB::table('ticket_subjects')->delete();
        Subject::create(array(
            'id' => '1',
            'name'=> 'Sub1',
        ));
        Subject::create(array(
            'id' => '2',
            'name'=> 'Sub2',
        ));
        Subject::create(array(
            'id' => '3',
            'name'=> 'Sub3',
        ));


    }

}
