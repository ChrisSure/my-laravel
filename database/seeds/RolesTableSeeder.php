<?php

use Illuminate\Database\Seeder;

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
        	'id' => 1,
            'name' => 'User',
            'description' => 'User role',
            'perm' => null,
            'created_at' => NOW(),
            'updated_at' => null
        ]);
        
        DB::table('roles')->insert([
        	'id' => 2,
            'name' => 'Admin',
            'description' => 'Admin role',
            'perm' => json_encode(["1", "2", "3", "4"]),
            'created_at' => NOW(),
            'updated_at' => null
        ]);
    }
}
