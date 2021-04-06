<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\HomeController;
use Dotenv\Result\Success;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Controllers\AdminBEController;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        return view('admin::layouts.dashboard');
    }
    public function index()
    {
        $data = AdminBEController::getUserAll();
        // return $data;
        if($data['status']=='success'){
            return view('admin::layouts.index',$data['result']);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $city=HomeController::getProvince();
        $data['province']=$city['result'];
        return view('admin::layouts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // $data = AdminBEController::store($request);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $admin = AdminBEController::edit($id);
        if($admin['status']=='success'){
            // return $admin['result'][0]['regency'];
            $data =[
                'user'=>$admin['result']
            ];
            // return $data;
            return view('admin::layouts.detail',$data);
        };
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $admin = AdminBEController::edit($id);
        if($admin['status']=='success'){
            // return $admin['result'][0]['regency'];
            $data =[
                'user'=>$admin['result'],
                'province'=>HomeController::getProvince(),
                'city'=>HomeController::getCities($admin['result'][0]['regency']['province_id'])
            ];
            // return $data;
            return view('admin::layouts.edit',$data);
        };
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = AdminBEController::update($request,$id);
        if($data['status']=='success'){
            return redirect('admin/list')->withSuccess(['Admin has been Updated']);
        }else{
            return back()->withErrors($data['result'])->withInput();
        };
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        // return $id;
        $data = AdminBEController::destroy($id);
        // return $data;
        if($data['status']=='success'){
            return redirect('admin/list')->withSuccess(['Admin has been deleted']);
        }else{
            return back()->withErrors($data['result']);
        }
    }

    public function notifTest($test){
        if($test==1){
            Session::flash('errors',['eror']);
        }else if($test==2){
            Session::flash('success',['ok']);
        }else{
            Session::flash('warning',['warn']);
        }
        // return view('admin::layouts.dashboard');
    }
}
