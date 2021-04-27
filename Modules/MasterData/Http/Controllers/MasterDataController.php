<?php

namespace Modules\MasterData\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Library\MyHelper;
use App\Models\TechField;
use App\Models\Badge;
use DB;
use Validator;
use Auth;

class MasterDataController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Tech
    public static function getAllTech()
    {
        $data =MasterDataBEController::getAllTech();
        return $data;
    }

    public function getTech(){
        $data = MasterDataBEController::getTech();
        return view('masterdata::tech.index',$data);
    }
    

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function createTech()
    {
        return view('masterdata::tech.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeTech(Request $request)
    {
        $data = MasterDataBEController::storeTech($request);
        if($data['status']=='success'){
            return redirect('tech')->withSuccess(['Tech field has been created']);
        }
        return back()->withError($data['result']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function showTech($id)
    {
        $data = MasterDataBEController::showTech($id);
        if($data['status']=='success'){
            return view('masterdata::tech.detail',$data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editTech($id)
    {
        $data = MasterDataBEController::editTech($id);
        return view('masterdata::tech.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function updateTech(Request $request, $id)
    {
        $data = MasterDataBEController::updateTech($request,$id);
        if($data['status']=='success'){
            return redirect('tech')->withSuccess(['Tech field has been updated']);
        }
        return back()->withError($data['result'])->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroyTech($id)
    {
        $data = MasterDataBEController::destroyTech($id);
        if($data['status']=='success'){
            return redirect('tech')->withSuccess(['Tech Field has been deleted']);
        }
        return back()->withError($data['result']);
    }


    // badges

    public static function getAllBadge(){
        $data = MasterDataBEController::getAllBadge();
        return view('masterdata::badge.index',$data);
    }
    public static function getBadge(){
        $data = MasterDataBEController::getAllBadge();
        return $data;
    }
    

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function createBadge()
    {
        return view('masterdata::badge.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeBadge(Request $request)
    {
        $data = MasterDataBEController::storeBadge($request);
        if($data['status']=='success'){
            return redirect('badge')->withSuccess(['Badge field has been created']);
        }
        return back()->withError($data['result']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function showBadge($id)
    {
        $data = MasterDataBEController::showBadge($id);
        if($data['status']=='success'){
            return view('masterdata::badge.detail',$data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editBadge($id)
    {
        $data = MasterDataBEController::editBadge($id);
        return view('masterdata::badge.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function updateBadge(Request $request, $id)
    {
        $data = MasterDataBEController::updateBadge($request,$id);
        // return $data;
        if($data['status']=='success'){
            return redirect('badge')->withSuccess(['Badge field has been updated']);
        }
        return back()->withError($data['result'])->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroyBadge($id)
    {
        $data = MasterDataBEController::destroyBadge($id);
        if($data['status']=='success'){
            return redirect('badge')->withSuccess(['Badge Field has been deleted']);
        }
        return back()->withError($data['result']);
    }

}
