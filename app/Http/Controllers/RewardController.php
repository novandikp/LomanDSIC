<?php

namespace App\Http\Controllers;

use App\Models\reward;
use App\Http\Requests\StorerewardRequest;
use App\Http\Requests\UpdaterewardRequest;

class RewardController extends Controller
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
     * @param  \App\Http\Requests\StorerewardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorerewardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function show(reward $reward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function edit(reward $reward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdaterewardRequest  $request
     * @param  \App\Models\reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function update(UpdaterewardRequest $request, reward $reward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function destroy(reward $reward)
    {
        //
    }
}
