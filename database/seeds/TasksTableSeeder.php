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
                'name' => 'Tugas Instalasi',
                'description' => 'Kamu tentunya sudah melakukan instalasi Android studio bukan? Kirimkan Screenshoot dari hasil instalasi yang telah kamu lakukan ya',
                'created_at' => '2021-06-23 11:56:09',
                'updated_at' => '2021-06-23 12:02:26',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Task 1 : Layout Editor',
                'description' => 'Uji kemampuan mu untuk layout editor',
                'created_at' => '2021-06-24 04:06:24',
                'updated_at' => '2021-06-24 04:06:24',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Task 2 : Layout Editor',
                'description' => 'Kamu sudah mempelajari mengenai jenis View yang terdapat di dalam Editor dan bagaimana cara menggantinya. Tampilkan View yang telah kamu buat untuk aplikasimu. Unggah Kode dan screenshoot dari tampilan yang telah kamu buat.',
                'created_at' => '2021-06-24 04:29:06',
                'updated_at' => '2021-06-24 04:29:06',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Task 1: Java',
                'description' => 'Uji kemampuanmu terhadap tipe data dan aturan penulisan yang ada pada bahasa pemograman Java',
                'created_at' => '2021-06-24 05:27:45',
                'updated_at' => '2021-06-24 05:27:45',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Task 2 : Java',
                'description' => 'Kamu sudah mempelajari dasar dari Java. Buatlah Program sederhana dari bahasa Java',
                'created_at' => '2021-06-24 05:34:35',
                'updated_at' => '2021-06-24 05:34:35',
            ),
        ));
        
        
    }
}