<?php

use Illuminate\Database\Seeder;

class TaskFieldOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('task_field_options')->delete();
        
        \DB::table('task_field_options')->insert(array (
            0 => 
            array (
                'id' => 8,
                'id_task_field' => 6,
                'option_value' => 'false',
                'option_text' => 'Bear',
                'option_image' => NULL,
                'created_at' => '2021-05-01 05:28:52',
                'updated_at' => '2021-05-01 07:25:53',
            ),
            1 => 
            array (
                'id' => 9,
                'id_task_field' => 6,
                'option_value' => 'false',
                'option_text' => 'Björn',
                'option_image' => NULL,
                'created_at' => '2021-05-01 05:28:52',
                'updated_at' => '2021-05-01 07:25:53',
            ),
            2 => 
            array (
                'id' => 10,
                'id_task_field' => 6,
                'option_value' => 'true',
                'option_text' => 'Bjørn',
                'option_image' => NULL,
                'created_at' => '2021-05-01 05:28:52',
                'updated_at' => '2021-05-01 07:25:53',
            ),
            3 => 
            array (
                'id' => 11,
                'id_task_field' => 6,
                'option_value' => 'false',
                'option_text' => 'Bera',
                'option_image' => NULL,
                'created_at' => '2021-05-01 05:28:52',
                'updated_at' => '2021-05-01 05:28:52',
            ),
            4 => 
            array (
                'id' => 12,
                'id_task_field' => 7,
                'option_value' => 'Seekor Kucing',
                'option_text' => NULL,
                'option_image' => NULL,
                'created_at' => '2021-05-01 07:39:56',
                'updated_at' => '2021-05-01 07:47:48',
            ),
            5 => 
            array (
                'id' => 13,
                'id_task_field' => 8,
                'option_value' => 'true',
                'option_text' => NULL,
                'option_image' => NULL,
                'created_at' => '2021-05-01 07:57:33',
                'updated_at' => '2021-05-01 07:57:50',
            ),
        ));
        
        
    }
}