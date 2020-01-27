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
Route::get('/Api/GetPhone/user={user}&time={time}&sign={sign}&phone={phone}',[
    'uses'=>'PhoneController@index',
    'as'=>'phone.get'
]);
ROute::get('/help',function(){
    $data=['to get the real output, use the real user in the database with the emain samples@sample.com, to get the response when the number is present,make sure that
    you have used the username samples@sample.com and then search for any number displayed in the homepage. I have generated the correct sign, to see what happens if the sign
    is wrong, change the value of the sigh to the one of your choice.Thanks'];
    return response()->json($data);
});

Route::get('/home', 'HomeController@index')->name('home');
