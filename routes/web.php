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

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', 'MainController@index');

Route::get('/getStates/{id}', 'MainController@getStates');

Route::get('dynamic', 'Dynamic@index')->name('dynamic');
Route::post('dynamic/fetch', 'Dynamic@fetch')->name('dynamic.fetch');

Route::resource('works', 'WorkController');