<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Role;
use App\Library\MyHelper;
use DB;
use Validator;
use Auth;
use Hash;

class AdminBEController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public static function getUserAll()
    {
        $data=Admin::with('user','regency.province')->paginate(10);
        return MyHelper::checkGet($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public static function store($request)
    {
        //    
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public static function edit($id)
    {
    //    return $id;
       $data = Admin::with('user','regency.province')->where('id',$id)->get();
       return MyHelper::checkGet($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public static function update($request, $id)
    {
       $admin = Admin::with('user','regency.province')->findOrFail($id);
       $validator = Validator::make($request->all(),[
           'name'=>'string',
           'phone'=>'string|max:13',
           'email'=>'string',
           'address'=>'string',
           'city'=>'string',
           'password'=>'confirmed'
       ]);
       if($validator->fails()){
           $response=MyHelper::checkValidator($validator->messages()->all());
           return $response;
       };
       
       if($request['password']==null){
           $postAdmin=$request->only(['address','city']);
           $postUser=$request->only(['name','phone','email']);
       }else{
           $postUser=$request->except(['address','city','_token','province','password_confirmation']);
           $postUser['password']=Hash::make($request->password);
           $postAdmin=$request->only(['address','city']);
       };
       DB::beginTransaction();
       try{
           $updateUser=User::where('id',$admin['id_user'])->update($postUser);
       }catch(\Exception $e){
           DB::rollback();
           return $e;
       };

       try{
           $updateAdmin=Admin::where('id',$id)->update($postAdmin);
       }catch(\Exception $e){
           DB::rollback();
           return $e;
       };

       DB::commit();
       return MyHelper::checkUpdate($updateAdmin);

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public static function destroy($id)
    {
        $admin = Admin::with('user','regency.province')->findOrFail($id);
        $user = User::findOrFail($admin['id_user']);
        // return $user;
        DB::beginTransaction();
        try{
            $deleteAdmin = $admin->delete();
        }catch(\Exception $e){
            DB::rollback();
            return MyHelper::checkDelete($deleteAdmin);
        }
        try{
            $is_deleted=1;
            $updateUser=User::where('id',$user['id'])->update(['is_deleted'=>$is_deleted]);
        }catch(\Exception $e){
            DB::rollback();
            return MyHelper::checkDelete($updateUser);
        }
        DB::commit();
        return MyHelper::checkDelete($deleteAdmin);
       
    }
}
