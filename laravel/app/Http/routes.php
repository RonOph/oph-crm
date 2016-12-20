<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::auth();

Route::resource('clients','ClientController');
Route::resource('contracts','ContractController');
Route::resource('credentials','CredentialController');
Route::resource('users','UserController');
Route::resource('roles','RoleController');
Route::resource('projects','ProjectController');

 