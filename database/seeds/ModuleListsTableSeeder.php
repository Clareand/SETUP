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
                'created_at' => '2021-06-23 12:00:42',
                'updated_at' => '2021-06-23 12:00:42',
            ),
            1 => 
            array (
                'id' => 2,
                'id_class' => 1,
                'id_task' => NULL,
                'id_material' => 2,
                'type' => 'material',
                'step' => 2,
                'created_at' => '2021-06-23 12:00:50',
                'updated_at' => '2021-06-23 12:00:50',
            ),
            2 => 
            array (
                'id' => 3,
                'id_class' => 1,
                'id_task' => NULL,
                'id_material' => 3,
                'type' => 'material',
                'step' => 3,
                'created_at' => '2021-06-23 12:01:04',
                'updated_at' => '2021-06-23 12:01:04',
            ),
            3 => 
            array (
                'id' => 4,
                'id_class' => 1,
                'id_task' => NULL,
                'id_material' => 4,
                'type' => 'material',
                'step' => 4,
                'created_at' => '2021-06-23 12:01:15',
                'updated_at' => '2021-06-23 12:01:15',
            ),
            4 => 
            array (
                'id' => 5,
                'id_class' => 1,
                'id_task' => 1,
                'id_material' => NULL,
                'type' => 'task',
                'step' => 5,
                'created_at' => '2021-06-23 12:01:22',
                'updated_at' => '2021-06-23 12:01:22',
            ),
            5 => 
            array (
                'id' => 6,
                'id_class' => 1,
                'id_task' => NULL,
                'id_material' => 5,
                'type' => 'material',
                'step' => 6,
                'created_at' => '2021-06-23 12:01:31',
                'updated_at' => '2021-06-23 12:01:31',
            ),
            6 => 
            array (
                'id' => 7,
                'id_class' => 3,
                'id_task' => NULL,
                'id_material' => 6,
                'type' => 'material',
                'step' => 1,
                'created_at' => '2021-06-24 04:34:09',
                'updated_at' => '2021-06-24 04:34:09',
            ),
            7 => 
            array (
                'id' => 8,
                'id_class' => 3,
                'id_task' => NULL,
                'id_material' => 7,
                'type' => 'material',
                'step' => 2,
                'created_at' => '2021-06-24 04:34:20',
                'updated_at' => '2021-06-24 04:34:20',
            ),
            8 => 
            array (
                'id' => 9,
                'id_class' => 3,
                'id_task' => 2,
                'id_material' => NULL,
                'type' => 'task',
                'step' => 3,
                'created_at' => '2021-06-24 04:34:35',
                'updated_at' => '2021-06-24 04:34:35',
            ),
            9 => 
            array (
                'id' => 10,
                'id_class' => 3,
                'id_task' => NULL,
                'id_material' => 8,
                'type' => 'material',
                'step' => 4,
                'created_at' => '2021-06-24 04:35:01',
                'updated_at' => '2021-06-24 04:35:01',
            ),
            10 => 
            array (
                'id' => 11,
                'id_class' => 3,
                'id_task' => 3,
                'id_material' => NULL,
                'type' => 'task',
                'step' => 5,
                'created_at' => '2021-06-24 04:35:18',
                'updated_at' => '2021-06-24 04:35:18',
            ),
            11 => 
            array (
                'id' => 12,
                'id_class' => 3,
                'id_task' => NULL,
                'id_material' => 9,
                'type' => 'material',
                'step' => 6,
                'created_at' => '2021-06-24 04:35:27',
                'updated_at' => '2021-06-24 04:35:27',
            ),
            12 => 
            array (
                'id' => 13,
                'id_class' => 2,
                'id_task' => NULL,
                'id_material' => 10,
                'type' => 'material',
                'step' => 1,
                'created_at' => '2021-06-24 05:43:50',
                'updated_at' => '2021-06-24 05:43:50',
            ),
            13 => 
            array (
                'id' => 14,
                'id_class' => 2,
                'id_task' => NULL,
                'id_material' => 11,
                'type' => 'material',
                'step' => 2,
                'created_at' => '2021-06-24 05:43:59',
                'updated_at' => '2021-06-24 05:43:59',
            ),
            14 => 
            array (
                'id' => 15,
                'id_class' => 2,
                'id_task' => NULL,
                'id_material' => 12,
                'type' => 'material',
                'step' => 3,
                'created_at' => '2021-06-24 05:44:10',
                'updated_at' => '2021-06-24 05:44:10',
            ),
            15 => 
            array (
                'id' => 16,
                'id_class' => 2,
                'id_task' => 4,
                'id_material' => NULL,
                'type' => 'task',
                'step' => 4,
                'created_at' => '2021-06-24 05:44:20',
                'updated_at' => '2021-06-24 05:44:20',
            ),
            16 => 
            array (
                'id' => 17,
                'id_class' => 2,
                'id_task' => NULL,
                'id_material' => 13,
                'type' => 'material',
                'step' => 5,
                'created_at' => '2021-06-24 05:44:35',
                'updated_at' => '2021-06-24 05:44:35',
            ),
            17 => 
            array (
                'id' => 18,
                'id_class' => 2,
                'id_task' => 5,
                'id_material' => NULL,
                'type' => 'task',
                'step' => 6,
                'created_at' => '2021-06-24 05:44:44',
                'updated_at' => '2021-06-24 05:44:44',
            ),
            18 => 
            array (
                'id' => 19,
                'id_class' => 2,
                'id_task' => NULL,
                'id_material' => 14,
                'type' => 'material',
                'step' => 7,
                'created_at' => '2021-06-24 05:44:51',
                'updated_at' => '2021-06-24 05:44:51',
            ),
        ));
        
        
    }
}