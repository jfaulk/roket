<?php

class PostsTopicsTableSeeder extends Seeder {
	public function run()
	{
		DB::table('posts_topics')->insert(array(
		'post_id' => 1,
		'topic_id' => 1,
		));
		DB::table('posts_topics')->insert(array(
		'post_id' => 2,
		'topic_id' => 2,
		));
		DB::table('posts_topics')->insert(array(
		'post_id' => 3,
		'topic_id' => 3,
		));
	}
}