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
Route::get('/time',"homeController@scedual");
Route::get('/store', 'homeController@store');

Auth::routes();

Route::get('/home', 'homeController@index')->name('home');
Route::get('/show/{id}','homeController@show');
Route::post('/update','homeController@update');
Route::post('/delete','homeController@delete');
//Route::any('/getDataUsingAjax', 'homeController@getDataUsingAjax')->name('home');

//Route::get('/delete/{name}', 'homeController@delete');
//Route::get('/deleteTable', 'homeController@deleteTable');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
