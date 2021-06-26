<?php

use Illuminate\Database\Seeder;

class ClassPathTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('class_path')->delete();
        
        \DB::table('class_path')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_class' => 1,
                'id_learning_path' => 1,
                'step' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'id_class' => 3,
                'id_learning_path' => 1,
                'step' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'id_class' => 2,
                'id_learning_path' => 1,
                'step' => 3,
            ),
        ));
        
        
    }
}