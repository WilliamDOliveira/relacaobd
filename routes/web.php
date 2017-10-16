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

//OneToOne
Route::get('one-to-one' , 'OneToOneController@oneToOne');
//OneToOne
Route::get('one-to-one-inverse' , 'OneToOneController@oneToOneInverse');
//OneToOne
Route::get('one-to-one-insert' , 'OneToOneController@oneToOneInsert');


//OneToMany [ Um para muitos ] 1 p N 
Route::get('one-to-many' , 'OneToManyController@oneToMany');
//OneToMany Inverse [ Muitos para um ] N p 1
Route::get('many-to-one' , 'OneToManyController@manyToOne');
//OneToMany Inverse [ Muitos para um ] N p 1
Route::get('many-to-one-two' , 'OneToManyController@onToManyTwo');