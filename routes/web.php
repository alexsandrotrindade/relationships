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
Route::get('one-to-many','OneToManyController@oneToMany');
Route::get('many-to-one','OneToManyController@manyToOne');
Route::get('one-to-many-two','OneToManyController@oneToManyTwo');
Route::get('one-to-many-insert','OneToManyController@oneToManyInsert');
Route::get('one-to-many-insert-two','OneToManyController@oneToManyInsertTwo');
Route::get('test','OneToManyController@test');

/**
 * HAS MANY THROUGH
 */
Route::get('has-many-through', 'OneToManyController@hasManyThrough');


Route::get('/', function () {
    return view('welcome');
});
