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
        return view('student::layouts.index',$data);
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
            // if($student['result'][0]['province']){
            if($student['result'][0]['city']){
                // return'y';
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
        //    return $data;
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
        return back()->withError($data['result'])->withInput();
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

    public function review(){
        $data = StudentBEController::review();
        return $data;
        return view('student::review.index',$data);
    }

    public function reviewDetail($id){
        $data = StudentBEController::reviewDetail($id);
        // return $data;
        return view('student::review.detail',$data);
    }

    public function reviewEdit($id){
        $data = StudentBEController::reviewEdit($id);
        return view('student::review.edit',$data);
    }

    public function reviewUpdate(Request $request,$id){
        $data = StudentBEController::reviewUpdate($request,$id);
        // return $data;
        if($data['status']=='success'){
            return redirect('student/review/detail/'.$id)->withSuccess(['Succesfuly Updated']);
        }
        return back()->withError($data['result']);
    }
    // front
    public function studentProfile($id){
        $student= StudentBEController::studentProfile($id);
        // return $student;
        if($student['result'][0]['city']){
            $data=[
                'result'=>$student['result'],
                'province'=>HomeController::getProvince(),
                'city'=>HomeController::getCities($student['result'][0]['regency']['province_id'])
            ];
        }else{
            $data=[
                'result'=>$student['result'],
                'province'=>HomeController::getProvince(),
            ];
        }
        // return $data;
        return view('student::fronts.profile',$data);
    }

    public function updateProfileStudent(Request $request,$id){
        $data = StudentBEController::update($request,$id);
       if($data['status']=='success'){
           return back()->withSuccess(['Succesfuly Updated']);
       }
       return back()->withError($data['result'])->withInput();
    }

    public function classHistory(){
        $data = StudentBEController::classHistory();
        // return $data['result']['path'];
        if($data['status']=='success'){
            return view('student::fronts.classHistory',$data['result']);
        }
    }

    public function leaderboard(){
        $data = StudentBEController::leaderboard();
        // return $data;
        return view('student::fronts.leaderboard',$data['result']);
    }
}
