<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        		"u_name" => "Hasan Basri",
        		"email" => "hasanbasri2307@gmail.com",
        		"status" => 1,
        		"password" => bcrypt("hasan")
        	]);
    }
}
