<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
