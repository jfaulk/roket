<?php

class FolloweeUserTableSeeder extends Seeder {
	public function run()
	{
		DB::table('followee_user')->insert(array(
			'followee_id' => 2,
			'user_id' => 1,
		));
		DB::table('followee_user')->insert(array(
			'followee_id' => 4,
			'user_id' => 1,
		));
		DB::table('followee_user')->insert(array(
			'followee_id' => 1,
			'user_id' => 2,
		));
		DB::table('followee_user')->insert(array(
			'followee_id' => 4,
			'user_id' => 2,
		));
		DB::table('followee_user')->insert(array(
			'followee_id' => 4,
			'user_id' => 3,
		));
	}
}