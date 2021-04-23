<?php

namespace Modules\TaskMaterial\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\TaskMaterial\Http\Controllers\TaskMaterialBEController;
class TaskMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getMaterial()
    {
        $data = TaskMaterialBEController::getMaterial();
        return view('taskmaterial::material.index',$data['result']);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function createMaterial()
    {
        return view('taskmaterial::material.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeMaterial(Request $request)
    {
        $data = TaskMaterialBEController::storeMaterial($request);
        if($data['status']=='success'){
            return redirect('material')->withSuccess(['Material has ben created']);
        }
        return back()->withError($data['result']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function showMaterial($id)
    {
        $data = TaskMaterialBEController::showMaterial($id);
        // return $data;
        return view('taskmaterial::material.detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editMaterial($id)
    {
        $data = TaskMaterialBEController::editMaterial($id);
        return view('taskmaterial::material.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function updateMaterial(Request $request, $id)
    {
        $data = TaskMaterialBEController::updateMaterial($request,$id);
        // return $data;
        if($data['status']=='success'){
            return redirect('material/detail/'.$id)->withSuccess(['Material has been updated']);
        }
        return back()->withError($data['result'])->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroyMaterial($id)
    {
        $data = TaskMaterialBEController::destroyMaterial($id);
        if($data['status']=='success'){
            return redirect('material')->withSuccess(['Material hass been deleted']);
        }
        return back()->withError($data['result']);
    }
}
