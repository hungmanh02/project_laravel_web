<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Auth\src\Http\Controllers\Admin\LoginController;

// Auth::routes();

Route::group(['namespace'=>'Modules\Auth\src\Http\Controllers\Admin','middleware'=>'web'], function (){

    Route::get('/login',"LoginController@showLoginForm")->name('login');
    Route::post('/login',"LoginController@login")->name('login');

});
