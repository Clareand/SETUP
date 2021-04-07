<?php

use Illuminate\Database\Seeder;

class BadgesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('badges')->delete();
        
        \DB::table('badges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Frontend Developer',
                'image' => '',
                'point' => 100,
                'created_at' => '2021-04-07 13:30:12',
                'updated_at' => '2021-04-07 13:30:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Backend Developer',
                'image' => '',
                'point' => 100,
                'created_at' => '2021-04-07 13:30:12',
                'updated_at' => '2021-04-07 13:30:12',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Android Developer',
                'image' => '',
                'point' => 200,
                'created_at' => '2021-04-07 13:35:14',
                'updated_at' => '2021-04-07 13:35:14',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'UI/UX Designer',
                'image' => '',
                'point' => 150,
                'created_at' => '2021-04-07 13:35:14',
                'updated_at' => '2021-04-07 13:35:14',
            ),
        ));
        
        
    }
}