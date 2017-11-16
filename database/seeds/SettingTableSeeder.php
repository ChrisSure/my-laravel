<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
        	'id' => 1,
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'created_at' => NOW(),
            'updated_at' => null
        ]);
    }
}
