<?php

use Illuminate\Support\Facades\Route;



Route::group(['namespace'=>'Modules\User\src\Http\Controllers','middleware'=>'web'], function (){
    Route::prefix('/admin')->name('admin.')->group(function(){
        Route::prefix('/users')->name('users.')->group(function(){
            Route::get('/','UsersController@index')->name('index');
            Route::get('data','UsersController@data')->name('data');
            Route::get('create','UsersController@create')->name('create');
            Route::post('create','UsersController@store')->name('store');
            Route::get('edit/{user}','UsersController@edit')->name('edit');
            Route::put('edit/{user}','UsersController@update')->name('update');
            Route::delete('delete/{user}','UsersController@delete')->name('delete');
        });
    });
});
