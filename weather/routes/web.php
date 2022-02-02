<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Jobs\ProcessStore;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/fetch', [WeatherController::class, 'fetch']);
Route::post('/storeTemperature', [WeatherController::class, 'storeTemperature']);
Route::post('weathers', 'App\Http\Controllers\WeatherController@storeTemperature');

Route::get('weather-test', function(){

    $city = 'Marijampolė';

    // dispatch(new ProcessStore($city));
    ProcessStore::dispatch($city);

    dd('done');
});
