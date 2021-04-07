<?php

namespace Modules\Student\Http\Controllers;

use App\Http\Controllers\HomeController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Controllers\AdminBEController;
use Modules\Student\Http\Controllers\StudentBEController;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = StudentBEController::index();
        return view('student::layouts.index',$data['result']);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('student::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $student=StudentBEController::show($id);
        if($student['status']=='success'){
            $data=[
                'user'=>$student['result'],
                'province'=>HomeController::getProvince(),
            ];
            return view('student::layouts.detail',$data);
        };
        return back()->withErrors(['Sorry,Not Found']);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $student=StudentBEController::show($id);
        if($student['status']=='success'){
            if($student['result'][0]['province']){
                $data=[
                    'user'=>$student['result'],
                    'province'=>HomeController::getProvince(),
                    'city'=>HomeController::getCities($student['result'][0]['regency']['province_id'])
                ];
            }else{
                $data=[
                    'user'=>$student['result'],
                    'province'=>HomeController::getProvince(),
                ];
            }
           
            return view('student::layouts.edit',$data);
        };
        return back()->withErrors(['Sorry,Not Found']);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = StudentBEController::update($request,$id);
        if($data['status']=='success'){
            return redirect('student')->withSuccess(['Data has been updated']);
        }
        return back()->withErrors($data['result'])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
       $data=StudentBEController::destroy($id);
       if($data['status']=='success'){
           return redirect('student')->withSuccess(['Data has been deleted']);
       }
       return back()->withErrors($data['result']);
    }
}
