<?php

namespace Modules\Classes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\TechField;
use App\Models\LearningPath;
use App\Models\Material;
use App\Models\Task;
use App\Models\ClassList;
use App\Library\MyHelper;
use App\Models\ModuleList;
use App\Models\Student;
use App\Models\TaskField;
use App\Models\UserClassList;
use App\Models\UserModule;
use App\Models\UserTask;
use App\Models\UserTaskAnswer;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use Auth;
use Hash;
use Session;
use Modules\Student\Http\Controllers\StudentBEController;

class ClassesBEController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public static function index()
    {
        $data=ClassList::with('tech_field')->paginate(10);
        return MyHelper::checkGet($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('classes::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public static function store($request)
    { 
        // return $request;
        $validator = Validator::make($request->all(),[
            'name'=>'string',
            'tech'=>'integer',
            'short_description'=>'nullable',
            'long_description'=>'nullable',
        ]);
        if($validator->fails()){
            $response=[$validator->messages()];
            return $response;
        }
        if($request['image']){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $path = $request->image->storeAs(('public/class'), $name);
        }
         $store = $request->except('_token','image');
         if($request['image']){
            $store['image'] = $path;
         }
        DB::beginTransaction();
        try{
            $data = ClassList::create($store);
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkCreate($data);
        }
        DB::commit();
        return MyHelper::checkCreate($data);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public static function show($id)
    {
        $data = ClassList::with('tech_field','module_lists.material','module_lists.task')->where('id',$id)->get();
        return MyHelper::checkGet($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public static function edit($id)
    {
        $data=ClassList::with('tech_field','module_lists.material','module_lists.task')->where('id',$id)->get();
        // return $data;
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
        $class = ClassList::with('tech_field')->where('id',$id)->get();
        $validator = Validator::make($request->all(),[
            'name'=>'string',
            'field_of_techh'=>'integer',
            'id_learning_path'=>'integer|nullable',
            'short_description'=>'nullable',
            'long_description'=>'nullable'
        ]);
        if($validator->fails()){
            $response=[
                'status'=>'fail',
                'result'=>$validator->messages()->all()
            ];
            return $response;
        }
        $class = ClassList::where('id',$id)->get();
         if($request['image']){
             if(!empty($class['image'])){
                Storage::delete($class['image']);
             }
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $path = $request->image->storeAs(('public/class'), $name);
         }
        $post = $request->except('_token');
        if($request['image']){
            $post['image'] = $path;
        }
        // return $post;
        DB::beginTransaction();
        try{
            $updateClass = ClassList::where('id',$id)->update($post);
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkUpdate($updateClass);
        }
        DB::commit();
        return MyHelper::checkUpdate($updateClass);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public static function destroy($id)
    {
        $class = ClassList::findOrFail($id);
        $path = $class['image'];
        DB::beginTransaction();
        try{
            $deleteClass=$class->delete();
        }catch(\Exception $e){
            DB::rollback();
            return MyHelper::checkDelete($deleteClass);
        }
        $image = Storage::delete($path);
        if($image==1){
            DB::commit();
            return MyHelper::checkDelete($deleteClass);
        }
        DB::rollback();
        return MyHelper::checkDelete($deleteClass);
    }


    //FE

    public static function classEnroll($request){
        $user = Auth::user();
        $request['id_user']=$user['id'];
        $check = UserClassList::where(['id_user'=>$request['id_user'],'id_class'=>$request['id_class']])->get();
        if(count($check)==0){
            DB::beginTransaction();
            try{
                $data = UserClassList::create(array_filter($request->all()));
            }catch(\Exception $e){
                DB::rollback();
                return $e;
                return MyHelper::checkCreate($data);
            }
    
            $module_list=ModuleList::where('id_class',$request['id_class'])->get();
            // return $module_list;
            for($i=0;$i<count($module_list);$i++){
                $storeModule = [
                    'id_user'=>$request['id_user'],
                    'id_module'=>$module_list[$i]['id'],
                    'status'=>'0',
                ];
    
                try{
                    $data2 = UserModule::create($storeModule);
                }catch(\Exception $e){
                    return $e;
                    return MyHelper::checkCreate($data2);
                }
            }
            DB::commit();
            return MyHelper::checkCreate($data);
        }else{
            return MyHelper::checkCreate(null);
        }

    }

    public static function getPath(){
        $data=LearningPath::with('tech_field','badge')->get();
        return MyHelper::checkGet($data);
    }

    public static function pathClassList($id){
        $data = LearningPath::with('class_paths.class_list','badge')->where('id',$id)->get();
        return MyHelper::checkGet($data);
    }

    public static function classDetail($id){
        $data = ClassList::where('id',$id)->with('tech_field','module_lists.material','module_lists.task')->get();
        return MyHelper::checkGet($data);
    }

    public static function checkEnrollment($request){
        // return $request;
        $user = UserClassList::where(['id_user'=>$request['id'],'id_class'=>$request['class']])->get();
        if(count($user)!=0){
            $data = self::checkStep($request['class']);
            $data['flag']='true'; 
            return $data;
        }
        return 'false';
    }

    public static function classMaterial($class,$tutorial){
        $module = ModuleList::where(['id_class'=>$class,'step'=>$tutorial])->with('material','task.task_fields.task_field_options')->get();
        $list = ModuleList::where('id_class',$class)->orderBy('step','asc')->get();
        $users = UserModule::where('id_user',Auth::user()->id)->get();
        $user_module = [];
        $counts = [];
        $status = 0;
        // return $status;
        // return $tutorial;
        for($i=0;$i<count($list);$i++){
            for($j=0;$j<count($users);$j++){
                if($list[$i]['id']==$users[$j]['id_module']){
                    array_push($user_module,$users[$j]);
                    if($users[$j]['status']==1){
                        array_push($counts,$users[$j]);
                        if($users[$j]['id_module']==$module[0]['id']){
                            $status=$users[$j]['status'];
                        }
                    }
                }
            }
        }
        $data = [
            'status'=>$status,
            'module'=>$module,
            'list'  => $list,
            'user' => $user_module,
            'counts'=>$counts
        ];
        // take result from user answer
        if($status == 1 && $module[0]['type']=='task'){
            $user_task = UserTask::where(['id_user'=>Auth::user()->id,'id_task'=>$module[0]['id_task']])->get();
            $user_answer = UserTaskAnswer::where('id_user_task',$user_task[0]['id'])->get();
            $data['task'] = $user_task;
            $data['answer']=$user_answer;
        }
        return MyHelper::checkGet($data);
    }

    public static function addPoint($request){
        $student = Student::where('id_user',Auth::user()->id)->get();
        $module = ModuleList::where('id',$request['id'])->with('material','task')->get();
        if($module[0]['type']=='material'){
            $point = $module[0]['material']['point'];
        }else{
            $point = $request['point'];
        }
        $point = $student[0]['point']+$point;
        DB::beginTransaction();
        try{
            $data = Student::where('id_user',Auth::user()->id)->update(array('point'=>$point));
        }catch(\Exception $e){
            DB::rollback();
            return 'false';
        }
        DB::commit();
        $student = Student::where('id_user',Auth::user()->id)->get();
        Session::put('point',$student[0]['point']);
        return 'true';
    }

    public static function checkStatusMaterial($request){
        $checked = UserModule::where(['id_user'=>Auth::user()->id,'id_module'=>$request['id']])->get();
        if($checked[0]['status']==1){
            return 'done';
        }
        DB::beginTransaction();
        try{
            $data = UserModule::where(['id_user'=>Auth::user()->id,'id_module'=>$request['id']])->update(array('status'=>'1'));
        }catch(\Exception $e){
            DB::rollback();
            return 'false';
        }
        $addPoint=self::addPoint($request);
        $id_class=$request['class'];
        if($addPoint=='true'){
            $count1 = UserModule::whereHas('module_list',function($q) use($id_class){
                return $q->where('id_class','=',$id_class);
            })
            ->where('status','1')
            ->get();
            $count2 = UserModule::whereHas('module_list',function($q) use($id_class){
                return $q->where('id_class','=',$id_class);
            })
            ->get();
            $percent = self::percentage(count($count1),count($count2));
            // return $percent;
            try{
                $userClass = UserClassList::where(['id_user'=>Auth::user()->id,'id_class'=>$request['class']])->update(array('progress'=>$percent));
            }catch(\Exception $e){
                DB::rollback();
                return 'false';
            }
            DB::commit();
        }else{
            DB::rollback();
        }
        return $addPoint;
    }

    public static function percentage($num1,$num2){
        $data = round((($num1/$num2)*100),2);
        return $data;
    }

    public static function checkStep($id){
        $module=ModuleList::where('id_class',$id)->orderBy('step','asc')->get();
        $user_module = UserModule::where('id_user',Auth::user()->id)->with('module_list')->get();
        for($i=0;$i<count($user_module);$i++){
            if($user_module[$i]['module_list']['id_class']==$id){
                $modules[]=$user_module[$i];
            }
        }
        for($i=0;$i<count($modules);$i++){
            if($module[$i]['id']==$modules[$i]['id_module']){
                if($modules[$i]['status']==0){
                    return $modules[$i];
                    break;
                }
            }
        }
        return end($modules);
    }

    public static function checkTask($request,$id){
        // return $request;
        // status : 0 (not yet),1(acc),2(wrong),3(pending)
        $answers = [];
        // upload files
        if($request->file('upload')){
            $file = $request->file('upload');
            $name = time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('upload')->storeAs(('public/task'), $name);
        }
        // sorting answer
        foreach($request->all() as $key=>$value){
            if(stristr($key,'multiple')!==FALSE){
                $answer = [
                    'id_user'=>Auth::user()->id,
                    'id_task'=>$id,
                    'type' =>'multiple',
                    'id_task_field' => substr($key,-1),
                    'answer_multiple' => $value
                ];
                array_push($answers,$answer);
            }
            if(stristr($key,'short_answer')!==FALSE){
                $answer = [
                    'id_user'=>Auth::user()->id,
                    'id_task'=>$id,
                    'type'=>'short answer',
                    'id_task_field' => substr($key,-1),
                    'answer_short' => strtolower($value),
                ];
                array_push($answers,$answer);
            }
            if(stristr($key,'file')!==FALSE){
                $answer = [
                    'id_user'=>Auth::user()->id,
                    'id_task'=>$id,
                    'type'=>'file upload',
                    'id_task_field' => substr($key,-1),
                    'answer_upload' => $path,
                    'point'=>0,
                    'status'=>3
                ];
                array_push($answers,$answer);
            }
        }
        $task = TaskField::where('id_task',$id)->with('task_field_options')->get();
        // return $answers[0]['answer'];
        for($i=0;$i<count($task);$i++){
            for($j=0;$j<count($answers);$j++){
                if($answers[$j]['id_task_field']==$task[$i]['id']){
                    if($answers[$j]['type']=='multiple'){
                        for($x=0;$x<count($task[$i]['task_field_options']);$x++){
                            if($answers[$j]['answer_multiple']==$task[$i]['task_field_options'][$x]['id']){
                                if($task[$i]['task_field_options'][$x]['option_value']=='true'){
                                    $answers[$j]['point']=$task[$i]['point'];
                                    $answers[$j]['status']=1;
                                }else{
                                    $answers[$j]['point']=0;
                                    $answers[$j]['status']=2;
                                }
                            }
                        }
                    }else if($answers[$j]['type']=='short answer'){
                        if($answers[$j]['answer_short']==$task[$i]['task_field_options'][0]['option_value']){
                            $answers[$j]['point']=$task[$i]['point'];
                            $answers[$j]['status']=1;
                        }else{
                            $answers[$j]['point']=0;
                            $answers[$j]['status']=2;
                        }
                    }else{
                        $answers[$j]['point']=0;
                        $answers[$j]['status']=3;
                    }
                }
            }
        }
        // return $answers;
        // insert to user Task
        DB::beginTransaction();
        try{
            $user_task = UserTask::create([
                'id_task'=>$request['id_task'],
                'id_user'=>Auth::user()->id,
                'point'=>0
            ]);
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkCreate($user_task);
        }
        $points = 0;
        // return $answers;
        // insert to user_task_answer
        for($i=0;$i<count($answers);$i++){
            $points = $points+$answers[$i]['point'];
            $answers[$i]['id_user_task']=$user_task['id'];
            // return $answers;
            try{
                $user_answer=UserTaskAnswer::create($answers[$i]);
            }catch(\Exception $e){
                DB::rollback();
                return $e;
            }
        }
        // update user Task
        try{
            $user_task_update = UserTask::where('id',$user_task['id'])->update(['point'=>$points]);
        }catch(\Exception $e){
            DB::rollback();
            return $e;
        }

        // search modulelist 
        $module_list = ModuleList::where(['id_class'=>$request['id_class'],'id_task'=>$id])->get();
        // return $module_list;
        // update userModule
        $module_lists = UserModule::where(['id_module'=>$module_list[0]['id'],'id_user'=>Auth::user()->id])->update(['status'=>'1']);
        $param = [
            'point' =>$points,
            'id'=>$module_list[0]['id']
        ];
        $add_point = self::addPoint($param);
        // return $add_point;
        $id_class=$request['id_class'];
        if($add_point=='true'){
            $count1 = UserModule::whereHas('module_list',function($q) use($id_class){
                return $q->where('id_class','=',$id_class);
            })
            ->where('status','1')
            ->get();
            $count2 = UserModule::whereHas('module_list',function($q) use($id_class){
                return $q->where('id_class','=',$id_class);
            })
            ->get();
            $percent = self::percentage(count($count1),count($count2));
            try{
                $userClass = UserClassList::where(['id_user'=>Auth::user()->id,'id_class'=>$request['id_class']])->update(array('progress'=>$percent));
            }catch(\Exception $e){
                DB::rollback();
                return $e;
            }
            DB::commit();
            return $add_point;
        }else{
            DB::rollback();
            return MyHelper::checkCreate($add_point);
        }
        
    }
    
    // Search Class
    public static function searchClass($request){
        $data = ClassList::where('name','like','%'.$request['class'].'%')->with('tech_field')->paginate(10);
        return MyHelper::checkGet($data);
    }

    // module & task in class

    public static function addModule($id){
        $task = Task::all();
        $material = Material::all();
        $list = ModuleList::where('id_class',$id)->with('material','task')->orderBy('step','asc')->get();
        // return $list;
        $data=[
            'task'=>$task,
            'material'=>$material,
            'list'=>$list
        ];
        return MyHelper::checkGet($data);
    }

    public static function storeModule($request,$id){
        $class = ModuleList::where('id_class',$id)->get();
        $count = 0;
        // return $class;
        foreach ($class as $item){
            // return $request;
            if($item['step']==$request['step']){
                $response=[
                    'status'=>'fail',
                    'result'=>['Step already define']
                ];
                return $response;
            }
            else if($item['id_material']==$request['id_material'] && $request['id_material']){
                $response=[
                    'status'=>'fail',
                    'result'=>['module already added']
                ];
                return $response;
            }
            else if($item['id_task']==$request['id_task'] && $request['id_task']){
                $response=[
                    'status'=>'fail',
                    'result'=>['task already added']
                ];
                return $response;
            }
        }

        DB::beginTransaction();
        try{
            $addModule=ModuleList::create(array_filter($request->all()));
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkCreate($addModule);
        }
        $module['all_module'] = ModuleList::where('id_class',$id)->count();
        
        try{
            $countModule=ClassList::where('id',$id)->update($module);
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkUpdate($countModule);
        }
        DB::commit();
        
        return MyHelper::checkCreate($addModule);
        
    }

    public static function destroyModule($id){
        $class = ModuleList::where('id',$id)->get();
        DB::beginTransaction();
        try{
            $module = ModuleList::where('id',$id)->delete();
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkDelete($module);
        }
        $modules['all_module'] = ModuleList::where('id_class',$class[0]['id_class'])->count();
        // return $modules;
        try{
            $countModule=ClassList::where('id',$class[0]['id_class'])->update($modules);
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkUpdate($countModule);
        }
        DB::commit();
        return MyHelper::checkDelete($module);
    }
}
