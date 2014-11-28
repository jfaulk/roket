<?php

class TopicsTableSeeder extends Seeder {
	
	public function run()
    {
        DB::table('topics')->insert(array(
            array('tag' => 'music'),
            array('tag' => 'movies'),
            array('tag' => 'television'),
		));
    }
}