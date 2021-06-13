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
use App\Models\ClassList;
use App\Models\LearningPath;
use App\Models\UserClassList;
use App\Models\UserTaskAnswer;
use DB;
use Validator;
use Auth;
use Dotenv\Store\File\Paths;
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

    // review

    public static function review(){
        $data = UserTaskAnswer::whereNotNull('answer_upload')->with('task','user','task_field')->paginate('10');
        return MyHelper::checkGet($data);
    }

    public static function reviewDetail($id){
        $data = UserTaskAnswer::where('id',$id)->with('task','user','task_field')->get();
        return MyHelper::checkGet($data);
    }

    public static function reviewEdit($id){
        $data = UserTaskAnswer::where('id',$id)->with('task','user','task_field')->get();
        return MyHelper::checkGet($data);
    }

    public static function reviewUpdate($request,$id){
    //    return $request;
       DB::beginTransaction();
       try{
        $updateAnswer=UserTaskAnswer::where('id',$id)->update($request->except('_token'));
       }catch(\Exception $e){
           DB::rollback();
           return $e;
           return MyHelper::checkUpdate($updateAnswer);
       }

       $task = UserTaskAnswer::where('id',$id)->get();
       $student = Student::where('id_user',$task[0]['id_user'])->get();
       $point = $student[0]['point']+$request['point'];
       try{
        $updateStudent = Student::where('id_user',$task[0]['id_user'])->update(['point'=>$point]);
       }catch(\Exception $e){
           DB::rollback();
           return $e;
           return MyHelper::checkUpdate($updateStudent);
       }
       DB::commit();
       return MyHelper::checkUpdate($updateAnswer);
    }

    public static function studentProfile($id){
        $data = Student::where('id_user',$id)->with('user','regency.province','user.badges','user.class_lists')->get();
        // return $data;
        return MyHelper::checkGet($data);
    }
    
    public static function classHistory(){
        $class = UserClassList::where('id_user',Auth::user()->id)->with('class_list.class_paths.learning_path')->get();
        $id_path = [];
        $path=[];
        // return $class;
        foreach($class as $item){
            if(count($item['class_list']['class_paths'])!=0){
                foreach($item['class_list']['class_paths'] as $items){
                    if(in_array($items['learning_path']['id'],$id_path)==false){
                        array_push($id_path,$items['learning_path']['id']);
                    }
                }
            }
        }
        foreach($id_path as $item){
            $paths = LearningPath::where('id',$item)->with('badge')->get();
            array_push($path,$paths[0]);
        }
        // return $path;
        $data = [
            'class'=>$class,
            'path'=>$path
        ];
        return MyHelper::checkGet($data);
    }
    public static function leaderboard(){
        $rank = Student::with('user.badges')->orderBy('point','desc')->take(20)->get();
        $userSelf = Student::with('user.badges')->orderBy('point','desc')->get();
        $id=Auth::user()->id;
        foreach($userSelf as $key=>$values){
            if($values['id_user']==$id){
                $rank_user=$key+1;
                break;
            }
        }
        // return $rank_user;
        $data =[
            'rank'=>$rank,
            'userRank'=>$rank_user
        ];
        return MyHelper::checkGet($data);
    }
}


