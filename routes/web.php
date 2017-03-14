<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

Route::group(['prefix' => 'home', 'middleware' => 'isAdmin'], function(){
    Route::get('/', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'AdminController@main')->name('admin');
    Route::get('user/{id}/personal', 'AdminController@userPersonal')->name('userPersonal');
    Route::get('user/{id}/invest', 'AdminController@userInvestor')->name('userInvestor');
    Route::get('user/{id}', 'AdminController@user')->name('user');
    Route::get('search', 'AdminController@search');
});