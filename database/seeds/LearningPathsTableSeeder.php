<?php


use Illuminate\Database\Seeder;

class LearningPathsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('learning_paths')->delete();
        
        \DB::table('learning_paths')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_badge' => 1,
                'id_field_of_tech' => 1,
                'name' => 'Android Developer : Beginner',
                'description' => 'Alur Belajar yang sesuai untuk kamu yang ingin memulai karir sebagai Android Developer. Membahas seluruh kebutuhan dan hal-hal dasar mengenai dunia Android untuk kamu memulai karirmu sebagai Android Developer.',
                'created_at' => '2021-06-23 13:42:19',
                'updated_at' => '2021-06-24 03:25:37',
            ),
            1 => 
            array (
                'id' => 2,
                'id_badge' => 5,
                'id_field_of_tech' => 5,
                'name' => 'Front-End Developer',
                'description' => 'Alur belajar yang disesuaikan  bagi kamu yang ingin memulai karir sebagai Front-End Developer. Membahas hal-hal yang berkaitan dengan membangun tampilan yang baik untuk aplikasimu',
                'created_at' => '2021-06-23 13:52:11',
                'updated_at' => '2021-06-24 03:27:31',
            ),
            2 => 
            array (
                'id' => 3,
                'id_badge' => 6,
                'id_field_of_tech' => 5,
                'name' => 'Back-End Developer',
                'description' => 'Alur belajar yang disesuaikan bagi kamu yang ingin memulai karir sebagai Back-End Developer. Membahas seluruh kebutuhan dan hal-hal dasar untuk menjadi seorang Back-end Engineer profesional.',
                'created_at' => '2021-06-23 13:53:45',
                'updated_at' => '2021-06-24 03:31:23',
            ),
            3 => 
            array (
                'id' => 4,
                'id_badge' => 4,
                'id_field_of_tech' => 3,
                'name' => 'IOS Developer',
                'description' => 'Alur belajar yang disesuaikan bagi kamu yang ingin memulai karir sebagai IOS Developer. Membahas seluruh hal-hal dan kebutuhan yang berkaitan dengan membangun sebuah aplikasi untuk IOS.',
                'created_at' => '2021-06-23 13:54:46',
                'updated_at' => '2021-06-24 03:32:21',
            ),
        ));
        
        
    }
}