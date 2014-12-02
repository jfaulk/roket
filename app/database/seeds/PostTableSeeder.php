<?php

class PostTableSeeder extends Seeder {

	public function run()
	{
		$now = date('Y-m-d H:i:s');

		DB::table('posts')->insert(array(
			'user_id' => 1,
			'title' => 'Hello',
            'slug' => 'hello',
			'content' => "A post!",
			'created_at' => $now,
			'updated_at' => $now,
			));

        DB::table('posts')->insert(array(
            'user_id' => 2,
            'title' => 'Hello',
            'slug' => 'hello',
            'content' => "A post!",
            'created_at' => $now,
            'updated_at' => $now,
        ));

        DB::table('posts')->insert(array(
            'user_id' => 3,
            'title' => 'Hello',
            'slug' => 'hello',
            'content' => "A post!",
            'created_at' => $now,
            'updated_at' => $now,
        ));

        DB::table('posts')->insert(array(
            'user_id' => 4,
            'title' => 'Hello',
            'slug' => 'hello',
            'content' => "A post!",
            'created_at' => $now,
            'updated_at' => $now,
        ));
	}
}