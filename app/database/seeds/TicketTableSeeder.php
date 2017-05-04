<?php

class EventTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('ticket_channels')->delete();
        Channel::create(array(
            'id' => '1',
            'name'=> 'Email',
            'flag'   => 'A',
        ));
        Channel::create(array(
            'id' => '2',
            'name'=> 'Chat',
            'flag'   => 'A',
        ));
        Channel::create(array(
            'id' => '3',
            'name'=> 'Phone',
            'flag'   => 'A',
        ));

        DB::table('ticket_status')->delete();
        Status::create(array(
            'id' => '1',
            'name'=> 'Open',
            'flag'   => 'A',
        ));
        Status::create(array(
            'id' => '2',
            'name'=> 'Pending',
            'flag'   => 'A',
        ));
        Status::create(array(
            'id' => '3',
            'name'=> 'Close(RST)',
            'flag'   => 'A',
        ));
        Status::create(array(
            'id' => '4',
            'name'=> 'Close(AR)',
            'flag'   => 'A',
        ));

        DB::table('ticket_subjects')->delete();
        Subject::create(array(
            'id' => '1',
            'name'=> 'Sub1',
            'flag'   => 'A',
        ));
        Subject::create(array(
            'id' => '2',
            'name'=> 'Sub2',
            'flag'   => 'A',
        ));
        Subject::create(array(
            'id' => '3',
            'name'=> 'Sub3',
            'flag'   => 'A',
        ));


    }

}
