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

Route::prefix('contacts')->group(function () {

    Route::get('','App\Http\Controllers\ContactController@index')->name('contact.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\ContactController@create')->name('contact.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\ContactController@store')->name('contact.store')->middleware("auth");
    Route::get('edit/{contact}', 'App\Http\Controllers\ContactController@edit')->name('contact.edit')->middleware("auth");
    Route::post('update/{contact}', 'App\Http\Controllers\ContactController@update')->name('contact.update')->middleware("auth");
    Route::post('delete/{contact}', 'App\Http\Controllers\ContactController@destroy' )->name('contact.destroy')->middleware("auth");
    Route::get('show/{contact}', 'App\Http\Controllers\ContactController@show')->name('contact.show')->middleware("auth");
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
