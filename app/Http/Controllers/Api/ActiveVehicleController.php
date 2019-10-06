<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActiveVehicle;
use App\Models\Vehicle;
use App\Models\VehicleActivity;
use App\Events\VehicleClockOut;
use App\Events\VehicleClockIn;

class ActiveVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActiveVehicle::with(['vehicle', 'vehicle.company', 'vehicle.type'])->orderByDesc('id')->get();
    }

    public function logVehicleActivity($uuid, $clockType = 0) {
    
        $activity = new VehicleActivity;
        $activity->vehicle_uuid = $uuid;
        $activity->clock_type = $clockType;
        $activity->save();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clockOut(Request $request)
    {
        // return $request;
        $vehicle = Vehicle::where('uuid', '=', $request['uuid'])->get();
        // return $portuser;
        $clockingOut = ActiveVehicle::where('vehicle_uuid', '=', $request['uuid'])->delete();
        
        if($clockingOut) {
            $this->logVehicleActivity($request['uuid']);
            VehicleClockOut::dispatch($vehicle);
        }

        return $clockingOut;
    }  
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clockIn(Request $request)
    {
        $vehicle = Vehicle::where('uuid', '=', $request['uuid'])->get();

        if(count($vehicle) == 0) {
            return null;
        }

        $clockingIn = new ActiveVehicle;
        $clockingIn->vehicle_uuid = $request['uuid'];
        $clockingIn->save();
        
        if($clockingIn) {
            $this->logVehicleActivity($request['uuid'], 1);
            VehicleClockIn::dispatch($vehicle);
            // dd($clockingIn);
        }

        return $clockingIn;
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
