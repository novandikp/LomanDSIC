<?php

namespace App\Http\Controllers;

use App\Models\issue_report;
use App\Http\Requests\Storeissue_reportRequest;
use App\Http\Requests\Updateissue_reportRequest;

class IssueReportController extends Controller
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
     * @param  \App\Http\Requests\Storeissue_reportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeissue_reportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\issue_report  $issue_report
     * @return \Illuminate\Http\Response
     */
    public function show(issue_report $issue_report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\issue_report  $issue_report
     * @return \Illuminate\Http\Response
     */
    public function edit(issue_report $issue_report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateissue_reportRequest  $request
     * @param  \App\Models\issue_report  $issue_report
     * @return \Illuminate\Http\Response
     */
    public function update(Updateissue_reportRequest $request, issue_report $issue_report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\issue_report  $issue_report
     * @return \Illuminate\Http\Response
     */
    public function destroy(issue_report $issue_report)
    {
        //
    }
}
