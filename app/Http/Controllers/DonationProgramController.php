<?php

namespace App\Http\Controllers;

use App\Models\donation_program;
use App\Http\Requests\Storedonation_programRequest;
use App\Http\Requests\Updatedonation_programRequest;

class DonationProgramController extends Controller
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
     * @param  \App\Http\Requests\Storedonation_programRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedonation_programRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donation_program  $donation_program
     * @return \Illuminate\Http\Response
     */
    public function show(donation_program $donation_program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\donation_program  $donation_program
     * @return \Illuminate\Http\Response
     */
    public function edit(donation_program $donation_program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatedonation_programRequest  $request
     * @param  \App\Models\donation_program  $donation_program
     * @return \Illuminate\Http\Response
     */
    public function update(Updatedonation_programRequest $request, donation_program $donation_program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donation_program  $donation_program
     * @return \Illuminate\Http\Response
     */
    public function destroy(donation_program $donation_program)
    {
        //
    }
}
