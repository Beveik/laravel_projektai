<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use App\Http\Requests\StoreWeatherRequest;
use App\Http\Requests\UpdateWeatherRequest;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Jobs\ProcessStore;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    public function index()
    {
        $weathers = Cache::remember('weathers', 22 * 60, function () {
            return Weather::all();
        });
        return response()->json($weathers);
    }

    public function fetch()
    {

        $city = request('city');
        $response = Http::get('api.openweathermap.org/data/2.5/weather?q=' . $city . '&units=metric&appid=d3e07c050f1965ecadfacc40181285e0');
        $getTemperature = json_decode($response, true); // true - paverčia į masyvą

        $temperature = $getTemperature["main"]["temp"];
        $weather = $getTemperature["weather"][0]["main"];
        $country = $getTemperature["sys"]["country"];
        $name = $getTemperature["name"];

        $weather = array(
            'city' => $name,
            'country' => $country,
            'temperature' => $temperature,
            'weather' => $weather,
        );

        return $weather;
    }
    public function storeTemperature()
    {
        $city = 'Vilnius';
        $response = Http::get('api.openweathermap.org/data/2.5/weather?q=' . $city . '&units=metric&appid=d3e07c050f1965ecadfacc40181285e0');
        $getTemperature = json_decode($response, true);
        $temperature = $getTemperature["main"]["temp"];
        $name = $getTemperature["name"];
        Weather::create([
            'city' => $name,
            'temperature' => $temperature,
        ]);

        $message = 'Temperature added succesfully.';
        return response()->json($message, 201);

        // Log::info('Entered Job WeatherController process method');

        // $city = 'Vilnius';

        // ProcessStore::dispatch($city);

        // Log::info('Exited Job WeatherController process method');
    }
}
