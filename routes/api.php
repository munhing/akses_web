<?php

use Illuminate\Http\Request;
use App\Models\PortuserActive;

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

Route::get('portusersactive', function (Request $request) {
    return PortuserActive::with(['portuser', 'portuser.media', 'portuser.company'])->get();
});

Route::post('portusersactive', function (Request $request) {
    // return $request['uuid'];
    // $arr = explode('&', $request['qrcode']);
    // return $arr;
    $portuser = PortuserActive::where('portuser_uuid', '=', $request['uuid']);
    $result = $portuser->delete();
    return $result;
    // return PortuserActive::with(['portuser', 'portuser.media', 'portuser.company'])->get();
});
