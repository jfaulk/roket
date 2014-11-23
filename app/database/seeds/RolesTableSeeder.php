<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->insert(array(
            array('name' => 'Administrator'),
            array('name' => 'Sentinel'),
            array('name' => 'User'),
            ));
    }
}