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

Route::prefix('material')->group(function() {
    Route::middleware(['is_admin','auth'])->group(function(){
        Route::get('/', 'TaskMaterialController@getMaterial');
        Route::get('/create', 'TaskMaterialController@createMaterial');
        Route::post('/store', 'TaskMaterialController@storeMaterial');
        Route::get('/detail/{id}', 'TaskMaterialController@showMaterial');
        Route::get('/edit/{id}', 'TaskMaterialController@editMaterial');
        Route::post('/update/{id}', 'TaskMaterialController@updateMaterial');
        Route::get('/delete/{id}', 'TaskMaterialController@destroyMaterial');
    });
});

Route::prefix('task')->group(function() {
    Route::middleware(['is_admin','auth'])->group(function(){
        Route::get('/', 'TaskMaterialController@getTask');
        Route::get('/create', 'TaskMaterialController@createTask');
        Route::post('/store', 'TaskMaterialController@storeTask');
        Route::get('/detail/{id}', 'TaskMaterialController@showTask');
        Route::get('/edit/{id}', 'TaskMaterialController@editTask');
        Route::post('/update/{id}', 'TaskMaterialController@updateTask');
        Route::get('/delete/{id}', 'TaskMaterialController@destroyTask');
    });
});

Route::prefix('question')->group(function() {
    Route::middleware(['is_admin','auth'])->group(function(){
        Route::get('/create/{id}', 'TaskMaterialController@createQuestion');
        Route::post('/store/{id}', 'TaskMaterialController@storeQuestion');
        // Route::get('/detail/{id}', 'TaskMaterialController@showTask');
        Route::get('/edit/{task}/{field}', 'TaskMaterialController@editQuestion');
        Route::post('/update/{task}/{field}', 'TaskMaterialController@updateQuestion');
        Route::get('/delete/{id}', 'TaskMaterialController@destroyQuestion');
    });
});
