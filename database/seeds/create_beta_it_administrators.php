<?php

use Illuminate\Database\Seeder;

class create_beta_it_administrators extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /******************* INSERT DEFAULT USERS TABLE ***********************/
        //FOR DEVELOPMENT SEEDING ONLY IN PRODUCTION
        //SAMPLE DATA
        DB::table('users')->insert([
            'first_name'        => 'Joshua',
            'last_name'         => 'Alarcon',
            'email'             => 'josh@live.com.ph',
            'username'          => 'jalarcon',
            'password'          => bcrypt('1'),
            'role_id'           => 1, 				//ID of IT Administrator on Roles Table
        ]); //end insert

        DB::table('users')->insert([
            'first_name'        => 'Jorge Benigno',
            'last_name'         => 'Pante',
            'email'             => 'paninoy@gmail.com',
            'username'          => 'jopante',
            'password'          => bcrypt('1'),
            'role_id'           => 1,				///ID of IT Administrator on Roles Table
        ]); //end insert
    }
}
