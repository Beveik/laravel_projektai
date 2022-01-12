<?php

namespace App\Http\Controllers;

use App\Models\NewScore;
use App\Http\Requests\StoreNewScoreRequest;
use App\Http\Requests\UpdateNewScoreRequest;

class NewScoreController extends Controller
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
     * @param  \App\Http\Requests\StoreNewScoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewScoreRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewScore  $newScore
     * @return \Illuminate\Http\Response
     */
    public function show(NewScore $newScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewScore  $newScore
     * @return \Illuminate\Http\Response
     */
    public function edit(NewScore $newScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewScoreRequest  $request
     * @param  \App\Models\NewScore  $newScore
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewScoreRequest $request, NewScore $newScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewScore  $newScore
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewScore $newScore)
    {
        //
    }
}
