<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
Route::post('city', 'HomeController@getCity');
Route::prefix('admin')->group(function(){
    Route::get('/','AuthController@showFormsignin')->name('signin'); //use for admin
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::get('pages', 'HomeController@student')->name('pages');

    Route::get('province', 'HomeController@getProvince');
});
Route::middleware(['is_admin'])->group(function(){
    Route::get('home', 'HomeController@index')->name('home');
});
