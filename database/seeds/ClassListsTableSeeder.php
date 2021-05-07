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
                'all_module' => NULL,
                'short_description' => 'Phasellus efficitur, odio in mattis accumsan, nisi lectus tempor odio, eu scelerisque eros risus sed metus. Vivamus at gravida neque. Mauris pharetra maximus justo in lobortis. ',
                'long_description' => '<h1>Phasellus efficitur</h1><br> odio in mattis accumsan, nisi lectus tempor odio, eu scelerisque <br> eros risus sed metus. Vivamus at gravida neque. <br> Mauris pharetra maximus justo in lobortis. ',
                'created_at' => '2021-04-07 13:38:30',
                'updated_at' => '2021-04-07 13:38:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Front-End Fundamental Web Development',
                'field_of_tech' => 1,
                'all_module' => NULL,
                'short_description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin tempus accumsan urna, in porta purus tincidunt sit amet. ',
                'long_description' => '<h1>Pellentesque habitant</h1><br> morbi tristique senectus et netus et malesuada fames ac turpis egestas. <br> Proin tempus accumsan urna, in porta purus tincidunt sit amet. ',
                'created_at' => '2021-04-07 13:38:30',
                'updated_at' => '2021-04-07 13:38:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Dasar Pemograman Java',
                'field_of_tech' => 2,
                'all_module' => NULL,
                'short_description' => 'Pellentesque congue mi est, id aliquam nunc bibendum sit amet. Ut nec urna finibus, finibus arcu sed, placerat eros. Nam a vestibulum sem, ac dictum nisi. ',
                'long_description' => '<h1>Pellentesque</h1><br> congue mi est, id aliquam nunc bibendum sit amet. Ut nec urna finibus, finibus arcu sed, placerat eros. Nam a vestibulum sem, ac dictum nisi. congue mi est, id aliquam nunc bibendum sit amet. Ut nec urna finibus, finibus arcu sed, placerat eros. Nam a vestibulum sem, ac dictum nisi. congue mi est, id aliquam nunc bibendum sit amet. Ut nec urna finibus, finibus arcu sed, placerat eros. Nam a vestibulum sem, ac dictum nisi.<br>congue mi est, id aliquam nunc bibendum sit amet. Ut nec urna finibus, finibus arcu sed, placerat eros. Nam a vestibulum sem, ac dictum nisi.congue mi est, id aliquam nunc bibendum sit amet. Ut nec urna finibus, finibus arcu sed, placerat eros. Nam a vestibulum sem, ac dictum nisi.<br>congue mi est, id aliquam nunc bibendum sit amet. Ut nec urna finibus, finibus arcu sed, placerat eros. Nam a vestibulum sem, ac dictum nisi.',
                'created_at' => '2021-04-07 13:42:09',
                'updated_at' => '2021-04-07 13:42:09',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Dasar Pemograman Python',
                'field_of_tech' => 3,
                'all_module' => NULL,
                'short_description' => 'Vestibulum condimentum aliquam diam, id blandit elit aliquet in. Aliquam erat volutpat. Praesent pretium ligula eu lectus placerat venenatis.',
                'long_description' => '<h1>Vestibulum<h1> <br> condimentum aliquam diam, id blandit elit aliquet in. Aliquam erat volutpat. <br>Praesent pretium ligula eu lectus placerat venenatis.Praesent pretium ligula eu lectus placerat venenatis. Praesent pretium ligula eu lectus placerat venenatis. Praesent pretium ligula eu lectus placerat venenatis. <br> Praesent pretium ligula eu lectus placerat venenatis. Praesent pretium ligula eu lectus placerat venenatis.',
                'created_at' => '2021-04-07 13:42:09',
                'updated_at' => '2021-04-07 13:42:09',
            ),
        ));
        
        
    }
}