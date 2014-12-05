<?php

class ContentTableSeeder extends Seeder {
	
	public function run()
	{
		DB::table('content')->insert(array(
			array('name' => 'nudity'),
			array('name' => 'violence'),
			array('name' => 'religion'),
		));
	}
}