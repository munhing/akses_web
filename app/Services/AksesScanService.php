<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Events\ClockOut;
use App\Events\ClockIn;
use App\Events\PortuserClockIn;
use App\Models\Portuser;
use App\Models\ActivePortuser;

class AksesScanService
{
    public function getActivePortusers()
    {
        // get active portusers order by latest clock in
        return ActivePortuser::with(['portuser', 'portuser.media', 'portuser.company'])->orderByDesc('id')->get();
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
            ClockOut::dispatch($portuser);
        }

        return $clockingOut;
    }

    public function scan(Request $request)
    {
        
    }
}
