<?php

namespace App\Http\Controllers;

use App\Models\transaction_activity;
use App\Http\Requests\Storetransaction_activityRequest;
use App\Http\Requests\Updatetransaction_activityRequest;

class TransactionActivityController extends Controller
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
     * @param  \App\Http\Requests\Storetransaction_activityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storetransaction_activityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaction_activity  $transaction_activity
     * @return \Illuminate\Http\Response
     */
    public function show(transaction_activity $transaction_activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaction_activity  $transaction_activity
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction_activity $transaction_activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatetransaction_activityRequest  $request
     * @param  \App\Models\transaction_activity  $transaction_activity
     * @return \Illuminate\Http\Response
     */
    public function update(Updatetransaction_activityRequest $request, transaction_activity $transaction_activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaction_activity  $transaction_activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaction_activity $transaction_activity)
    {
        //
    }
}
