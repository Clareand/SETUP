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

Route::prefix('student')->group(function() {
    Route::middleware(['is_admin'])->group(function(){
        Route::get('/', 'StudentController@index');
        Route::get('/detail/{id}', 'StudentController@show');
        Route::get('/edit/{id}', 'StudentController@edit');
        Route::post('/update/{id}', 'StudentController@update');
        Route::get('/delete/{id}', 'StudentController@destroy');
        Route::get('/review/detail/{id}', 'StudentController@reviewDetail');
        Route::get('/review/edit/{id}', 'StudentController@reviewEdit');
        Route::post('/review/update/{id}', 'StudentController@reviewUpdate');
        Route::get('/review', 'StudentController@review');
    });
});

Route::prefix('app')->group(function(){
    Route::middleware(['student'])->group(function(){
        Route::get('/profile/{id}','StudentController@studentProfile');
        Route::post('/profile/update/{id}','StudentController@updateProfileStudent');
        Route::get('/class/history','StudentController@classHistory');
        Route::get('/leaderboard','StudentController@leaderboard');
    });
});
