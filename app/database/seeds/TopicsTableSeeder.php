<?php

class TopicsTableSeeder extends Seeder {
	
	public function run()
    {
        DB::table('topics')->insert(array(
            array('topic' => 'music'),
            array('topic' => 'movies'),
            array('topic' => 'television'),
		));
    }
}