<?php
use Illuminate\Support\Facades\Route;
 Route::group(['namespace'=>'Modules\Group\src\Http\Controllers','middleware'=>'web'], function (){
    Route::prefix('/admin')->name('admin.')->group(function(){
        Route::prefix('/groups')->name('groups.')->group(function(){
            Route::get('/','GroupController@index')->name('index');
            Route::get('data','GroupController@data')->name('data');
            Route::get('create','GroupController@create')->name('create');
            Route::post('create','GroupController@store')->name('store');
            Route::get('permissions/{group}','GroupController@permissions')->name('permissions');
            Route::post('permissions/{group}','GroupController@postPermissions')->name('permissions');
            Route::get('edit/{group}','GroupController@edit')->name('edit');
            Route::put('edit/{group}','GroupController@update')->name('update');
            Route::delete('delete/{group}','GroupController@delete')->name('delete');
        });
    });
});
