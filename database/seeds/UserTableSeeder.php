<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => "Moeen Basra",
            'email' => "moeen@live.com",
            'password' => bcrypt('moeen'),
            'remember_token' => str_random(10),
        ]);
    }
}
