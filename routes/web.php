<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

Route::group(['prefix' => 'home', 'middleware' => 'isAdmin'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('{id}/personal', 'HomeController@personalAccount')->name('personalAccount');
    Route::get('{id}/investor', 'HomeController@investorAccount')->name('investorAccount');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('users', 'AdminController@main')->name('users');
    Route::get('user/{id}/personal', 'AdminController@userPersonal')->name('userPersonal');
    Route::get('user/{id}/investor', 'AdminController@userInvestor')->name('userInvestor');
    Route::get('users/accounts', 'AdminController@accounts')->name('accounts');
    Route::get('user/{id}', 'AdminController@user')->name('user');
    Route::get('userSearch', 'AdminController@userSearch');
    Route::get('accountSearch', 'AdminController@accountSearch');

});