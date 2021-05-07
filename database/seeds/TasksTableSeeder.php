<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tasks')->delete();
        
        \DB::table('tasks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Tugas 1',
            'description' => 'Norwegian (Bökmal)',
                'created_at' => '2021-04-27 04:57:48',
                'updated_at' => '2021-05-01 07:59:08',
            ),
        ));
        
        
    }
}