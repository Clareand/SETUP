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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AuthController@showFormsignin');
    Route::middleware(['is_admin'])->group(function(){
        Route::get('/', 'AdminController@dashboard')->name('dashboard');
        Route::get('/list', 'AdminController@index')->name('list');
        Route::get('/add', 'AdminController@create')->name('add'); 
        Route::get('/edit/{id}', 'AdminController@edit')->name('edit'); 
        Route::get('/detail/{id}', 'AdminController@show')->name('detail'); 
        Route::post('/store', 'AdminController@store'); 
        Route::post('/update/{id}', 'AdminController@update'); 
        Route::get('/delete/{id}', 'AdminController@destroy'); 
        Route::get('/alert/{id}', 'AdminController@notifTest'); 
    });
});
