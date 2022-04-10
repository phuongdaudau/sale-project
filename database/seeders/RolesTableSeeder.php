<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Master',
            'slug' => 'master',
        ]);
        DB::table('roles')->insert([
            'name' => 'Staff',
            'slug' => 'staff',
        ]);
        DB::table('roles')->insert([
            'name' => 'Customer',
            'slug' => 'customer',
        ]);

    }
}
