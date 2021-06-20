<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            [
                'role_type' => 'admin',
            ],
            [
                'role_type' => 'owner'
            ],
            [
                'role_type' => 'pegawai'
            ],
        ]);
    }
}
