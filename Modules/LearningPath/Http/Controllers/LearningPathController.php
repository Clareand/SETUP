<?php

namespace Modules\LearningPath\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\LearningPath\Http\Controllers\LearningPathBEController;
use Modules\MasterData\Http\Controllers\MasterDataController;

class LearningPathController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = LearningPathBEController::index();
        if($data['status']=='success'){
            return view('learningpath::admin.index',$data['result']);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $tech = MasterDataController::getAllTech();
        $badge = MasterDataController::getBadge();
        $data=[
            
            'tech'=>$tech['result'],
            'badge'=>$badge['result'],
        ];
        return view('learningpath::admin.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = LearningPathBEController::store($request);
        if($data['status']=='success'){
            return redirect('learningPath')->withSuccess(['New Path has been added']);
        }
        return back()->withError($data['result']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data = LearningPathBEController::show($id);
        // return $data;
        if($data['status']=='success'){
            return view('learningpath::admin.detail',$data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $tech = MasterDataController::getAllTech();
        $badge = MasterDataController::getBadge();
        $path = LearningPathBEController::edit($id);
        $data=[
            'tech'=>$tech['result'],
            'badge'=>$badge['result'],
            'path'=>$path['result']
        ];
        return view('learningpath::admin.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = LearningPathBEController::update($request,$id);
        if($data['status']=='success'){
            return redirect('learningPath')->withSuccess(['Path has been updated']);
        }
        return back()->withError($data['result'])->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data = LearningPathBEController::destroy($id);
        if($data['status']=='success'){
            return redirect('learningPath')->withSuccess(['Path has been deleted']);
        }
        return back()->withError($data['result']);
    }

    public function addClassPath($id){
        $data = LearningPathBEController::addClassPath($id);
        // return $data;
        if($data['status']=='success'){
            return view('learningpath::admin.addClass',$data['result']);
        }
        return back()->withError($data['result']);
    }

    public function storeClassPath(Request $request,$id){
        $data = LearningPathBEController::storeClassPath($request,$id);
        // return $data;
        if($data['status']=='success'){
            return back()->withSuccess(['Class has been added to path']);
        }
        return back()->withError($data['result']);
    }

    public function deleteClassPath($id){
        $data = LearningPathBEController::deleteClassPath($id);
        if($data['status']=='success'){
            return back()->withSuccess(['Class has been deleted from path']);
        }
        return back()->withError($data['result']);
    }
}
