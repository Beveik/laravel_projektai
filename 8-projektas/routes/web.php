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
Route::prefix('types')->group(function () {

    Route::get('','App\Http\Controllers\TypeController@index')->name('type.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\TypeController@create')->name('type.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\TypeController@store')->name('type.store')->middleware("auth");
    Route::get('edit/{type}', 'App\Http\Controllers\TypeController@edit')->name('type.edit')->middleware("auth");
    Route::post('update/{type}', 'App\Http\Controllers\TypeController@update')->name('type.update')->middleware("auth");
    Route::post('delete/{type}', 'App\Http\Controllers\TypeController@destroy' )->name('type.destroy')->middleware("auth");
    Route::get('show/{type}', 'App\Http\Controllers\TypeController@show')->name('type.show')->middleware("auth");
    Route::get('search', 'App\Http\Controllers\TypeController@search')->name('type.search')->middleware("auth");
});

Route::prefix('tasks')->group(function () {

    Route::get('','App\Http\Controllers\TaskController@index')->name('task.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\TaskController@create')->name('task.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\TaskController@store')->name('task.store')->middleware("auth");
    Route::get('edit/{task}', 'App\Http\Controllers\TaskController@edit')->name('task.edit')->middleware("auth");
    Route::post('update/{task}', 'App\Http\Controllers\TaskController@update')->name('task.update')->middleware("auth");
    Route::post('delete/{task}', 'App\Http\Controllers\TaskController@destroy' )->name('task.destroy')->middleware("auth");
    Route::get('show/{task}', 'App\Http\Controllers\TaskController@show')->name('task.show')->middleware("auth");
    Route::get('search', 'App\Http\Controllers\TaskController@search')->name('task.search')->middleware("auth");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
