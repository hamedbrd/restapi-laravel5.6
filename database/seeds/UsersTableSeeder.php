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
         'name' => 'MyHammer',
         'email' => 'hamedbrd@gmail.com',
         'password' => '123456',
         'remember_token' => str_random(10),
     ]);
    }
}
