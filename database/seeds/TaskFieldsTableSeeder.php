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
                'id' => 1,
                'id_task' => 1,
                'field_question' => 'Unggahlah gambar dari tampilan Android studio',
                'field_type' => 'file upload',
                'point' => 200,
                'created_at' => '2021-06-23 11:56:44',
                'updated_at' => '2021-06-23 11:56:44',
            ),
            1 => 
            array (
                'id' => 2,
                'id_task' => 2,
                'field_question' => 'Apa sajakah variasi tampilan pada Aplikasi?',
                'field_type' => 'multiple',
                'point' => 40,
                'created_at' => '2021-06-24 04:08:44',
                'updated_at' => '2021-06-24 04:08:58',
            ),
            2 => 
            array (
                'id' => 3,
                'id_task' => 2,
                'field_question' => 'ViewGroup yang menyusun elemen secara vertical dan horizontal adalah',
                'field_type' => 'short answer',
                'point' => 30,
                'created_at' => '2021-06-24 04:10:20',
                'updated_at' => '2021-06-24 04:10:20',
            ),
            3 => 
            array (
                'id' => 4,
                'id_task' => 2,
                'field_question' => 'Bagian manakah yang menampilkan daftar dari berbagai jenis perangkat?',
                'field_type' => 'multiple',
                'point' => 50,
                'created_at' => '2021-06-24 04:12:21',
                'updated_at' => '2021-06-24 04:12:21',
            ),
            4 => 
            array (
                'id' => 5,
                'id_task' => 3,
                'field_question' => 'Unggahlah file.txt yang berisi link untuk kode dan screenshoot dari tampilan aplikasi yang dibuat',
                'field_type' => 'file upload',
                'point' => 250,
                'created_at' => '2021-06-24 04:30:42',
                'updated_at' => '2021-06-24 04:30:42',
            ),
            5 => 
            array (
                'id' => 6,
                'id_task' => 4,
                'field_question' => 'Tipe data untuk angka bulat',
                'field_type' => 'short answer',
                'point' => 10,
                'created_at' => '2021-06-24 05:28:20',
                'updated_at' => '2021-06-24 05:33:04',
            ),
            6 => 
            array (
                'id' => 7,
                'id_task' => 4,
                'field_question' => 'Apa itu OOP',
                'field_type' => 'multiple',
                'point' => 30,
                'created_at' => '2021-06-24 05:31:40',
                'updated_at' => '2021-06-24 05:31:40',
            ),
            7 => 
            array (
                'id' => 8,
                'id_task' => 4,
                'field_question' => 'Tipe data desimal',
                'field_type' => 'multiple',
                'point' => 40,
                'created_at' => '2021-06-24 05:32:46',
                'updated_at' => '2021-06-24 05:32:46',
            ),
            8 => 
            array (
                'id' => 9,
                'id_task' => 4,
                'field_question' => 'Tipe data untuk 1 karakter',
                'field_type' => 'short answer',
                'point' => 20,
                'created_at' => '2021-06-24 05:33:44',
                'updated_at' => '2021-06-24 05:33:44',
            ),
            9 => 
            array (
                'id' => 10,
                'id_task' => 5,
                'field_question' => 'Unggah Potongan kode untuk menampilkan tulisan "Hello World" dalam bentuk file.txt',
                'field_type' => 'file upload',
                'point' => 200,
                'created_at' => '2021-06-24 05:35:17',
                'updated_at' => '2021-06-24 05:35:17',
            ),
        ));
        
        
    }
}