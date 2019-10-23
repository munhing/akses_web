<?php

use Illuminate\Http\Request;
use App\Models\ActivePortuser;
use App\Models\ActiveVehicle;
use App\Models\ActiveVisitor;
use App\Models\Portuser;
use App\Models\Company;
use App\Models\VisitorCard;
use App\Events\ClockOut;
use App\Events\PortuserClockIn;

use App\Services\AksesScanService;

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

Route::get('/', function() {
    // return $scan->getActivePortusers();
    // dd(app('App\Services\AksesScanService'), app('App\Services\AksesScanService'), app('App\Services\AksesScanService'));
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

Route::post('scan', 'ScanController@scan');

Route::get('getavailablevisitorpass', function(){
    return VisitorCard::where('visitor_uuid','=',null)->get();
});

Route::get('getactiveportuserscount', function(){
    return ActivePortuser::count();
});

Route::get('getactivevehiclescount', function(){
    return ActiveVehicle::count();
});

Route::get('getactivevisitorscount', function(){
    return ActiveVisitor::count();
});

Route::post('registervisitor', 'ActiveVisitorController@register');

Route::get('portusers', 'PortuserController@getPortusers');

// Route::get('portusers', function(){
//     // return Portuser::with('company')->paginate(25);
//     return Portuser::with('company')->get();
// });

Route::get('getcompanies', function(){
    return Company::all();
});