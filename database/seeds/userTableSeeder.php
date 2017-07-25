<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => str_random(5),
            'middle_name' => str_random(5),
            'last_name' => str_random(5),
            'name_extension' => str_random(5),
            'email' => str_random(5).'@gmail.com',
            'username' => str_random(5),
            'password' => bcrypt('secret'),
            'role_id' => 1,
        ]);
    }
}
