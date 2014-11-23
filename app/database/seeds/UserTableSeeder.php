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
            ->where('name', 'Sentinel')
            ->first()
            ->id;

        $mod_role  = DB::table('roles')
            ->select('id')
            ->where('name', 'User')
            ->first()
            ->id;

        $now = date('Y-m-d H:i:s');

        DB::table('users')->insert(array(
            'name' => 'James Faulk',
            'email' => 'james.faulk@georgebrown.ca',
            'password' => Hash::make('test'),
            'date_of_birth' => $now,
            'role_id' => $admin_role,
            'created_at' => $now,
            'updated_at' => $now,
        ));
    }
}