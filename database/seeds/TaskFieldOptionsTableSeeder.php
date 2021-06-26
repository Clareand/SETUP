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
                'id' => 1,
                'id_task_field' => 1,
                'option_value' => 'true',
                'option_text' => NULL,
                'option_image' => NULL,
                'created_at' => '2021-06-23 11:56:44',
                'updated_at' => '2021-06-23 11:56:44',
            ),
            1 => 
            array (
                'id' => 2,
                'id_task_field' => 2,
                'option_value' => 'false',
                'option_text' => 'Atas dan Bawah',
                'option_image' => NULL,
                'created_at' => '2021-06-24 04:08:44',
                'updated_at' => '2021-06-24 04:08:58',
            ),
            2 => 
            array (
                'id' => 3,
                'id_task_field' => 2,
                'option_value' => 'false',
                'option_text' => 'Kanan dan Kiri',
                'option_image' => NULL,
                'created_at' => '2021-06-24 04:08:44',
                'updated_at' => '2021-06-24 04:08:58',
            ),
            3 => 
            array (
                'id' => 4,
                'id_task_field' => 2,
                'option_value' => 'true',
                'option_text' => 'Vertical dan Horizontal',
                'option_image' => NULL,
                'created_at' => '2021-06-24 04:08:44',
                'updated_at' => '2021-06-24 04:08:58',
            ),
            4 => 
            array (
                'id' => 5,
                'id_task_field' => 2,
                'option_value' => 'false',
                'option_text' => 'Panjang dan Lebar',
                'option_image' => NULL,
                'created_at' => '2021-06-24 04:08:44',
                'updated_at' => '2021-06-24 04:08:44',
            ),
            5 => 
            array (
                'id' => 6,
                'id_task_field' => 3,
                'option_value' => 'LinearLayout',
                'option_text' => NULL,
                'option_image' => NULL,
                'created_at' => '2021-06-24 04:10:20',
                'updated_at' => '2021-06-24 04:10:20',
            ),
            6 => 
            array (
                'id' => 7,
                'id_task_field' => 4,
                'option_value' => 'true',
                'option_text' => 'Device editor',
                'option_image' => NULL,
                'created_at' => '2021-06-24 04:12:21',
                'updated_at' => '2021-06-24 04:12:21',
            ),
            7 => 
            array (
                'id' => 8,
                'id_task_field' => 4,
                'option_value' => 'false',
                'option_text' => 'Activity_main.xml',
                'option_image' => NULL,
                'created_at' => '2021-06-24 04:12:21',
                'updated_at' => '2021-06-24 04:12:21',
            ),
            8 => 
            array (
                'id' => 9,
                'id_task_field' => 4,
                'option_value' => 'false',
                'option_text' => 'Landscape Variation',
                'option_image' => NULL,
                'created_at' => '2021-06-24 04:12:21',
                'updated_at' => '2021-06-24 04:12:21',
            ),
            9 => 
            array (
                'id' => 10,
                'id_task_field' => 4,
                'option_value' => 'false',
                'option_text' => 'Layout',
                'option_image' => NULL,
                'created_at' => '2021-06-24 04:12:21',
                'updated_at' => '2021-06-24 04:12:21',
            ),
            10 => 
            array (
                'id' => 11,
                'id_task_field' => 5,
                'option_value' => 'true',
                'option_text' => NULL,
                'option_image' => NULL,
                'created_at' => '2021-06-24 04:30:42',
                'updated_at' => '2021-06-24 04:30:42',
            ),
            11 => 
            array (
                'id' => 12,
                'id_task_field' => 6,
                'option_value' => 'int',
                'option_text' => NULL,
                'option_image' => NULL,
                'created_at' => '2021-06-24 05:28:20',
                'updated_at' => '2021-06-24 05:33:04',
            ),
            12 => 
            array (
                'id' => 13,
                'id_task_field' => 7,
                'option_value' => 'false',
                'option_text' => 'Oriented Object Programming',
                'option_image' => NULL,
                'created_at' => '2021-06-24 05:31:40',
                'updated_at' => '2021-06-24 05:31:40',
            ),
            13 => 
            array (
                'id' => 14,
                'id_task_field' => 7,
                'option_value' => 'true',
                'option_text' => 'Object Oriented Programming',
                'option_image' => NULL,
                'created_at' => '2021-06-24 05:31:40',
                'updated_at' => '2021-06-24 05:31:40',
            ),
            14 => 
            array (
                'id' => 15,
                'id_task_field' => 7,
                'option_value' => 'false',
                'option_text' => 'Optical Oriented Programming',
                'option_image' => NULL,
                'created_at' => '2021-06-24 05:31:40',
                'updated_at' => '2021-06-24 05:31:40',
            ),
            15 => 
            array (
                'id' => 16,
                'id_task_field' => 7,
                'option_value' => 'false',
                'option_text' => 'Oriented Obstacle Program',
                'option_image' => NULL,
                'created_at' => '2021-06-24 05:31:40',
                'updated_at' => '2021-06-24 05:31:40',
            ),
            16 => 
            array (
                'id' => 17,
                'id_task_field' => 8,
                'option_value' => 'true',
                'option_text' => 'float dan double',
                'option_image' => NULL,
                'created_at' => '2021-06-24 05:32:46',
                'updated_at' => '2021-06-24 05:32:46',
            ),
            17 => 
            array (
                'id' => 18,
                'id_task_field' => 8,
                'option_value' => 'false',
                'option_text' => 'string dan char',
                'option_image' => NULL,
                'created_at' => '2021-06-24 05:32:46',
                'updated_at' => '2021-06-24 05:32:46',
            ),
            18 => 
            array (
                'id' => 19,
                'id_task_field' => 8,
                'option_value' => 'false',
                'option_text' => 'float dan int',
                'option_image' => NULL,
                'created_at' => '2021-06-24 05:32:46',
                'updated_at' => '2021-06-24 05:32:46',
            ),
            19 => 
            array (
                'id' => 20,
                'id_task_field' => 8,
                'option_value' => 'false',
                'option_text' => 'boolean dan double',
                'option_image' => NULL,
                'created_at' => '2021-06-24 05:32:46',
                'updated_at' => '2021-06-24 05:32:46',
            ),
            20 => 
            array (
                'id' => 21,
                'id_task_field' => 9,
                'option_value' => 'char',
                'option_text' => NULL,
                'option_image' => NULL,
                'created_at' => '2021-06-24 05:33:44',
                'updated_at' => '2021-06-24 05:33:44',
            ),
            21 => 
            array (
                'id' => 22,
                'id_task_field' => 10,
                'option_value' => 'true',
                'option_text' => NULL,
                'option_image' => NULL,
                'created_at' => '2021-06-24 05:35:17',
                'updated_at' => '2021-06-24 05:35:17',
            ),
        ));
        
        
    }
}