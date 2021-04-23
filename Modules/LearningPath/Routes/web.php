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

Route::prefix('learningPath')->group(function() {
    Route::group(['middleware'=>['auth','is_admin']],function(){
        Route::get('/', 'LearningPathController@index');
        Route::get('/create', 'LearningPathController@create');
        Route::post('/store', 'LearningPathController@store');
        Route::get('/edit/{id}', 'LearningPathController@edit');
        Route::get('/detail/{id}', 'LearningPathController@show');
        Route::post('/update/{id}', 'LearningPathController@update');
        Route::get('/delete/{id}', 'LearningPathController@destroy');
        Route::get('/add/class/{id}', 'LearningPathController@addClassPath');
        Route::post('/store/class/{id}', 'LearningPathController@storeClassPath');
        Route::get('/delete/class/{id}', 'LearningPathController@deleteClassPath');
    });
});
