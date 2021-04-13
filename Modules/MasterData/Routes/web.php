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
// tech
Route::prefix('tech')->group(function() {
   Route::group(['middleware'=>'auth'],function(){
    Route::get('/', 'MasterDataController@getTech');
    Route::get('/create', 'MasterDataController@createTech');
    Route::post('/store', 'MasterDataController@storeTech');
    Route::get('/detail/{id}', 'MasterDataController@showTech');
    Route::get('/edit/{id}', 'MasterDataController@editTech');
    Route::post('/update/{id}', 'MasterDataController@updateTech');
    Route::get('/delete/{id}', 'MasterDataController@destroyTech');
   });
});

// badge
Route::prefix('badge')->group(function() {
    Route::group(['middleware'=>'auth'],function(){
     Route::get('/', 'MasterDataController@getAllBadge');
     Route::get('/create', 'MasterDataController@createBadge');
     Route::post('/store', 'MasterDataController@storeBadge');
     Route::get('/detail/{id}', 'MasterDataController@showBadge');
     Route::get('/edit/{id}', 'MasterDataController@editBadge');
     Route::post('/update/{id}', 'MasterDataController@updateBadge');
     Route::get('/delete/{id}', 'MasterDataController@destroyBadge');
    });
 });
