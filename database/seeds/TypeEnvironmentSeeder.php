<?php

use Illuminate\Database\Seeder;

class TypeEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_environment')->insert([
        	'description' => 'quarto',
        	'active' => 1,
        	'version' => 1,
        	'created_at' => date('Y-m-d'),
        	'updated_at' => date('Y-m-d'),
        ]);
    }
}
