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
use App\Models\TaskFieldOption;
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
        $data = Task::where('id',$id)->with('task_fields.task_field_options')->get();
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

    public static function storeQuestion($request,$id){
        if($request['field_type']=='short answer'||$request['field_type']=='file upload'){
            $storeField = [
                'id_task'=>$id,
                'field_question'=>$request['field_question'],
                'field_type'=>$request['field_type'],
                'point'=>$request['point']
            ];
            DB::beginTransaction();
            try{
                $data1 = TaskField::create($storeField);
            }catch(\Exception $e){
                return $e;
                return MyHelper::checkCreate($data1);
            }
            $storeFieldOption = [
                'id_task_field'=>$data1['id'],
                'option_value'=>$request['option_value'],
                'option_text'=>$request['option_text']
            ];
            try{
                $data2 = TaskFieldOption::create($storeFieldOption);
            }catch(\Exception $e){
                DB::rollback();
                return $e;
                return MyHelper::checkCreate($data2);
            };
            DB::commit();
            return MyHelper::checkCreate($data2);
        }else if($request['field_type']=='multiple'){
            $storeField = [
                'id_task'=>$id,
                'field_question'=>$request['field_question'],
                'field_type'=>$request['field_type'],
                'point'=>$request['point']
            ];
            
            DB::beginTransaction();
            try{
                $data1 = TaskField::create($storeField);
            }catch(\Exception $e){
                DB::rollback();
                return $e;
                return MyHelper::checkCreate($data1);
            }

            $fields = $request->except('_token','field_question','field_type','point');
            for($i=1;$i<5;$i++){
                $storeFieldOption = [
                    'id_task_field'=>$data1['id'],
                    'option_value'=>$fields['option_value_'.$i],
                    'option_text'=>$request['option_text_'.$i]
                ];

                try{
                    $data2 = TaskFieldOption::create($storeFieldOption);
                }catch(\Exception $e){
                    return $e;
                    return MyHelper::checkCreate($data2);
                }
            }
            DB::commit();
            return MyHelper::checkCreate($data2);
        }
    }

    public static function editQuestion($field){
        // $data = TaskField::where('id',$field)->with('task_field_options')->get();
        $data = Task::where('id',$field)->with('task_fields.task_field_options')->get();   
        return MyHelper::checkGet($data);
    }

    public static function UpdateQuestion($request,$task,$option){
        if($request['field_type']=='short answer'||$request['field_type']=='file upload'){
            $storeField = [
                'field_question'=>$request['field_question'],
                'field_type'=>$request['field_type'],
                'point'=>$request['point']
            ];
            DB::beginTransaction();
            try{
                $data1 = TaskField::where('id',$option)->update($storeField);
            }catch(\Exception $e){
                return $e;
                return MyHelper::checkUpdate($data1);
            }
            $storeFieldOption = [
                'option_value'=>$request['option_value'],
                'option_text'=>$request['option_text']
            ];
            try{
                $data2 = TaskFieldOption::where('id_task_field',$option)->update($storeFieldOption);
            }catch(\Exception $e){
                DB::rollback();
                return $e;
                return MyHelper::checkUpdate($data2);
            };
            DB::commit();
            return MyHelper::checkUpdate($data1);
        }else if($request['field_type']=='multiple'){
            $storeField = [
                'field_question'=>$request['field_question'],
                'field_type'=>$request['field_type'],
                'point'=>$request['point']
            ];
            
            DB::beginTransaction();
            try{
                $data1 = TaskField::where('id',$option)->update($storeField);
            }catch(\Exception $e){
                DB::rollback();
                return $e;
                return MyHelper::checkCreate($data1);
            }
            $fields = $request->except('_token','field_question','field_type','point');
            $field_option = TaskFieldOption::where('id_task_field',$option)->get();
            for($i=1;$i<count($field_option);$i++){
                $storeFieldOption = [
                    'option_value'=>$fields['option_value_'.$i],
                    'option_text'=>$request['option_text_'.$i]
                ];

                try{
                    $data2 = TaskFieldOption::where('id',$field_option[$i-1]['id'])->update($storeFieldOption);
                }catch(\Exception $e){
                    return $e;
                    return MyHelper::checkCreate($data2);
                }
            }
            DB::commit();
            return MyHelper::checkUpdate($data2);
        }
    }

    public static function destroyQuestion($id){
        DB::beginTransaction(); 
        try{
            $field = TaskField::where('id',$id)->with('task_field_options')->delete();
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkDelete($field);
        }
        DB::commit();
        return MyHelper::checkDelete($field);

    }

}
