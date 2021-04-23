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
