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

/*
* One To One
*/

//OneToOne
Route::get('one-to-one' , 'OneToOneController@oneToOne');
//OneToOne
Route::get('one-to-one-inverse' , 'OneToOneController@oneToOneInverse');
//OneToOne
Route::get('one-to-one-insert' , 'OneToOneController@oneToOneInsert');

/*
* One To Many
*/

//OneToMany [ Um para muitos ] 1 p N 
Route::get('one-to-many' , 'OneToManyController@oneToMany');
//OneToMany Inverse [ Muitos para um ] N p 1 country>state
Route::get('many-to-one' , 'OneToManyController@manyToOne');
//OneToMany country>state>city
Route::get('one-to-many-tow' , 'OneToManyController@onToManyTwo');
//OneToMany Insert
Route::get('one-to-many-insert' , 'OneToManyController@onToManyInsert');
//OneToMany Insert
Route::get('one-to-many-insert-two' , 'OneToManyController@onToManyInsertTwo');

/*
* Has Many Through
*/

Route::get('has-many-through','HasManyThroughController@hasManyThrough');