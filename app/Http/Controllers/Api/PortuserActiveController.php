<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PortuserActiveRepository;
use App\Events\ClockOut;
use App\Events\ClockIn;
use App\Events\PortuserClockIn;
use App\Models\Portuser;
use App\Models\PortuserActive;

class PortuserActiveController extends Controller
{
    /** @var  PortuserActiveRepository */
    private $portuserActiveRepository;

    public function __construct(PortuserActiveRepository $portuserActiveRepo)
    {
        $this->portuserActiveRepository = $portuserActiveRepo;
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get active portusers order by latest clock in
        return PortuserActive::with(['portuser', 'portuser.media', 'portuser.company'])->orderByDesc('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clockIn(Request $request)
    {
        $portuser = Portuser::where('uuid', '=', $request['uuid'])->get();

        if(count($portuser) == 0) {
            return null;
        }

        $clockingIn = new PortuserActive;
        $clockingIn->portuser_uuid = $request['uuid'];
        $clockingIn->save();
        
        if($clockingIn) {
            ClockIn::dispatch($portuser);
        }

        return $clockingIn;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clockOut(Request $request)
    {
        // return $request;
        $portuser = Portuser::where('uuid', '=', $request['uuid'])->get();
        // return $portuser;
        $clockingOut = PortuserActive::where('portuser_uuid', '=', $request['uuid'])->delete();
        
        if($clockingOut) {
            ClockOut::dispatch($portuser);
        }

        return $clockingOut;
    }
}
