<?php

class TopicsTableSeeder extends Seeder {
	
	public function run()
    {
        DB::table('topics')->insert(array(
            'name' => 'music',
            'created_at' => new DateTime,
        ));

        DB::table('topics')->insert(array(
            'name' => 'movies',
            'created_at' => new DateTime,
        ));

        DB::table('topics')->insert(array(
            'name' => 'games',
            'created_at' => new DateTime,
        ));

        DB::table('topics')->insert(array(
            'name' => 'random',
            'created_at' => new DateTime,
        ));
    }
}