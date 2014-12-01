<?php

class ContentPostTableSeeder extends Seeder {
	public function run()
	{
		DB::table('content_post')->insert(array(
			'content_id' => 1,
			'post_id' => 1,
		));
		DB::table('content_post')->insert(array(
			'content_id' => 1,
			'post_id' => 2,
		));
		DB::table('content_post')->insert(array(
			'content_id' => 2,
			'post_id' => 1,
		));
		DB::table('content_post')->insert(array(
			'content_id' => 2,
			'post_id' => 2,
		));
		DB::table('content_post')->insert(array(
			'content_id' => 3,
			'post_id' =>3
		));
	}
}