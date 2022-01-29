<?php

namespace App\Http\Controllers;

use App\Models\take_donate_photo;
use App\Http\Requests\Storetake_donate_photoRequest;
use App\Http\Requests\Updatetake_donate_photoRequest;

class TakeDonatePhotoController extends Controller
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
     * @param  \App\Http\Requests\Storetake_donate_photoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storetake_donate_photoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\take_donate_photo  $take_donate_photo
     * @return \Illuminate\Http\Response
     */
    public function show(take_donate_photo $take_donate_photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\take_donate_photo  $take_donate_photo
     * @return \Illuminate\Http\Response
     */
    public function edit(take_donate_photo $take_donate_photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatetake_donate_photoRequest  $request
     * @param  \App\Models\take_donate_photo  $take_donate_photo
     * @return \Illuminate\Http\Response
     */
    public function update(Updatetake_donate_photoRequest $request, take_donate_photo $take_donate_photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\take_donate_photo  $take_donate_photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(take_donate_photo $take_donate_photo)
    {
        //
    }
}
