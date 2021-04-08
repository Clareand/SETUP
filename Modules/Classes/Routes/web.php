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

Route::prefix('class')->group(function() {
    Route::middleware(['is_admin'])->group(function(){
        Route::get('/', 'ClassesController@index');
        Route::get('/create', 'ClassesController@create');
        Route::post('/store', 'ClassesController@store');
        Route::get('/detail/{id}', 'ClassesController@show');
        Route::get('/edit/{id}', 'ClassesController@edit');
        Route::post('/update/{id}', 'ClassesController@update');
        Route::get('/delete/{id}', 'ClassesController@destroy');
    });
});
