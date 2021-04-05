<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        \DB::table('roles')->insert(array(
            0=>
            array(
                'id'=>1,
                'role_name'=>'Admin',
                'created_at'=>'2021-03-31 10:46:01',
                'created_at'=>'2021-03-31 10:46:01'
            ),
            1=>
            array(
                'id'=>2,
                'role_name'=>'Student',
                'created_at'=>'2021-03-31 10:46:01',
                'created_at'=>'2021-03-31 10:46:01'
            ),
        ));
    }
}
