<?php

class PostTopicTableSeeder extends Seeder {
	public function run()
	{
		DB::table('post_topic')->insert(array(
			'post_id' => 1,
			'topic_id' => 1,
		));
		DB::table('post_topic')->insert(array(
			'post_id' => 1,
			'topic_id' => 2,
		));DB::table('post_topic')->insert(array(
			'post_id' => 1,
			'topic_id' => 3,
		));
		DB::table('post_topic')->insert(array(
			'post_id' => 2,
			'topic_id' => 1,
		));
		DB::table('post_topic')->insert(array(
			'post_id' => 2,
			'topic_id' => 2,
		));
		DB::table('post_topic')->insert(array(
			'post_id' => 3,
			'topic_id' => 3,
		));
	}
}