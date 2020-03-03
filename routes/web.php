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

/**
 * ONE TO ONE
 */

Route::get('one-to-one','OneToOneController@oneToOne');
Route::get('one-to-one-inverse','OneToOneController@oneToOneInverse');
Route::get('one-to-one-insert','OneToOneController@oneToOneInsert');

/**
 * ONE TO MANY
 */

 
Route::get('/', function () {
    return view('welcome');
});
