<?php

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

use Modules\Classes\Http\Controllers\ClassesController;

Route::prefix('class')->group(function() {
    Route::middleware(['is_admin','auth'])->group(function(){
        Route::get('/', 'ClassesController@index');
        Route::get('/create', 'ClassesController@create');
        Route::post('/store', 'ClassesController@store');
        Route::get('/detail/{id}', 'ClassesController@show');
        Route::get('/edit/{id}', 'ClassesController@edit');
        Route::post('/update/{id}', 'ClassesController@update');
        Route::get('/delete/{id}', 'ClassesController@destroy');
        Route::get('/add/module/{id}', 'ClassesController@addModule');
        Route::post('/store/module/{id}', 'ClassesController@storeModule');
        Route::get('/delete/module/{id}', 'ClassesController@destroyModule');
    });
});
Route::get('/','ClassesController@homePage')->name('homepage');
Route::prefix('app')->group(function(){
    Route::get('/detail/class/{id}','ClassesController@classDetail');
    Route::get('/class/material/{id}','ClassesController@checkStep');
    Route::get('/class/material/{class}/tutorials/{tutorial}','ClassesController@classMaterial');
    Route::get('/list','ClassesController@classFe')->name('list');
    Route::get('/path/class/list/{id}','ClassesController@pathClassList');
    Route::middleware(['student','auth'])->group(function(){
        Route::post('/class/enroll','ClassesController@classEnroll');
        Route::post('/enroll/check','ClassesController@checkEnrollment');
        Route::post('/check/status','ClassesController@checkStatus');
        Route::post('/check/task/{id}','ClassesController@checkTask');
        Route::get('/homepage','ClassesController@homePage')->name('homepage');
    });
});
