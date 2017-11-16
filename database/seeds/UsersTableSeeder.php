<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Taras',
            'email' => 't@t.ua',
            'password' => '$2y$10$vZBnbRepyqaoL2W3Ijx0XuqiZ0uHVvjsMRBPrVhlM01Lva3MPXjcG',
            'id_role' => 2,
            'status' => 1,
            'remember_token' => 'wpNd3gvT6HT5CTfiTMf8eCQAjUopJZSEjfJtKyqblQb3v6DKzjaTZtXDuTCU',
            'created_at' => NOW()
        ]);
    }
}
