<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActiveCrew;
use App\Models\CrewActivity;
use App\Models\CrewCard;
use App\Models\Crew;
use App\Events\CrewClockOut;
use App\Events\CrewClockIn;
use Str;

class ActiveCrewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActiveCrew::with(['crew', 'card'])->orderByDesc('id')->get();
    }

    public function register(Request $request)
    {
        // return $request;
        // reject if crew pass not selected
        $form = $request['form'];
        if (empty($form['card'])) {
            throw new \Exception('Please assign a crew pass!');
        }

       // create the crew
       $crew = new Crew;
       $crew->uuid = Str::uuid();
       $crew->name = $form['name'];
       $crew->nric = $form['nric'];
       $crew->company = $form['company'];
    //    $crew->reason = $form['reason'];
       $crew->save();

       // clock in the crew
       foreach ($form['card'] as $card) {

            // ClockIn the  crew
           $clockingIn = new ActiveCrew;
           $clockingIn->crew_card_uuid = $card;
           $clockingIn->crew_uuid = $crew->uuid;
           $clockingIn->reason = $form['reason'];
           $clockingIn->save();

           // insert into crew_activities
           $this->logActivity($crew->uuid, $card, 1, $form['reason']);
           
           // update card to belong to the crew
           $pass = CrewCard::where('uuid', '=', $card)->first();
           $pass->crew_uuid = $crew->uuid;
           $pass->save();
       }

       // dispatch event
       CrewClockIn::dispatch($crew);

       return $crew;

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
        $crewCard = CrewCard::where('uuid', '=', $request['uuid'])->first();
        $crewUuid = $crewCard->crew_uuid;
        // dd($request['uuid']);
        // dd($crewCard);
        //  $portuser;
        $clockingOut = ActiveCrew::where('crew_card_uuid', '=', $request['uuid'])->delete();

        // update card's crew_uuid to null
        $crewCard->crew_uuid = null;
        $crewCard->save();

        // insert into crew_activities
        $this->logActivity($crewUuid, $request['uuid']);     
        
        if($clockingOut) {
            CrewClockOut::dispatch($crewCard);
        }

        return $clockingOut;
    }  

    public function logActivity($crewUuid, $cardUui, $clockType = 0) {
    
        $activity = new CrewActivity;
        $activity->crew_uuid = $crewUuid;
        $activity->crew_card_uuid = $cardUui;
        $activity->clock_type = $clockType;
        $activity->save();

    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clockIn(Request $request)
    {
        // return $request;

        $crew = Crew::where('uuid', '=', $request['crew_uuid'])->get();

        if(count($crew) == 0) {
            return null;
        }

        $clockingIn = new ActiveCrew;
        $clockingIn->crew_card_uuid = $request['card_uuid'];
        $clockingIn->crew_uuid = $request['crew_uuid'];
        $clockingIn->save();
        
        if($clockingIn) {
            CrewClockIn::dispatch($crew);
            // dd($clockingIn);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
