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
    Route::get('create', 'App\Http\Controllers\ClientController@create')->name('client.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\ClientController@store')->name('client.store')->middleware("auth");
    Route::get('edit/{client}', 'App\Http\Controllers\ClientController@edit')->name('client.edit')->middleware("auth");
    Route::post('update/{client}', 'App\Http\Controllers\ClientController@update')->name('client.update')->middleware("auth");
    Route::post('delete/{client}', 'App\Http\Controllers\ClientController@destroy' )->name('client.destroy')->middleware("auth");
    Route::get('show/{client}', 'App\Http\Controllers\ClientController@show')->name('client.show')->middleware("auth");
});

Route::prefix('companies')->group(function () {

    Route::get('','App\Http\Controllers\CompanyController@index')->name('company.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\CompanyController@create')->name('company.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\CompanyController@store')->name('company.store')->middleware("auth");
    Route::get('edit/{company}', 'App\Http\Controllers\CompanyController@edit')->name('company.edit')->middleware("auth");
    Route::post('update/{company}', 'App\Http\Controllers\CompanyController@update')->name('company.update')->middleware("auth");
    Route::post('delete/{company}', 'App\Http\Controllers\CompanyController@destroy' )->name('company.destroy')->middleware("auth");
    Route::get('show/{company}', 'App\Http\Controllers\CompanyController@show')->name('company.show')->middleware("auth");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
