<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Events\ClockOut;
use App\Events\ClockIn;
use App\Events\PortuserClockIn;
use App\Models\Portuser;
use App\Models\Vehicle;
use App\Models\PortuserActivity;
use App\Models\ActivePortuser;

use DB;

class AksesScanService
{
    public function getActivePortusers()
    {
        // get active portusers order by latest clock in
        return ActivePortuser::with(['portuser', 'portuser.media', 'portuser.company'])->orderByDesc('id')->get();
    }

    public function logPortuserActivity($uuid, $clockType = 0) {
    
        $activity = new PortuserActivity;
        $activity->portuser_uuid = $uuid;
        $activity->clock_type = $clockType;
        $activity->save();

    }

    public function clockIn(Request $request)
    {
        $portuser = Portuser::where('uuid', '=', $request['uuid'])->get();

        if(count($portuser) == 0) {
            return null;
        }

        $clockingIn = new ActivePortuser;
        $clockingIn->portuser_uuid = $request['uuid'];
        $clockingIn->save();
        
        if($clockingIn) {
            $this->logPortuserActivity($request['uuid'], 1);
            ClockIn::dispatch($portuser);
        }

        return $clockingIn;
    }

    public function clockOut(Request $request)
    {
        // return $request;
        $portuser = Portuser::where('uuid', '=', $request['uuid'])->get();
        // return $portuser;
        $clockingOut = ActivePortuser::where('portuser_uuid', '=', $request['uuid'])->delete();
        
        if($clockingOut) {
            $this->logPortuserActivity($request['uuid']);
            ClockOut::dispatch($portuser);
        }

        return $clockingOut;
    }

    public function getPortuser($uuid)
    {
        return Portuser::where('uuid', '=', $uuid)->with('company', 'media', 'active')->firstOrFail();
    }

    public function getVehicle($uuid)
    {
        return Vehicle::where('uuid', '=', $uuid)->with('company', 'type', 'active')->firstOrFail();
    }    
}
