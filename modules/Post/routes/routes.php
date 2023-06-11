<?php
use Illuminate\Support\Facades\Route;
 Route::group(['namespace'=>'Modules\Post\src\Http\Controllers','middleware'=>'web'], function (){
    Route::prefix('/admin')->name('admin.')->group(function(){
        Route::prefix('/posts')->name('posts.')->group(function(){
            Route::get('/','PostController@index')->name('index');
            Route::get('data','PostController@data')->name('data');
            Route::get('create','PostController@create')->name('create');
            Route::post('create','PostController@store')->name('store');
            Route::get('edit/{post}','PostController@edit')->name('edit');
            Route::put('edit/{post}','PostController@update')->name('update');
            Route::delete('delete/{post}','PostController@delete')->name('delete');
        });
    });
});

Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
