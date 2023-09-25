<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHealthstateRequest;
use App\Http\Requests\UpdateHealthstateRequest;
use App\Models\Healthstate;

class HealthstateController extends Controller
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
     * @param  \App\Http\Requests\StoreHealthstateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHealthstateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Healthstate  $healthstate
     * @return \Illuminate\Http\Response
     */
    public function show(Healthstate $healthstate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Healthstate  $healthstate
     * @return \Illuminate\Http\Response
     */
    public function edit(Healthstate $healthstate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHealthstateRequest  $request
     * @param  \App\Models\Healthstate  $healthstate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHealthstateRequest $request, Healthstate $healthstate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Healthstate  $healthstate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Healthstate $healthstate)
    {
        //
    }
}
