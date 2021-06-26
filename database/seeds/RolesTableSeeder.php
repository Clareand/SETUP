<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_name' => 'Admin',
                'created_at' => '2021-03-31 10:46:01',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role_name' => 'Student',
                'created_at' => '2021-03-31 10:46:01',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}