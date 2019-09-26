<?php

use Illuminate\Http\Request;
use App\Models\ActivePortuser;
use App\Models\Portuser;
use App\Events\ClockOut;
use App\Events\PortuserClockIn;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('activeportusers', 'ActivePortuserController');

Route::get('activeportusers', 'ActivePortuserController@index');
Route::post('activeportusers', 'ActivePortuserController@clockIn');
Route::delete('activeportusers', 'ActivePortuserController@clockOut');

Route::get('activevehicles', 'ActiveVehicleController@index');
Route::post('activevehicles', 'ActiveVehicleController@clockIn');
Route::delete('activevehicles', 'ActiveVehicleController@clockOut');

Route::get('activevisitors', 'ActiveVisitorController@index');
Route::post('activevisitors', 'ActiveVisitorController@clockIn');
Route::delete('activevisitors', 'ActiveVisitorController@clockOut');