<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('students')->delete();
        
        \DB::table('students')->insert(array (
            0 => 
            array (
                'id' => 4,
                'id_user' => 6,
                'id_role' => 2,
                'last_name' => '',
                'address' => NULL,
                'city' => NULL,
                'postal_code' => NULL,
                'point' => NULL,
                'created_at' => '2021-04-01 07:26:56',
                'updated_at' => '2021-04-01 07:26:56',
            ),
            1 => 
            array (
                'id' => 5,
                'id_user' => 7,
                'id_role' => 2,
                'last_name' => 'Nur',
                'address' => NULL,
                'city' => NULL,
                'postal_code' => NULL,
                'point' => NULL,
                'created_at' => '2021-04-01 09:58:41',
                'updated_at' => '2021-04-01 09:58:41',
            ),
        ));
        
        
    }
}