<?php

namespace Modules\MasterData\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Library\MyHelper;
use App\Models\TechField;
use App\Models\Badge;
use App\Models\ClassList;
use DB;
use Validator;
use Auth;
use Hash;

class MasterDataBEController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    // tech_field
    public static function getAllTech()
    {
        $data = TechField::all();
        return MyHelper::checkGet($data);
    }

    public static function getTech()
    {
        $data = TechField::paginate(10);
        return MyHelper::checkGet($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public static function storeTech($request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'string'
        ]);
        if($validator->fails()){
            $response=[$validator->messages()];
            return $response;
        }

        DB::beginTransaction();
        try{
            $data=TechField::create(array_filter($request->all()));
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
    public static function showTech($id)
    {
        $data = TechField::where('id',$id)->get();
        return MyHelper::checkGet($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public static function editTech($id)
    {
        $data = TechField::where('id',$id)->get();
        return MyHelper::checkGet($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public static function updateTech($request, $id)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'string'
        ]);
        if($validator->fails()){
            $response=[$validator->messages()];
            return $response;
        }

        $post = $request->except('_token');
        DB::beginTransaction();
        try{
            $updateTech = TechField::where('id',$id)->update($post);
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkUpdate($updateTech);
        }
        DB::commit();
        return MyHelper::checkUpdate($updateTech);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public static function destroyTech($id)
    {
        $tech = TechField::findOrFail($id);
        DB::beginTransaction();
        try{
            $deleteTech=$tech->delete();
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return MyHelper::checkDelete($deleteTech);
        }
        DB::commit();
        return MyHelper::checkDelete($deleteTech);
    }

    // Badges
     public static function getAllBadge()
     {
         $data = Badge::paginate(10);
         return MyHelper::checkGet($data);
     }
 
     /**
      * Store a newly created resource in storage.
      * @param Request $request
      * @return Renderable
      */
     public static function storeBadge($request)
     {
         $validator=Validator::make($request->all(),[
             'name'=>'string',
             'point'=>'integer',
         ]);
         if($validator->fails()){
             $response=[$validator->messages()];
             return $response;
         }
 
         DB::beginTransaction();
         try{
             $data=Badge::create(array_filter($request->all()));
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
     public static function showBadge($id)
     {
         $data = Badge::where('id',$id)->get();
         return MyHelper::checkGet($data);
     }
 
     /**
      * Show the form for editing the specified resource.
      * @param int $id
      * @return Renderable
      */
     public static function editBadge($id)
     {
         $data = Badge::where('id',$id)->get();
         return MyHelper::checkGet($data);
     }
 
     /**
      * Update the specified resource in storage.
      * @param Request $request
      * @param int $id
      * @return Renderable
      */
     public static function updateBadge($request, $id)
     {
         $validator=Validator::make($request->all(),[
             'name'=>'string',
             'point'=>'integer'
         ]);
         if($validator->fails()){
             $response=[$validator->messages()];
             return $response;
         }
 
         $post = $request->except('_token');
         DB::beginTransaction();
         try{
             $updateTech = Badge::where('id',$id)->update($post);
         }catch(\Exception $e){
             DB::rollback();
             return $e;
             return MyHelper::checkUpdate($updateTech);
         }
         DB::commit();
         return MyHelper::checkUpdate($updateTech);
     }
 
     /**
      * Remove the specified resource from storage.
      * @param int $id
      * @return Renderable
      */
     public static function destroyBadge($id)
     {
         $tech = Badge::findOrFail($id);
         DB::beginTransaction();
         try{
             $deleteBadge=$tech->delete();
         }catch(\Exception $e){
             DB::rollback();
             return $e;
             return MyHelper::checkDelete($deleteBadge);
         }
         DB::commit();
         return MyHelper::checkDelete($deleteBadge);
     }
}
