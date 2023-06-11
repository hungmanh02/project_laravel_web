<?php
 use Illuminate\Support\Facades\Route;
 Route::group(['namespace'=>'Modules\CategoryPost\src\Http\Controllers','middleware'=>'web'], function (){
    Route::prefix('/admin')->name('admin.')->group(function(){
        Route::prefix('/category-posts')->name('category-posts.')->group(function(){
            Route::get('/','CategoryPostController@index')->name('index');
            Route::get('data','CategoryPostController@data')->name('data');
            Route::get('create','CategoryPostController@create')->name('create');
            Route::post('create','CategoryPostController@store')->name('store');
            Route::get('edit/{categoryPost}','CategoryPostController@edit')->name('edit');
            Route::put('edit/{categoryPost}','categoryPostController@update')->name('update');
            Route::delete('delete/{categoryPost}','CategoryPostController@delete')->name('delete');
        });
    });
});
