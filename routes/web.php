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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('portusers', 'PortuserController');

Route::resource('roles', 'RoleController');

Route::resource('companies', 'CompanyController');

Route::resource('users', 'UserController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('companies', 'CompanyController');

Route::resource('roles', 'RoleController');

Route::resource('portusers', 'PortuserController');