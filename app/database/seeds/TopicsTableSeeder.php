<?php

class TopicsTableSeeder extends Seeder {
	
	public function run()
		DB::table('topics')->insert(array('tag' => 'music'));
		DB::table('topics')->insert(array('tag' => 'movies'));
		DB::table('topics')->insert(array('tag' => 'television'));
}