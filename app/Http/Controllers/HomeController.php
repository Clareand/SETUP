<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Library\MyHelper;
use App\Models\LearningPath;
use App\Models\TechField;
use DB;
use Validator;
use Auth;

class HomeController extends Controller
{
   
    public function index()
    {
        return view('baseAdmin.main');
    }
    public function student()
    {
        return view('studentHome');
    }

    public static function getProvince(){
        $data = Province::all();
        return MyHelper::checkGet($data);
    }

    public static function getCity(Request $request){
        $data = Regency::where('province_id',$request->id_province)->get();
        return MyHelper::checkGet($data);
    }

    public static function getCities($request){
        $data = Regency::where('province_id',$request)->get();
        return MyHelper::checkGet($data);
    }

    public static function getLearningPaths(){
        $data = LearningPath::all();
        return MyHelper::checkGet($data);
    }
    public static function getLearningPath(Request $request){
        $data = LearningPath::where('id_field_of_tech',$request->id_field_of_tech)->get();
        return MyHelper::checkGet($data);
    }
    public static function getPaths($request){
        $data = LearningPath::where('id_field_of_tech',$request)->get();
        return MyHelper::checkGet($data);
    }

    public static function getAllTech(){
        $data=TechField::all();
        return MyHelper::checkGet($data);
    }
}
