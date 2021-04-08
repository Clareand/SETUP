<?php

namespace App\Library;

use Dotenv\Result\Success;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class MyHelper{
    public static function checkGet($data){
        if($data && !empty($data) && count($data)>0){
            return ['status'=>'success','result'=>$data];
        }else if(empty($data)||count($data)==0){
            return ['status'=>'fail','result'=>['Data Not Found']];
        }else{
            return ['status'=>'fail','result'=>['Failed to Show']];
        }
    }

    public static function checkUpdate($data){
        if($data) return ['status'=>'success', 'result'=>$data];
        else return ['status'=>'fail','result'=>['Failed to Update']];
    }

    public static function checkDelete($data){
        if($data) return ['status'=>'success','result'=>$data];
        else return ['status'=>'fail','result'=>'something went wrong'];
    }

    public static function checkCreate($data){
        if($data) return ['status'=>'success','result'=>$data];
        else return ['status'=>'fail','result'=>$data];
    }
}