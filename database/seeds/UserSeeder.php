<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
        	'name' => 'Matheus Lubarino',
        	'email' => 'matheus_lubarino1@gmail.com',
        	'password' => bcrypt('123mudar'),
        	'created_at' => date('Y-m-d'),
        	'updated_at' => date('Y-m-d'),
        ]);
    }
}
