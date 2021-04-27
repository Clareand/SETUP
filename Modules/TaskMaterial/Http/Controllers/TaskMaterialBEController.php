<?php

namespace Modules\TaskMaterial\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Task;
use App\Models\TaskField;
use App\Models\ClassList;
use App\Models\Material;
use App\Library\MyHelper;
use DB;
use Validator;
use Auth;
use Hash;

class TaskMaterialBEController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function getMaterial()
    {
        $data = Material::paginate(10);
        return MyHelper::checkGet($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public static function storeMaterial($request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'string|required'
        ]);
        if($validator->fails()){
            $response=[$validator->messages()];
            return $response;
        }
        if($request['image']){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $path = $request->image->storeAs(('public/material'), $name);
        }
        $store = $request->except('_token','image');
         if($request['image']){
            $store['material_image'] = $path;
         }
        DB::beginTransaction();
        try{
            $data = Material::create($store);
        }catch(\Exception $e){
            DB::rollback();
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
    public static function showMaterial($id)
    {
        $data = Material::where('id',$id)->get();
        return MyHelper::checkGet($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public static function editMaterial($id)
    {
        $data = Material::where('id',$id)->get();
        return MyHelper::checkGet($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public static function updateMaterial($request, $id)
    {
        $material = Material::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'title'=>'string|required'
        ]);
        if($validator->fails()){
            $response=[
                'status'=>'fail',
                'result'=>$validator->messages()->all()
            ];
            return $response;
        }
        $material = Material::where('id',$id)->get();
        if($request['image']){
            if(!empty($material['material_image'])){
               Storage::delete($material['material_image']);
            }
           $image = $request->file('image');
           $name = time().'.'.$image->getClientOriginalExtension();
           $path = $request->image->storeAs(('public/material'), $name);
        }
        $post = $request->except('_token','image');
        if($request['image']){
            $post['material_image'] = $path;
        }
        DB::beginTransaction();
        try{
            $updateMaterial = Material::where('id',$id)->update($post);
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkUpdate($updateMaterial);
        }
        DB::commit();
        return MyHelper::checkUpdate($updateMaterial);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public static function destroyMaterial($id)
    {
        $material = Material::findOrFail($id);
        $path = $material['material_image'];
        DB::beginTransaction();
        try{
            $deteleMaterial = $material->delete();
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkDelete($deteleMaterial);
        }
        DB::commit();
        Storage::delete($path);
        return MyHelper::checkDelete($deteleMaterial);
    }

    // Task
    public static function getTask()
    {
        $data = Task::paginate(10);
        return MyHelper::checkGet($data);
    }
    
    public static function storeTask($request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'string|required'
        ]);
        if($validator->fails()){
            $response=[$validator->messages()];
            return $response;
        }
        DB::beginTransaction();
        try{
            $data = Task::create(array_filter($request->all()));
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkCreate($data);
        }
        DB::commit();
        return MyHelper::checkCreate($data);

    }

    public static function showTask($id)
    {
        $data = Task::where('id',$id)->with('task_fields.task_field_option')->get();
        // return $data;
        return MyHelper::checkGet($data);
    }

    public static function editTask($id)
    {
        $data = Task::where('id',$id)->get();
        return MyHelper::checkGet($data);
    }

    public static function updateTask($request, $id)
    {
        // $task = Task::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name'=>'string|required'
        ]);
        if($validator->fails()){
            $response=[
                'status'=>'fail',
                'result'=>$validator->messages()->all()
            ];
            return $response;
        }
        $post = $request->except('_token');
        
        DB::beginTransaction();
        try{
            $updateTask = Task::where('id',$id)->update($post);
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkUpdate($updateTask);
        }
        DB::commit();
        return MyHelper::checkUpdate($updateTask);
    }

    public static function destroyTask($id)
    {
        $task = Task::findOrFail($id);
        DB::beginTransaction();
        try{
            $deleteTask = $task->delete();
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkDelete($deleteTask);
        }
        DB::commit();
        Storage::delete($path);
        return MyHelper::checkDelete($deleteTask);
    }

}
