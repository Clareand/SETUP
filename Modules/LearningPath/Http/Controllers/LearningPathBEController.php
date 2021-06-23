<?php

namespace Modules\LearningPath\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\ClassList;
use App\Models\LearningPath;
use App\Library\MyHelper;
use App\Models\ClassPath;
use DB;
use Validator;
use Auth;

class LearningPathBEController extends Controller
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
        $data = LearningPath::with('badge','tech_field')->paginate(10);
        return MyHelper::checkGet($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public static function store($request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'string',
            'description'=>'string'
        ]);
        if($validator->fails()){
            $response=MyHelper::checkValidator($validator->messages()->all());
            return $response;
        }

        DB::beginTransaction();
        try{
            $data=LearningPath::create(array_filter($request->all()));
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
        $data = LearningPath::with('badge','tech_field','class_paths.class_list')->where('id',$id)->get();
        // return $data;
        return MyHelper::checkGet($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public static function edit($id)
    {
        $data = LearningPath::with('badge','tech_field')->where('id',$id)->get();
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
        $validator = Validator::make($request->all(),[
            'name'=>'string',
            'description'=>'string|nullable'
        ]);
        if($validator->fails()){
            $response=MyHelper::checkValidator($validator->messages()->all());
            return $response;
        }

        $post = $request->except('_token');
        DB::beginTransaction();
        try{
            $updatePath = LearningPath::where('id',$id)->update($post);
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkUpdate($updatePath);
        }
        DB::commit();
        return MyHelper::checkUpdate($updatePath);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public static function destroy($id)
    {
        $path = LearningPath::findOrFail($id);
        DB::beginTransaction();
        try{
            $deletePath = $path->delete();
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkDelete($deletePath);
        }
        DB::commit();
        return MyHelper::checkDelete($deletePath);
    }

    public static function addClassPath($id){
        $path = ClassPath::where('id_learning_path',$id)->orderBy('step','ASC')->get();
        // $class = ClassList::where('field_of_tech',$path['id_field_of_tech'])->get();
        $class = ClassList::all();
        $data = [
            'path'=>$path,
            'class'=>$class,
            'id'=>$id
        ];
        return MyHelper::checkGet($data);
    }

    public static function storeClassPath($request,$id){
        $class = ClassPath::where('id_learning_path',$id)->get();
        $count = 0;
        foreach($class as $item){
            if($item['step']==$request['step']){
                $response=[
                    'status'=>'fail',
                    'result'=>['Step already define']
                ];
                return $response;
            }
            if($item['id_class']==$request['id_class']){
                $response=[
                    'status'=>'fail',
                    'result'=>['Class already added']
                ];
                return $response;
            }
        }
        DB::beginTransaction();
        try{
            $addClass = ClassPath::create(array_filter($request->all()));
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkCreate($addClass);
        }
        DB::commit();
        return MyHelper::checkCreate($addClass);
    }

    public static function deleteClassPath($id){
        $classPath = ClassPath::findOrFail($id);
        DB::beginTransaction();
        try{
            $deletePathClass = $classPath->delete();
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkDelete($deletePathClass);
        }

        DB::commit();
        return MyHelper::checkDelete($deletePathClass);
    }
}
