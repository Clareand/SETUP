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
                'name' => 'Android : Basic Things',
                'field_of_tech' => 1,
                'all_module' => 6,
                'short_description' => 'Pelajari hal-hal dasar yang diperlukan dalam pengembangan Android dengan mempersiapkan linkungan pengembangan yang dibutuhkan untuk pengembangan Android.',
                'long_description' => '<h2>Dasar Pengembangan Android</h2><p>Dalam pengembangan Android, akan terdapat banyak hal yang kamu pelajari seperti dasar pemograman android, penggunaan bahasa pemograma Java, penggunaan komponen arsitektur android dan membangun sebuah aplikasi sederhana. Untuk memulai pengembangan Android, terlebih dahulu lakukan konfigurasi untuk lingkungan pengembangan seperti melakukan instalasi IDE untuk pengembangan. </p><p><br></p><h3>Apa saja yang akan dibahas dalam kelas ini?</h3><ul><li>Instalasi IDE</li><li>Konfigurasi Perangkat dan Emulator</li><li>Konfigurasi Graddle dan Log</li></ul><p><br></p><blockquote>Ikuti kelas ini untuk memulai karirmu sebagai Android Developer!</blockquote>',
                'image' => 'public/class/1624441703.png',
                'created_at' => '2021-06-23 09:48:23',
                'updated_at' => '2021-06-23 12:11:46',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dasar Pemograman Java',
                'field_of_tech' => 1,
                'all_module' => 7,
                'short_description' => 'Pelajari bahasa pemograman Java buat kamu yang ingin memahami konsep OOP untuk mengembangan aplikasi.',
            'long_description' => '<p>Java merupakan bahasa pemograman yang diciptakan pada era 1990-an. Salah satu penggunaan terbesar dalam bahasa pemogaraman Java adalah untuk pembuatan aplikasi native Android. Selai itu. Java juga menjadi pondasi dari berbagai jenis bahasa pemograman seperti :</p><ul><li>Kotlin</li><li>Scala</li><li>Jython</li><li>dll</li></ul><p>Bahasa pemograman Java diciptakan oleh James Gosling yang diambil dari sebuah nama pulai yang berada di Indonesia saat James melakukan Liburan.</p><p><br></p><h3>Yang diperlukan untuk mempelajari kelas ini:</h3><ul><li>Sistem operasi : Windows, Linux. atau MacOs</li><li>Processor : Intel Core i3 (minimum), direkomendasian  Core i5 keatas</li><li>Ram : 2GB (minimum), direkomendasikan 8GB</li><li>OpenJDK</li><li>Browser</li></ul>',
                'image' => 'public/class/1624447838.png',
                'created_at' => '2021-06-23 11:30:38',
                'updated_at' => '2021-06-24 05:44:51',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Android : Layout Editor',
                'field_of_tech' => 1,
                'all_module' => 6,
                'short_description' => 'Pelajari Layout editor yang terdapat dalam pengembangan Android untuk mendukung aplikasimu!',
                'long_description' => '<p>Pada kelas ini akan membahas segala hal yang berkaitan dengan cara membangun tampilan dari aplikasi agar terlihat menarik.</p><p>sebelum mengikuti kelas ini pastikann hal dibawah ini :</p><ul><li>Memiliki Komputer/PC</li><li>Sudah melakukan instalasi Android Studio sebagai IDE</li><li>Memiliki koneksi internet</li></ul><p><br></p>',
                'image' => 'public/class/1624509223.png',
                'created_at' => '2021-06-23 11:49:42',
                'updated_at' => '2021-06-24 04:40:18',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'UI/UX Designer',
                'field_of_tech' => 2,
                'all_module' => NULL,
                'short_description' => 'Pelajari mengenai materi yang terkait dengan UI/UX',
                'long_description' => '<p><br></p>',
                'image' => '',
                'created_at' => '2021-06-23 13:47:52',
                'updated_at' => '2021-06-23 13:47:52',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Front-End Developer',
                'field_of_tech' => 5,
                'all_module' => NULL,
                'short_description' => 'Pelajari hal-hal baru terkait dengan Front-End Developer',
                'long_description' => '<p><br></p>',
                'image' => '',
                'created_at' => '2021-06-23 13:48:40',
                'updated_at' => '2021-06-23 13:48:40',
            ),
        ));
        
        
    }
}