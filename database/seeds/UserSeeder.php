<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        \DB::table('users')->insert(array(
            0=>
            array(
                'id'=>1,
                'name'=>'Admin',
                'email'=>'superadmin@mail.com',
                'phone'=>'0892849124',
                'password'=>bcrypt('12345678'),
                'id_role'=>1,
                'created_at'=>'2021-03-31 10:46:01',
                'created_at'=>'2021-03-31 10:46:01'
            ),
            1=>
            array(
                'id'=>2,
                'name'=>'Student',
                'email'=>'student@mail.com',
                'phone'=>'0892844221',
                'password'=>bcrypt('12345678'),
                'id_role'=>2,
                'created_at'=>'2021-03-31 10:46:01',
                'created_at'=>'2021-03-31 10:46:01'
            ),
        ));
    }
}
