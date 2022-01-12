<?php

namespace App\Http\Controllers;

use App\Models\horoscope_by_day;
use App\Http\Requests\Storehoroscope_by_dayRequest;
use App\Http\Requests\Updatehoroscope_by_dayRequest;

class HoroscopeByDayController extends Controller
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
     * @param  \App\Http\Requests\Storehoroscope_by_dayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storehoroscope_by_dayRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\horoscope_by_day  $horoscope_by_day
     * @return \Illuminate\Http\Response
     */
    public function show(horoscope_by_day $horoscope_by_day)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\horoscope_by_day  $horoscope_by_day
     * @return \Illuminate\Http\Response
     */
    public function edit(horoscope_by_day $horoscope_by_day)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatehoroscope_by_dayRequest  $request
     * @param  \App\Models\horoscope_by_day  $horoscope_by_day
     * @return \Illuminate\Http\Response
     */
    public function update(Updatehoroscope_by_dayRequest $request, horoscope_by_day $horoscope_by_day)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\horoscope_by_day  $horoscope_by_day
     * @return \Illuminate\Http\Response
     */
    public function destroy(horoscope_by_day $horoscope_by_day)
    {
        //
    }
}
