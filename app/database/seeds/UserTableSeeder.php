<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        $admin_role = DB::table('roles')
            ->select('id')
            ->where('name', 'Administrator')
            ->first()
            ->id;

        $user_role = DB::table('roles')
            ->select('id')
            ->where('name', 'User')
            ->first()
            ->id;

        $sentinel_role  = DB::table('roles')
            ->select('id')
            ->where('name', 'Sentinel')
            ->first()
            ->id;

        $now = date('Y-m-d H:i:s');

        DB::table('users')->insert(array(
            'name' => 'James Faulk',
            'display_name' => 'James',
            'email' => 'james.faulk@georgebrown.ca',
            'password' => Hash::make('test'),
            'gender' => 'Male',
            'date_of_birth' => $now,
            'role_id' => $admin_role,
            'created_at' => $now,
            'updated_at' => $now,
        ));

        DB::table('users')->insert(array(
            'name' => 'William Coddington',
            'display_name' => 'William',
            'email' => 'william.coddington@georgebrown.ca',
            'password' => Hash::make('test'),
            'gender' => 'Male',
            'date_of_birth' => $now,
            'role_id' => $admin_role,
            'created_at' => $now,
            'updated_at' => $now,
        ));

        DB::table('users')->insert(array(
            'name' => 'Sentinel Test',
            'display_name' => 'Sentinel',
            'email' => 'sentinel@fakemail.com',
            'password' => Hash::make('test'),
            'gender' => 'Male',
            'date_of_birth' => $now,
            'role_id' => $sentinel_role,
            'created_at' => $now,
            'updated_at' => $now,
        ));

        DB::table('users')->insert(array(
            'name' => 'User Test',
            'display_name' => 'User',
            'email' => 'user@fakemail.com',
            'password' => Hash::make('test'),
            'gender' => 'Female',
            'date_of_birth' => $now,
            'role_id' => $user_role,
            'created_at' => $now,
            'updated_at' => $now,
        ));
    }
}