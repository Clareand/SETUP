<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Library\MyHelper;
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
}
