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
    public static function index()
    {
        $data=ClassList::with('tech_field','learning_path')->paginate(10);
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
            'id_learning_path'=>'nullable|integer',
            'description'=>'nullable'
        ]);
        if($validator->fails()){
            $response=[$validator->messages()];
            return $response;
        }
        DB::beginTransaction();
        try{
            $data = ClassList::create(array_filter($request->all()));
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
        $data = ClassList::with('learning_path','tech_field','module_lists')->where('id',$id)->get();
        return MyHelper::checkGet($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public static function edit($id)
    {
        $data=ClassList::with('learning_path','tech_field','module_lists')->where('id',$id)->get();
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
        $class = ClassList::with('learning_path','tech_field')->where('id',$id)->get();
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
        $post = $request->except('_token');
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
        DB::beginTransaction();
        try{
            $deleteClass=$class->delete();
        }catch(\Exception $e){
            DB::rollback();
            return MyHelper::checkDelete($deleteClass);
        }
        DB::commit();
        return MyHelper::checkDelete($deleteClass);
    }
}
