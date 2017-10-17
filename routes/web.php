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
* pegando os dados de uma tabela sem passar pela intermediaria country>state>city*
*/

Route::get('has-many-through','HasManyThroughController@hasManyThrough');

/*
* Has To Many N:N
*/
Route::get( 'many-to-many' , 'ManyToManyController@manyToMany');
Route::get( 'many-to-many-inverse' , 'ManyToManyController@manyToManyInverse');
Route::get( 'many-to-many-insert' , 'ManyToManyController@manyToManyInsert');

/*
* Relation Polymorphic 
* Um comentario[um tabela] para pais, cidade, estado
*/
Route::get( 'polymorphics' , 'PolymorphicController@polymorphic' );
Route::get( 'polymorphicsInsert' , 'PolymorphicController@polymorphicInsert' );
