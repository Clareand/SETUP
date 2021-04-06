<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'superadmin@mail.com',
                'phone' => '0892849124',
                'password' => '$2y$10$05wZMA41klrnvLVAk2RmnOIpVJc.Bb6J0mFALXdfQ7koY1brf.QsC',
                'id_role' => 1,
                'is_deleted' => 0,
                'created_at' => '2021-03-31 10:46:01',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Student',
                'email' => 'student@mail.com',
                'phone' => '0892844221',
                'password' => '$2y$10$2LcjLFjwgdw.DyP8m.RE5O2duUmsgSDK2Ix/w4W0zrfTorlxALNNG',
                'id_role' => 2,
                'is_deleted' => 0,
                'created_at' => '2021-03-31 10:46:01',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Student',
                'email' => 'student2@mail.com',
                'phone' => '08918317283',
                'password' => '$2y$10$D.yEQNr/HaQEnWXsrQo1MeWS1WU68Nm6MF4F0zUXZi9P7wRWPGKe.',
                'id_role' => 2,
                'is_deleted' => 0,
                'created_at' => '2021-04-01 07:26:56',
                'updated_at' => '2021-04-01 07:26:56',
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'Ali',
                'email' => 'student3@mail.com',
                'phone' => '08729481821',
                'password' => '$2y$10$33D5s3EMvbpjbrU6vd8ChOO0EeNQzpkrrkHmbHEDTbsFUd6oI8X9y',
                'id_role' => 2,
                'is_deleted' => 0,
                'created_at' => '2021-04-01 09:58:41',
                'updated_at' => '2021-04-01 09:58:41',
            ),
            4 => 
            array (
                'id' => 20,
                'name' => 'Jesse H',
                'email' => 'jesseadmin@mail.com',
                'phone' => '0982948122',
                'password' => '$2y$10$AR1xDTUTGXcgv8B2zjzbWOr3gt1J.uoQNHor643pg77U5gM0dnjzC',
                'id_role' => 1,
                'is_deleted' => 0,
                'created_at' => '2021-04-05 12:26:25',
                'updated_at' => '2021-04-05 12:26:25',
            ),
            5 => 
            array (
                'id' => 21,
                'name' => 'Seth Roegen',
                'email' => 'sethadmin@mail.com',
                'phone' => '08927482124',
                'password' => '$2y$10$i50vL8jBgjw.cgkwIgMH/emMbdTySmJdxx2wQF8uoC6UXZj.LeDMi',
                'id_role' => 1,
                'is_deleted' => 0,
                'created_at' => '2021-04-05 12:29:18',
                'updated_at' => '2021-04-05 12:29:18',
            ),
        ));
        
        
    }
}