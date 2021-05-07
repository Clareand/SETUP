<?php

use Illuminate\Database\Seeder;

class TaskFieldsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('task_fields')->delete();
        
        \DB::table('task_fields')->insert(array (
            0 => 
            array (
                'id' => 6,
                'id_task' => 1,
                'field_question' => 'Beruang dalam norwegian?',
                'field_type' => 'multiple',
                'point' => 300,
                'created_at' => '2021-05-01 05:28:52',
                'updated_at' => '2021-05-01 07:25:53',
            ),
            1 => 
            array (
                'id' => 7,
                'id_task' => 1,
                'field_question' => 'En katt is word for',
                'field_type' => 'short answer',
                'point' => 50,
                'created_at' => '2021-05-01 07:39:56',
                'updated_at' => '2021-05-01 07:47:48',
            ),
            2 => 
            array (
                'id' => 8,
                'id_task' => 1,
                'field_question' => 'Upload Gambar hytte',
                'field_type' => 'file upload',
                'point' => 400,
                'created_at' => '2021-05-01 07:57:33',
                'updated_at' => '2021-05-01 07:57:50',
            ),
        ));
        
        
    }
}