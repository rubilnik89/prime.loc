<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('isAdmin');

Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');
//Route::post('searchName', 'UserController@searchName');
//Route::post('searchSurame', 'UserController@searchSurame');
//Route::post('searchPhone', 'UserController@searchPhone');
//Route::post('searchCountry', 'UserController@searchCountry');
//Route::post('searchEmail', 'UserController@searchEmail');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'AdminController@main');
    Route::get('user/{id}', 'AdminController@user');
    Route::post('search', 'AdminController@search');
});