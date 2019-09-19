<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PortuserActiveRepository;
use App\Events\ClockOut;
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
    public function store(Request $request)
    {
        $portuser = Portuser::where('uuid', '=', $request['uuid'])->get();
        $clockingOut = PortuserActive::where('portuser_uuid', '=', $request['uuid'])->delete();
        
        if($clockingOut) {
            ClockOut::dispatch($portuser);
        }

        return $clockingOut;
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
