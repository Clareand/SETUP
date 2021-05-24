<?php

use Illuminate\Database\Seeder;

class ModuleListsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('module_lists')->delete();
        
        \DB::table('module_lists')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_class' => 1,
                'id_task' => NULL,
                'id_material' => 1,
                'type' => 'material',
                'step' => 1,
                'created_at' => '2021-04-28 06:53:07',
                'updated_at' => '2021-04-28 06:53:07',
            ),
            1 => 
            array (
                'id' => 2,
                'id_class' => 1,
                'id_task' => 1,
                'id_material' => NULL,
                'type' => 'task',
                'step' => 2,
                'created_at' => '2021-04-28 08:59:14',
                'updated_at' => '2021-04-28 08:59:14',
            ),
            2 => 
            array (
                'id' => 3,
                'id_class' => 3,
                'id_task' => NULL,
                'id_material' => 2,
                'type' => 'material',
                'step' => 1,
                'created_at' => '2021-05-03 14:07:23',
                'updated_at' => '2021-05-03 14:07:23',
            ),
            3 => 
            array (
                'id' => 4,
                'id_class' => 3,
                'id_task' => NULL,
                'id_material' => 1,
                'type' => 'material',
                'step' => 2,
                'created_at' => '2021-05-03 14:32:46',
                'updated_at' => '2021-05-03 14:32:46',
            ),
            4 => 
            array (
                'id' => 6,
                'id_class' => 2,
                'id_task' => NULL,
                'id_material' => 1,
                'type' => 'material',
                'step' => 1,
                'created_at' => '2021-05-03 14:34:05',
                'updated_at' => '2021-05-03 14:34:05',
            ),
            5 => 
            array (
                'id' => 7,
                'id_class' => 2,
                'id_task' => NULL,
                'id_material' => 2,
                'type' => 'material',
                'step' => 2,
                'created_at' => '2021-05-03 14:38:03',
                'updated_at' => '2021-05-03 14:38:03',
            ),
            6 => 
            array (
                'id' => 11,
                'id_class' => 1,
                'id_task' => NULL,
                'id_material' => 5,
                'type' => 'material',
                'step' => 3,
                'created_at' => '2021-05-05 07:19:56',
                'updated_at' => '2021-05-05 07:19:56',
            ),
            7 => 
            array (
                'id' => 12,
                'id_class' => 12,
                'id_task' => NULL,
                'id_material' => 6,
                'type' => 'material',
                'step' => 1,
                'created_at' => '2021-05-19 03:48:25',
                'updated_at' => '2021-05-19 03:48:25',
            ),
            8 => 
            array (
                'id' => 13,
                'id_class' => 12,
                'id_task' => NULL,
                'id_material' => 7,
                'type' => 'material',
                'step' => 2,
                'created_at' => '2021-05-19 03:48:35',
                'updated_at' => '2021-05-19 03:48:35',
            ),
        ));
        
        
    }
}