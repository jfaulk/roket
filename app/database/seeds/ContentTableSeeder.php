<?php

class ContentTableSeeder extends Seeder {
	
	public function run()
	{
        DB::table('content')->insert(array(
            'name' => 'nudity',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ));

        DB::table('content')->insert(array(
            'name' => 'violence',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ));

        DB::table('content')->insert(array(
            'name' => 'religion',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ));

        DB::table('content')->insert(array(
            'name' => 'none',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ));
	}
}