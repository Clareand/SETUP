<?php

namespace Modules\Classes\Http\Controllers;

use App\Http\Controllers\HomeController;
use App\Models\ClassList;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Controllers\AdminBEController;
use Modules\Classes\Http\Controllers\ClassesBEController;
use Session;
use Auth;
use Modules\MasterData\Http\Controllers\MasterDataController;

class ClassesController extends Controller
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
        $data = ClassesBEController::index();
        return view('classes::layouts.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data = MasterDataController::getAllTech();
        // return $data;
        return view('classes::layouts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = ClassesBEController::store($request);
        if($data['status']=='success'){
            return redirect('class')->withSuccess(['Class has been created']);
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
        $data = ClassesBEController::show($id);
        // return $data;
        return view('classes::layouts.detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $class = ClassesBEController::edit($id);
        $tech =MasterDataController::getAllTech();
        $path = HomeController::getPaths($class['result'][0]['field_of_tech']);
        if($class['status']=='success'){
            $data=[
                'class'=>$class['result'],
                'tech'=>$tech['result'],
                'path'=>$path['result']
            ];
        }
        // return $data;
        return view('classes::layouts.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = ClassesBEController::update($request,$id);
        if($data['status']=='success'){
            return redirect('class')->withSuccess(['Class has been updated']);
        };
        return back()->withError($data['result'])->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data = ClassesBEController::destroy($id);
        if($data['status']=='success'){
            return redirect('class')->withSuccess(['Class hass been deleted']);
        }
        return back()->withError($data['result']);
    }

    // FE

    public function classFe(){
        $data = ClassesBEController::index();
        // return $data;
        if($data['status']=='success'){
            return view('classes::fronts.index',$data['result']);
        }
    }

    public function classEnroll(Request $request){
        $data = ClassesBEController::classEnroll($request);
        // return $data;
        if($data['status']=='success'){
            return redirect('class/list')->withSuccess(['Enrollment Success']);
        }
        return back()->withError($data['result']);
    }

    public function homePage(){
        $data = ClassesBEController::getPath();
        // return $data;
        if($data['status']=='success'){
            return view('classes::fronts.homePage',$data);
        }
    }
}
