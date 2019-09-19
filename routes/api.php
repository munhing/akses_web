<?php

use Illuminate\Http\Request;
use App\Models\PortuserActive;
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

Route::apiResource('portusersactive', 'PortuserActiveController');
// Route::get('portusersactive', 'PortuserActiveController@index');
