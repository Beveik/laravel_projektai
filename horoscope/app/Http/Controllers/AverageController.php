<?php

namespace App\Http\Controllers;

use App\Models\Average;
use App\Http\Requests\StoreAverageRequest;
use App\Http\Requests\UpdateAverageRequest;

class AverageController extends Controller
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
     * @param  \App\Http\Requests\StoreAverageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAverageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Average  $average
     * @return \Illuminate\Http\Response
     */
    public function show(Average $average)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Average  $average
     * @return \Illuminate\Http\Response
     */
    public function edit(Average $average)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAverageRequest  $request
     * @param  \App\Models\Average  $average
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAverageRequest $request, Average $average)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Average  $average
     * @return \Illuminate\Http\Response
     */
    public function destroy(Average $average)
    {
        //
    }
}
