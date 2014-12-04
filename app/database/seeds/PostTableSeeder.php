<?php

class PostTableSeeder extends Seeder {

	public function run()
	{
		$now = date('Y-m-d H:i:s');

		DB::table('posts')->insert(array(
			'user_id' => 1,
			'title' => 'Monday',
			'content' => "It's a monday...",
			'created_at' => $now,
			'updated_at' => $now,
			));

        DB::table('posts')->insert(array(
            'user_id' => 2,
            'title' => 'Tuesday',
            'content' => "It's a tuesday...",
            'created_at' => $now,
            'updated_at' => $now,
        ));

        DB::table('posts')->insert(array(
            'user_id' => 3,
            'title' => 'Wednesday',
            'content' => "It's a wednesday...",
            'created_at' => $now,
            'updated_at' => $now,
        ));

        DB::table('posts')->insert(array(
            'user_id' => 4,
            'title' => 'Thursday',
            'content' => "It's a thursday...",
            'created_at' => $now,
            'updated_at' => $now,
        ));
	}
}