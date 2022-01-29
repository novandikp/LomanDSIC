<?php

namespace App\Http\Controllers;

use App\Models\donations_report;
use App\Http\Requests\Storedonations_reportRequest;
use App\Http\Requests\Updatedonations_reportRequest;

class DonationsReportController extends Controller
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
     * @param  \App\Http\Requests\Storedonations_reportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedonations_reportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donations_report  $donations_report
     * @return \Illuminate\Http\Response
     */
    public function show(donations_report $donations_report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\donations_report  $donations_report
     * @return \Illuminate\Http\Response
     */
    public function edit(donations_report $donations_report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatedonations_reportRequest  $request
     * @param  \App\Models\donations_report  $donations_report
     * @return \Illuminate\Http\Response
     */
    public function update(Updatedonations_reportRequest $request, donations_report $donations_report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donations_report  $donations_report
     * @return \Illuminate\Http\Response
     */
    public function destroy(donations_report $donations_report)
    {
        //
    }
}
