<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActiveVisitor;
use App\Models\VisitorCard;
use App\Models\Visitor;
use App\Events\VisitorClockOut;
use App\Events\VisitorClockIn;
use Str;

class ActiveVisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActiveVisitor::with(['visitor', 'card'])->orderByDesc('id')->get();
    }

    public function register(Request $request)
    {
        // return $request;
        // reject if visitor pass not selected
        $form = $request['form'];
        if (empty($form['card'])) {
            throw new \Exception('Please assign a visitor pass!');
        }

       // create the visitor
       $visitor = new Visitor;
       $visitor->uuid = Str::uuid();
       $visitor->name = $form['name'];
       $visitor->nric = $form['nric'];
       $visitor->company = $form['company'];
    //    $visitor->reason = $form['reason'];
       $visitor->save();

       // clock in the visitor
       foreach ($form['card'] as $card) {

            // ClockIn the  visitor
           $clockingIn = new ActiveVisitor;
           $clockingIn->visitor_card_uuid = $card;
           $clockingIn->visitor_uuid = $visitor->uuid;
           $clockingIn->save();    

           // update card to belong to the visitor
           $pass = VisitorCard::where('uuid', '=', $card)->first();
           $pass->visitor_uuid = $visitor->uuid;
           $pass->save();
       }

       // dispatch event
       VisitorClockIn::dispatch($visitor);

       return $visitor;

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
        $visitorCard = VisitorCard::where('uuid', '=', $request['uuid'])->first();
        // return
        //  $portuser;
        $clockingOut = ActiveVisitor::where('visitor_card_uuid', '=', $request['uuid'])->delete();

        // update card's visitor_uuid to null
        $visitorCard->visitor_uuid = null;
        $visitorCard->save();
        
        if($clockingOut) {
            VisitorClockOut::dispatch($visitorCard);
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
        // return $request;

        $visitor = Visitor::where('uuid', '=', $request['visitor_uuid'])->get();

        if(count($visitor) == 0) {
            return null;
        }

        $clockingIn = new ActiveVisitor;
        $clockingIn->visitor_card_uuid = $request['card_uuid'];
        $clockingIn->visitor_uuid = $request['visitor_uuid'];
        $clockingIn->save();
        
        if($clockingIn) {
            VisitorClockIn::dispatch($visitor);
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
