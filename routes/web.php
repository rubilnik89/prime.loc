<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', ['middleware' => 'isAdmin', function () {}]);
//Route::get('/home', 'HomeController@index');
Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');
Route::post('searchName', 'UserController@searchName');
Route::post('searchSurame', 'UserController@searchSurame');
Route::post('searchPhone', 'UserController@searchPhone');
Route::post('searchCountry', 'UserController@searchCountry');
Route::post('searchEmail', 'UserController@searchEmail');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'AdminController@main');
    Route::get('user/{$id}', 'AdminController@users');
});