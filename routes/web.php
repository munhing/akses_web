<?php

use App\Events\PortuserClockIn;
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

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('users', 'UserController');

Route::resource('companies', 'CompanyController');

Route::resource('roles', 'RoleController');

Route::resource('portusers', 'PortuserController');

Route::get('portusers/{portuser}/qrcode', 'PortuserController@showQrcode')->name('portusers.show_qrcode');

Route::resource('monitors', 'MonitorController');

Route::resource('activePortusers', 'ActivePortuserController');

Route::resource('vehicles', 'VehicleController');

Route::resource('vehicleTypes', 'VehicleTypeController');

Route::resource('activeVehicles', 'ActiveVehicleController');