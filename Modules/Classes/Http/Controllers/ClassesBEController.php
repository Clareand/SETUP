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
use DB;
use Validator;
use Auth;
use Hash;
use PhpParser\Node\Stmt\ClassLike;

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
            'description'=>'nullable'
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
        $data = ClassList::with('tech_field','module_lists')->where('id',$id)->get();
        return MyHelper::checkGet($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public static function edit($id)
    {
        $data=ClassList::with('tech_field','module_lists')->where('id',$id)->get();
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
            'description'=>'nullable'
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
        DB::commit();
        Storage::delete($path);
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
        $data=LearningPath::with('tech_field')->get();
        return MyHelper::checkGet($data);
    }

    public static function addModule(){
        $task = Task::all();
        $material = Material::all();
        $data=[
            'task'=>$task,
            'material'=>$material
        ];
        return MyHelper::checkGet($data);
    }

    public static function storeModule($request,$id){
        $class = ModuleList::where('id_class',$id)->get();
        $count = 0;
        // return $class;
        foreach ($class as $item){
            if($item['step']==$request['step']){
                $response=[
                    'status'=>'fail',
                    'result'=>['Step already define']
                ];
                return $response;
            }
            if($item['id_material']==$request['id_material']){
                $response=[
                    'status'=>'fail',
                    'result'=>['module already added']
                ];
                return $response;
            }
            if($item['id_task']==$request['id_task']){
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
        DB::commit();
        return MyHelper::checkCreate($addModule);
        
    }
}
