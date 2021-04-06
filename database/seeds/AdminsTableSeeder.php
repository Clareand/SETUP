<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_user' => 1,
                'id_role' => 1,
                'address' => 'Jl.Kaliurang',
                'city' => '1101',
                'created_at' => '2021-04-05 12:49:12',
                'updated_at' => '2021-04-05 12:49:12',
            ),
            1 => 
            array (
                'id' => 10,
                'id_user' => 20,
                'id_role' => 1,
                'address' => 'Boulevard road 17 Number 12',
                'city' => '1102',
                'created_at' => '2021-04-05 12:26:25',
                'updated_at' => '2021-04-05 12:26:25',
            ),
            2 => 
            array (
                'id' => 11,
                'id_user' => 21,
                'id_role' => 1,
                'address' => 'Anggrek Boulevard no 19',
                'city' => '3273',
                'created_at' => '2021-04-05 12:29:18',
                'updated_at' => '2021-04-05 12:29:18',
            ),
        ));
        
        
    }
}