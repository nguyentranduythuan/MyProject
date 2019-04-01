<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(usersSeeder::class);
    }
}

class usersSeeder extends Seeder 
{
	public function run() 
	{
		DB::table('users')->insert([
			['name'=> 'Thuan1','email' =>str_random(3).'gmail.com','password'=>bcrypt('123456')],
			['name'=> 'Thuan2','email' =>str_random(3).'gmail.com','password'=>bcrypt('123456')],
			['name'=> 'Thuan3','email' =>str_random(3).'gmail.com','password'=>bcrypt('123456')],
		]);
}
