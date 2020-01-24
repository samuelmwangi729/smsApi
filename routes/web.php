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

Route::get('/','GenerateController@generate');
Route::get('/login','GenerateController@generate');
Route::get('/register','GenerateController@generate');
Auth::routes();
Route::get('/Api/GetPhone/user={user}&time={time}&phone={phone}',[
    'uses'=>'PhoneController@index',
    'as'=>'phone.get'
]);

Route::get('/home', 'HomeController@index')->name('home');
