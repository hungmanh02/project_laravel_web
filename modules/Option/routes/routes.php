<?php
use Illuminate\Support\Facades\Route;
 Route::group(['namespace'=>'Modules\Option\src\Http\Controllers','middleware'=>'web'], function (){
    Route::prefix('/admin')->name('admin.')->group(function(){
        Route::prefix('/options')->name('options.')->group(function(){
            Route::get('/','OptionController@index')->name('index');
            Route::get('data','OptionController@data')->name('data');
            Route::get('create','OptionController@create')->name('create');
            Route::post('create','OptionController@store')->name('store');
            Route::get('edit/{option}','OptionController@edit')->name('edit');
            Route::put('edit/{option}','OptionController@update')->name('update');
            Route::delete('delete/{option}','OptionController@delete')->name('delete');
        });
    });
});
