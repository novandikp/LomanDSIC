<?php

namespace App\Http\Controllers;

use App\Models\donation_activity;
use App\Http\Requests\Storedonation_activityRequest;
use App\Http\Requests\Updatedonation_activityRequest;

class DonationActivityController extends Controller
{
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
     * @param  \App\Http\Requests\Storedonation_activityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedonation_activityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donation_activity  $donation_activity
     * @return \Illuminate\Http\Response
     */
    public function show(donation_activity $donation_activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\donation_activity  $donation_activity
     * @return \Illuminate\Http\Response
     */
    public function edit(donation_activity $donation_activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatedonation_activityRequest  $request
     * @param  \App\Models\donation_activity  $donation_activity
     * @return \Illuminate\Http\Response
     */
    public function update(Updatedonation_activityRequest $request, donation_activity $donation_activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donation_activity  $donation_activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(donation_activity $donation_activity)
    {
        //
    }
}
