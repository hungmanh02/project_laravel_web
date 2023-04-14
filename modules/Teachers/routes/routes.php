<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'Modules\Teachers\src\Http\Controllers','middleware'=>'web'], function (){
    Route::prefix('/admin')->name('admin.')->group(function(){
        Route::prefix('/teachers')->name('teachers.')->group(function(){
            Route::get('/','TeachersController@index')->name('index');
            Route::get('data','TeachersController@data')->name('data');
            Route::get('create','TeachersController@create')->name('create');
            Route::post('create','TeachersController@store')->name('store');
            Route::get('edit/{teacher}','TeachersController@edit')->name('edit');
            Route::put('edit/{teacher}','TeachersController@update')->name('update');
            Route::delete('delete/{teacher}','TeachersController@delete')->name('delete');
        });
    });
});

Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
