<?php

class PostTableSeeder extends Seeder {

	public function run()
	{
		$now = date('Y-m-d H:i:s');

		DB::table('posts')->insert(array(
			'user_id' => 1,
			'post_title' => 'Hello',
			'post_contents' => "<h1>Hello</h1>",
			'created_at' => $now,
			'updated_at' => $now,
			));

        DB::table('posts')->insert(array(
            'user_id' => 2,
            'post_title' => 'Hello',
            'post_contents' => "<h1>Hello</h1>",
            'created_at' => $now,
            'updated_at' => $now,
        ));

        DB::table('posts')->insert(array(
            'user_id' => 3,
            'post_title' => 'Hello',
            'post_contents' => "<h1>Hello</h1>",
            'created_at' => $now,
            'updated_at' => $now,
        ));

        DB::table('posts')->insert(array(
            'user_id' => 4,
            'post_title' => 'Hello',
            'post_contents' => "<h1>Hello</h1>",
            'created_at' => $now,
            'updated_at' => $now,
        ));
	}
}