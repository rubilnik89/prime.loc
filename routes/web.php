<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

Route::group(['prefix' => 'home', 'middleware' => 'isAdmin'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('{id}/edit', 'HomeController@edit')->name('edit');
    Route::get('{id}/accounts', 'HomeController@accounts')->name('userAccounts');
    Route::get('{id}/personal', 'HomeController@personal')->name('userPersonal');
    Route::get('{id}/investor', 'HomeController@investor')->name('userInvestor');
//    Route::get('{id}/moneyTransfer', 'HomeController@moneyTransfer')->name('moneyTransfer');
//    Route::post('{id}/transfer', 'HomeController@transfer')->name('transfer');
    Route::get('{id}/transactions', 'HomeController@transactions')->name('transactions');
    Route::get('{id}/transactions/{number}', 'HomeController@accountTransactions')->name('accountTransactions');
    Route::get('{id}/addAccount', 'HomeController@addAccount')->name('addAccount');

});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('logs', 'LogController@all')->name('logs');
    Route::get('users', 'AdminController@main')->name('users');
    Route::get('user/{id}/accounts', 'AdminController@userAccounts')->name('userAccountsAdmin');
    Route::get('user/{id}/transactions/{number}', 'AdminController@userAccountTransactions')->name('userAccountTransactions');
    Route::get('users/accounts', 'AdminController@accounts')->name('accounts');
    Route::get('user/{id}', 'AdminController@user')->name('user');
    Route::get('addTarif', 'TarifController@addTarif')->name('addTarif');
    Route::get('editTarif/{id}', 'TarifController@editTarif')->name('editTarif');

});

Route::get('tarifs', 'TarifController@all')->name('tarifs');
