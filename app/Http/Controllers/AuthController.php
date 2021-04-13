<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\User;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('auth.login');
    }
    public function showFormSignin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('dashboard');
        }
        return view('auth.signin');
    }
 
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
 
        Auth::attempt($data);
 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
           $user = $request->user();
           if($user->id_role==1){
               $request->session()->put('id_role',$user->id_role);
               return redirect()->route('dashboard');
           }else{
            $point = Student::where('id_user',$user->id)->get();
            $request->session()->put('point',$point[0]['point']);
            return redirect()->route('pages');
           }
            
 
        } else { // false
 
            //Login Fail
            Session::flash('error', ['Email atau password salah']);
            return redirect()->route('login');
        }
 
    }
 
    public function showFormRegister()
    {
        return view('auth.register');
    }
 
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];
 
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        DB::beginTransaction();
        try{
            $user = new User;
            $user->name = ucwords(strtolower($request->name));
            $user->email = strtolower($request->email);
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->id_role=$request->role;
            $user->save();
        }catch(\Exception $e){
            return $e;
            DB::rollback();
            Session::flash('errors', ['Register Failed! Please try again later']);
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        };
        if($user->id_role==2){
            try{
                $student = new Student;
                $student->id_user = $user->id;
                $student->id_role = $user->id_role;
                $student->last_name = ucwords(strtolower($request->last_name));
                $student->point=0;
                $student->save();
            }catch(\Exception $e){
                DB::rollback();
                Session::flash('errors', ['Register Failed! Please try again later']);
                return redirect()->route('register');
            }
        }else if($user->id_role==1){
            try{
                $admin = new Admin;
                $admin->id_user = $user->id;
                $admin->id_role = $user->id_role;
                $admin->city = $request->city;
                $admin->address=$request->address;
                $admin->save();
            }catch(\Exception $e){
                DB::rollback();
                Session::flash('errors', ['Register Admin Failed! Please try again later']);
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        };
        DB::commit();
        if($user->id_role==1){
            Session::flash('success', ['Register Admin Success!']);
            return redirect()->route('list');
        }else if($user->id_role==2){
            Session::flash('success', ['Register Success! Please Login to access']);
            return redirect('/login');
        }
        
    }
 
    public function logout()
    {
        $role =Auth::user()->id_role;
        Auth::logout(); // menghapus session yang aktif
        if($role==1){
            return redirect()->route('admin');
        }else{
            return redirect()->route('login');
        }   
    }
}
