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
Route::prefix('zodiacs')->group(function () {

    Route::get('','App\Http\Controllers\ZodiacController@index')->name('zodiac.index');
    // Route::get('create', 'App\Http\Controllers\ZodiacController@create')->name('zodiac.create');
    // Route::post('store', 'App\Http\Controllers\ZodiacController@store')->name('zodiac.store');
    // Route::get('edit/{zodiac}', 'App\Http\Controllers\ZodiacController@edit')->name('zodiac.edit');
    // Route::post('update/{zodiac}', 'App\Http\Controllers\ZodiacController@update')->name('zodiac.update');
    // Route::post('delete/{zodiac}', 'App\Http\Controllers\ZodiacController@destroy' )->name('zodiac.destroy');
    Route::get('show/{zodiac}', 'App\Http\Controllers\ZodiacController@show')->name('zodiac.show');

});
Route::prefix('byDays')->group(function () {

    Route::get('','App\Http\Controllers\ByDayController@index')->name('byday.index');
    Route::get('create', 'App\Http\Controllers\ByDayController@create')->name('byday.create');
    Route::post('store', 'App\Http\Controllers\ByDayController@store')->name('byday.store');
    // Route::get('edit/{byday}', 'App\Http\Controllers\ByDayController@edit')->name('byday.edit');
    // Route::post('update/{byday}', 'App\Http\Controllers\ByDayController@update')->name('byday.update');
    // Route::post('delete/{byday}', 'App\Http\Controllers\ByDayController@destroy' )->name('byday.destroy');
    // Route::get('show/{byday}', 'App\Http\Controllers\ByDayController@show')->name('byday.show');

});
// Route::prefix('averages')->group(function () {

//     Route::get('','App\Http\Controllers\AverageController@index')->name('average.index');/


// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
