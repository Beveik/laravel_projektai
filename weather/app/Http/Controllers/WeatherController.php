<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use App\Http\Requests\StoreWeatherRequest;
use App\Http\Requests\UpdateWeatherRequest;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function fetch()
    {

        $city = request('city');
        $response = Http::get('http://api.openweathermap.org/geo/1.0/direct?q='.$city.'&appid=d3e07c050f1965ecadfacc40181285e0');

            $getLanAndLon = json_decode($response,true);

        $lat=$getLanAndLon[0]["lat"];
        $lon=$getLanAndLon[0]["lon"];
        $name=$getLanAndLon[0]["name"];

        $response2 = Http::get('api.openweathermap.org/data/2.5/weather?lat='.$lat.'&lon='.$lon.'&units=metric&appid=d3e07c050f1965ecadfacc40181285e0');
        $getTemperature = json_decode($response2, true);

        $temperature=$getTemperature['main']["temp"];

        $weather = array(
            'city' => $name,
            'latitude' => $lat,
            'longitude' => $lon,
        'temperature' => $temperature,
        );

        return $weather;

    }
    public function storeTemperature()
    {

        $city='Vilnius';

        $response = Http::get('http://api.openweathermap.org/geo/1.0/direct?q='.$city.'&appid=d3e07c050f1965ecadfacc40181285e0');

            $getLanAndLon = json_decode($response,true);

        $lat=$getLanAndLon[0]["lat"];
        $lon=$getLanAndLon[0]["lon"];
        $name=$getLanAndLon[0]["name"];

        $response2 = Http::get('api.openweathermap.org/data/2.5/weather?lat='.$lat.'&lon='.$lon.'&units=metric&appid=d3e07c050f1965ecadfacc40181285e0');
        $getTemperature = json_decode($response2, true);

        $temperature=$getTemperature['main']["temp"];

        Weather::create([
            'city' => $name,
            'latitude' => $lat,
            'longitude' => $lon,
        'temperature' => $temperature,
        ]);

        $message = 'Temperature added succesfully.';
        return response()->json($message, 201);

    }

}
