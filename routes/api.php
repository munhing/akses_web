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

Route::post('/testevents', function() {
    ClockOut::dispatch();
    PortuserClockIn::dispatch();
});

// Route::apiResource('portusersactive', 'PortuserActiveController');

Route::get('portusersactive', function (Request $request) {
    return PortuserActive::with(['portuser', 'portuser.media', 'portuser.company'])->get();
});

Route::post('portusersactive', function (Request $request) {
    // return $request['uuid'];
    // $arr = explode('&', $request['qrcode']);
    // return $arr;
    // $portuser = Portuser::first();
    $portuser = Portuser::where('uuid', '=', $request['uuid'])->get();
    $clockingOut = PortuserActive::where('portuser_uuid', '=', $request['uuid'])->delete();
    // return $portuser;
    // $portuser = PortuserActive::where('portuser_uuid', '=', $request['uuid']);
    if($clockingOut) {
        // dispatch an event
        // event(new ClockOut($request));
        ClockOut::dispatch($portuser);
        // PortuserClockIn::dispatch();
    }
    return $clockingOut;
    // return PortuserActive::with(['portuser', 'portuser.media', 'portuser.company'])->get();
});
