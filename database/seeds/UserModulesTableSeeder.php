<?php

use Illuminate\Database\Seeder;

class UserModulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_modules')->delete();
        
        \DB::table('user_modules')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_user' => 2,
                'id_module' => 12,
                'status' => 0,
                'created_at' => '2021-05-19 11:00:03',
                'updated_at' => '2021-05-19 11:00:03',
            ),
            1 => 
            array (
                'id' => 2,
                'id_user' => 2,
                'id_module' => 13,
                'status' => 0,
                'created_at' => '2021-05-19 11:00:03',
                'updated_at' => '2021-05-19 11:00:03',
            ),
        ));
        
        
    }
}