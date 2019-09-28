<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActiveVisitor;
use App\Models\VisitorCard;
use App\Models\Visitor;
use App\Events\VisitorClockOut;
use App\Events\VisitorClockIn;

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clockOut(Request $request)
    {
        // return $request;
        $visitorCard = VisitorCard::where('uuid', '=', $request['uuid'])->get();
        // return $portuser;
        $clockingOut = ActiveVisitor::where('visitor_card_uuid', '=', $request['uuid'])->delete();
        
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
