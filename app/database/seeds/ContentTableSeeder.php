<?php

class ContentTableSeeder extends Seeder {
	
	public function run()
	{
		DB::table('content')->insert(array(
			array('tag' => 'nudity'),
			array('tag' => 'violence'),
			array('tag' => 'religion'),
		));
	}
}