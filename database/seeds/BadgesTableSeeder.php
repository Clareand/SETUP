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
                'name' => 'Android Beginner',
                'image' => 'public/badges/1624431526.png',
                'point' => 300,
                'created_at' => '2021-06-23 06:41:25',
                'updated_at' => '2021-06-23 06:58:46',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Android Intermediet',
                'image' => 'public/badges/1624435446.png',
                'point' => 400,
                'created_at' => '2021-06-23 08:04:06',
                'updated_at' => '2021-06-23 08:04:06',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Android Expert',
                'image' => 'public/badges/1624435472.png',
                'point' => 700,
                'created_at' => '2021-06-23 08:04:32',
                'updated_at' => '2021-06-23 08:04:32',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'IOS Developer',
                'image' => 'public/badges/1624435538.png',
                'point' => 500,
                'created_at' => '2021-06-23 08:05:38',
                'updated_at' => '2021-06-23 08:05:38',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Front-End Developer',
                'image' => 'public/badges/1624435578.png',
                'point' => 400,
                'created_at' => '2021-06-23 08:06:04',
                'updated_at' => '2021-06-23 08:06:18',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Back-End Developer',
                'image' => 'public/badges/1624435600.png',
                'point' => 500,
                'created_at' => '2021-06-23 08:06:40',
                'updated_at' => '2021-06-23 08:06:40',
            ),
        ));
        
        
    }
}