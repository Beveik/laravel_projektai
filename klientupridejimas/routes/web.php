<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('clients')->group(function () {

    Route::get('','App\Http\Controllers\ClientController@index')->name('client.index')->middleware("auth");
    Route::get('createclient', 'App\Http\Controllers\ClientController@createclient')->name('client.createclient')->middleware("auth");
    Route::post('storeclient', 'App\Http\Controllers\ClientController@storeclient')->name('client.storeclient')->middleware("auth");

    Route::get('createclients', 'App\Http\Controllers\ClientController@createclients')->name('client.createclients')->middleware("auth");
    Route::post('storeclients', 'App\Http\Controllers\ClientController@storeclients')->name('client.storeclients')->middleware("auth");

    Route::get('createclientsjava', 'App\Http\Controllers\ClientController@createclientsjava')->name('client.createclientsjava')->middleware("auth");
    Route::post('storeclientsjava', 'App\Http\Controllers\ClientController@storeclientsjava')->name('client.storeclientsjava')->middleware("auth");
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
