<?php

namespace App\Http\Controllers;

use App\TrackingData;
use Illuminate\Http\Request;
use Crypt;
use Session;

class TrackingDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function changevisible($id){
        TrackingData::changeStatusToVisible(Crypt::decrypt($id));
        Session::flash('message','File is recieved successfully');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrackingData  $trackingData
     * @return \Illuminate\Http\Response
     */
    public function show(TrackingData $trackingData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrackingData  $trackingData
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackingData $trackingData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrackingData  $trackingData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrackingData $trackingData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrackingData  $trackingData
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrackingData $trackingData)
    {
        //
    }
}
