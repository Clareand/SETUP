<?php

use Illuminate\Database\Seeder;

class TechFieldsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tech_fields')->delete();
        
        \DB::table('tech_fields')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Android',
                'created_at' => '2021-06-23 06:13:18',
                'updated_at' => '2021-06-23 06:13:58',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'UI/UX',
                'created_at' => '2021-06-23 06:13:28',
                'updated_at' => '2021-06-23 06:13:28',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'IOS',
                'created_at' => '2021-06-23 06:14:07',
                'updated_at' => '2021-06-23 06:14:07',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Artificial Intelligence',
                'created_at' => '2021-06-23 06:14:59',
                'updated_at' => '2021-06-23 06:14:59',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Web',
                'created_at' => '2021-06-23 06:15:12',
                'updated_at' => '2021-06-23 06:15:12',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Game',
                'created_at' => '2021-06-23 06:15:30',
                'updated_at' => '2021-06-23 06:15:30',
            ),
        ));
        
        
    }
}