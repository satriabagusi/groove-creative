<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('creativefromus123'),
            'account_status' => 1,
            'employee_id' => 1,
            'user_role_id' => 1,
        ]);
    }
}
