<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        $data = array(
            0=>
            array(
                'id_user'=>1,
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
                'id_user'=>2,
                'name'=>'Student',
                'email'=>'student@mail.com',
                'phone'=>'0892844221',
                'password'=>bcrypt('12345678'),
                'id_role'=>2,
                'created_at'=>'2021-03-31 10:46:01',
                'created_at'=>'2021-03-31 10:46:01'
            ),
        );
        foreach($data as $key =>$value){
            $user = new User();
            $user->name=$value['name'];
            $user->email=$value['email'];
            $user->phone=$value['phone'];
            $user->password=$value['password'];
            $user->id_role=$value['id_role'];
            $user->save();
        }
    }
}
