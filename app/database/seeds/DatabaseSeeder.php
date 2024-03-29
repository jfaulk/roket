<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('RolesTableSeeder');
		$this->call('UserTableSeeder');
        $this->call('PostTableSeeder');
		$this->call('TopicsTableSeeder');
		$this->call('PostTopicTableSeeder');
		$this->call('ContentTableSeeder');
		$this->call('ContentPostTableSeeder');
		$this->call('ContentUserTableSeeder');
		$this->call('FolloweeUserTableSeeder');
	}

}
