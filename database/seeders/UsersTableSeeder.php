<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'MD.Master',
            'username' => 'master',
            'email' => 'master@gmail.com',
            'phone' => '0922353111',
            'password' => bcrypt('rootmaster'),
        ]);
        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'MD.Staff',
            'username' => 'staff',
            'email' => 'staff1@gmail.com',
            'phone' => '0922353112',
            'password' => bcrypt('rootstaff'),
        ]);
        DB::table('users')->insert([
            'role_id' => '3',
            'name' => 'MD.Customer',
            'username' => 'customer',
            'email' => 'customer@gmail.com',
            'phone' => '0922353113',
            'password' => bcrypt('rootcustomer'),
        ]);

    }
}
