<?php

use Illuminate\Database\Seeder;

class ClassListsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('class_lists')->delete();
        
        \DB::table('class_lists')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Pemograman Web Dasar',
                'field_of_tech' => 1,
                'id_learning_path' => 1,
                'all_module' => NULL,
                'description' => 'Phasellus efficitur, odio in mattis accumsan, nisi lectus tempor odio, eu scelerisque eros risus sed metus. Vivamus at gravida neque. Mauris pharetra maximus justo in lobortis. ',
                'created_at' => '2021-04-07 13:38:30',
                'updated_at' => '2021-04-07 13:38:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Front-End Fundamental Web Development',
                'field_of_tech' => 1,
                'id_learning_path' => 1,
                'all_module' => NULL,
                'description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin tempus accumsan urna, in porta purus tincidunt sit amet. ',
                'created_at' => '2021-04-07 13:38:30',
                'updated_at' => '2021-04-07 13:38:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Dasar Pemograman Java',
                'field_of_tech' => 2,
                'id_learning_path' => 4,
                'all_module' => NULL,
                'description' => 'Pellentesque congue mi est, id aliquam nunc bibendum sit amet. Ut nec urna finibus, finibus arcu sed, placerat eros. Nam a vestibulum sem, ac dictum nisi. ',
                'created_at' => '2021-04-07 13:42:09',
                'updated_at' => '2021-04-07 13:42:09',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Dasar Pemograman Python',
                'field_of_tech' => 3,
                'id_learning_path' => NULL,
                'all_module' => NULL,
                'description' => 'Vestibulum condimentum aliquam diam, id blandit elit aliquet in. Aliquam erat volutpat. Praesent pretium ligula eu lectus placerat venenatis.',
                'created_at' => '2021-04-07 13:42:09',
                'updated_at' => '2021-04-07 13:42:09',
            ),
        ));
        
        
    }
}