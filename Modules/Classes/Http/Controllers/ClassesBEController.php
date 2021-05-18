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
use App\Models\UserClassList;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use Auth;
use Hash;

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
        // return $request;
        DB::beginTransaction();
        try{
            $data = UserClassList::create(array_filter($request->all()));
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkCreate($data);
        }
        DB::commit();
        return MyHelper::checkCreate($data);
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
        $data = UserClassList::where(['id_user'=>$request['id'],'id_class'=>$request['class']])->get();
        if(count($data)!=0){
            return 'true';
        }
        return 'false';
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
