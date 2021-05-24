<?php

use Illuminate\Database\Seeder;

class UserClassListsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_class_lists')->delete();
        
        \DB::table('user_class_lists')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_user' => 2,
                'id_class' => 12,
                'progress' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}