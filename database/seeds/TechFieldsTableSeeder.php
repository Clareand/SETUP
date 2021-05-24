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
                'name' => 'Web',
                'created_at' => '2021-04-06 16:06:13',
                'updated_at' => '2021-04-06 16:06:13',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Mobile',
                'created_at' => '2021-04-06 16:06:13',
                'updated_at' => '2021-04-06 16:06:13',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Artificial Intelligence',
                'created_at' => '2021-04-06 16:09:11',
                'updated_at' => '2021-04-06 16:09:11',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'UI/UX',
                'created_at' => '2021-04-06 16:09:23',
                'updated_at' => '2021-04-06 16:09:23',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Game',
                'created_at' => '2021-04-06 16:09:23',
                'updated_at' => '2021-04-06 16:09:23',
            ),
        ));
        
        
    }
}