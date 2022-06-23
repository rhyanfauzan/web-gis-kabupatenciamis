<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Frontpage')->group(function () {
    Route::name('frontpage.')->group(function () {
        Route::name('login.')->group(function () {
            Route::get('/', "LoginController@index")->name('index');
            Route::post('/login/do', "LoginController@doLogin")->name('do');
        });

    });
});
