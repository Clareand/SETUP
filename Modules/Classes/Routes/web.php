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
    Route::middleware(['is_admin'])->group(function(){
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

Route::prefix('app')->group(function(){
    Route::middleware(['student'])->group(function(){
        Route::get('/list','ClassesController@classFe')->name('list');
        Route::post('/enroll','ClassesController@classEnroll');
        Route::get('/homepage','ClassesController@homePage')->name('homepage');
        Route::get('/path/class/list/{id}','ClassesController@pathClassList');
        Route::get('/detail/class/{id}','ClassesController@classDetail');
    });
});
