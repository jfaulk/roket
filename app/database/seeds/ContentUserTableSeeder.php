<?php

class ContentUserTableSeeder extends Seeder {
	public function run()
	{
		DB::table('content_user')->insert(array(
			'content_id' => 1,
			'user_id' => 3,
		));
		DB::table('content_user')->insert(array(
			'content_id' => 2,
			'user_id' => 3,
		));
		DB::table('content_user')->insert(array(
			'content_id' => 3,
			'user_id' => 1,
		));
		DB::table('content_user')->insert(array(
			'content_id' => 3,
			'user_id' => 2,
		));
	}
}