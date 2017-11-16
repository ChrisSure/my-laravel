<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        DB::table('permission')->insert([
        	'id' => 1,
            'name' => 'Pages',
            'description' => 'Pages permission',
            'created_at' => NOW(),
            'updated_at' => null
        ]);
        
        DB::table('permission')->insert([
        	'id' => 2,
            'name' => 'Category',
            'description' => 'Category permission',
            'created_at' => NOW(),
            'updated_at' => null
        ]);
        
        DB::table('permission')->insert([
        	'id' => 3,
            'name' => 'User',
            'description' => 'User permission',
            'created_at' => NOW(),
            'updated_at' => null
        ]);
        
        DB::table('permission')->insert([
        	'id' => 4,
            'name' => 'System',
            'description' => 'System permission',
            'created_at' => NOW(),
            'updated_at' => null
        ]);
    }
}
