<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarkeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::group(['middleware' => 'auth:api'], function() {

Route::get('markes', 'App\Http\Controllers\MarkeController@index');
Route::get('markes/{marke}', 'App\Http\Controllers\MarkeController@show');
Route::post('markes', 'App\Http\Controllers\MarkeController@store');
Route::put('markes/{marke}', 'App\Http\Controllers\MarkeController@update');
Route::delete('markes/{marke}', 'App\Http\Controllers\MarkeController@destroy');

Route::get('modeliais', 'App\Http\Controllers\ModeliaiController@index');
Route::get('modeliais/{modeliai}', 'App\Http\Controllers\ModeliaiController@show');
Route::post('modeliais', 'App\Http\Controllers\ModeliaiController@store');
Route::put('modeliais/{modeliai}', 'App\Http\Controllers\ModeliaiController@update');
Route::delete('modeliais/{modeliai}', 'App\Http\Controllers\ModeliaiController@destroy');

Route::get('metais', 'App\Http\Controllers\MetaiController@index');
Route::get('metais/{metai}', 'App\Http\Controllers\MetaiController@show');
Route::post('metais', 'App\Http\Controllers\MetaiController@store');

//   });
