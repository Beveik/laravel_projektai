<?php

namespace App\Http\Controllers;

use App\Models\Zodiac;
use App\Models\ByDay;
use App\Models\NewScore;
use App\Models\Average;
use App\Http\Requests\StoreZodiacRequest;
use App\Http\Requests\UpdateZodiacRequest;
use Illuminate\Http\Request;

class ZodiacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Zodiac $zodiac)
    {
        $zodiacs=Zodiac::all();
        return view("zodiac.index", ["zodiacs"=>$zodiacs, "zodiac"=>$zodiac]);
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
     * @param  \App\Http\Requests\StoreZodiacRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zodiac  $zodiac
     * @return \Illuminate\Http\Response
     */
    public function show(Zodiac $zodiac, ByDay $byDay, Request $request, NewScore $newScore)
    {
        $others=Zodiac::all()->first();
        $zodiac_select = $request->zodiac_select;
        $lastYear = $zodiac ->ZodiacDays->pluck('year')->last();
        $newScores=NewScore::all();
        $years=$zodiac ->ZodiacDays;
        $byDays = $zodiac ->ZodiacDays;
        $year_select = $request->year_select;
        if (isset($year_select)){
            $byDays = $zodiac ->ZodiacDays->where('year','=', $year_select);
            $bestMonth = $zodiac ->ZodiacAverage->where('year','=', $year_select)->first();
            $best_signs = Average::all()->where('year','=', $year_select);
        } else {
            $byDays = $zodiac ->ZodiacDays->where('year','=', $lastYear);
            $bestMonth = $zodiac ->ZodiacAverage->where('year','=', $lastYear)->first();
            $best_signs = Average::all()->where('year','=', $lastYear);
        }

            $largest=0;
            foreach($best_signs as $best_sign) {
                    if ($largest < $best_sign->largest_average) {
                        $largest=$best_sign->largest_average;
                    }
            }
            $best_signs = Average::all()->where('largest_average','=', $largest)->first();
            $zodiacs=Zodiac::all()->where('id', '=', $best_signs->zodiac_id)->first();
        return view('zodiac.show', ['zodiac' => $zodiac, 'zodiac_select'=>$zodiac_select, "others"=>$others, 'byDays' => $byDays, 'byDay' => $byDay, 'newScores' => $newScores, 'newScore' => $newScores, 'years' => $years, 'lastYear' => $lastYear, 'year_select' => $year_select, 'bestMonth' => $bestMonth, 'zodiacs' => $zodiacs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zodiac  $zodiac
     * @return \Illuminate\Http\Response
     */
    public function edit(Zodiac $zodiac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateZodiacRequest  $request
     * @param  \App\Models\Zodiac  $zodiac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zodiac $zodiac)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zodiac  $zodiac
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zodiac $zodiac)
    {
        //
    }
}
