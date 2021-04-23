<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Student;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Role;
use App\Library\MyHelper;
use DB;
use Validator;
use Auth;
use Hash;

class StudentBEController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public static function index()
    {
        $data = Student::with('user','regency.province')->paginate(10);
        return MyHelper::checkGet($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('student::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public static function show($id)
    {
        $data = Student::with('user','regency.province')->where('id',$id)->get();
        // return $data;
        return MyHelper::checkGet($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('student::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public static function update($request, $id)
    {
        // return $request;
        $student = Student::with('user','regency.province')->where('id',$id)->get();
        $validator = Validator::make($request->all(),[
           'name'=>'string',
           'last_name'=>'string',
           'phone'=>'string|max:13',
           'email'=>'string',
           'address'=>'nullable|string',
           'city'=>'nullable|string',
           'postal_code'=>'nullable|string',
           'password'=>'confirmed'
        ]);
        if($validator->fails()){
            $response=MyHelper::checkValidator($validator->messages()->all());
            return $response;
        };
        // return $student;
        if($request['password']==null){
            $postStudent=$request->only(['address','city','last_name','postal_code']);
            $postUser=$request->only(['name','phone','email']);
        }else{
            $postUser=$request->only(['name','phone','email','password']);
            $postUser['password']=Hash::make($request->password);
            $postStudent=$request->only(['address','city','last_name','postal_code']);
        };
        DB::beginTransaction();
        try{
            $updateUser=User::where('id',$student[0]['id_user'])->update($postUser);
        }catch(\Exception $e){
            DB::rollback();
            return $e;
        };

        try{
            $updateStudent=Student::where('id',$id)->update($postStudent);
        }catch(\Exception $e){
            DB::rollback();
            return $e;
        }

        DB::commit();
        return MyHelper::checkUpdate($updateStudent);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public static function destroy($id)
    {
        $student = Student::with('user','regency.province')->findOrFail($id);
        $user = User::findOrFail($student['id_user']);

        DB::beginTransaction();
        try{
            $deleteStudent = $student->delete();
        }catch(\Exception $e){
            DB::rollback();
            return MyHelper::checkDelete($deleteStudent);
        }
        try{
            $is_deleted=1;
            $updateUser=User::where('id',$user['id'])->update(['is_deleted'=>$is_deleted]);
        }catch(\Exception $e){
            DB::rollback();
            return MyHelper::checkDelete($deleteStudent);
        }
        DB::commit();
        return MyHelper::checkDelete($deleteStudent);
    }
}
