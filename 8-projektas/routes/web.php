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
    Route::get('/pdf', 'App\Http\Controllers\TypeController@generatePDF')->name('types.pdf')->middleware("auth");
    Route::get('pdfType/{type}','App\Http\Controllers\TypeController@generateType')->name('type.pdftype')->middleware("auth");
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
    Route::get('/pdf', 'App\Http\Controllers\TaskController@generatePDF')->name('tasks.pdf')->middleware("auth");
    Route::get('pdfTask/{task}','App\Http\Controllers\TaskController@generateTask')->name('task.pdftask')->middleware("auth");
    Route::get('pagination', 'App\Http\Controllers\TaskController@pagination')->name('task.pagination')->middleware("auth");
});

Route::prefix('owners')->group(function () {

    Route::get('','App\Http\Controllers\OwnerController@index')->name('owner.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\OwnerController@create')->name('owner.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\OwnerController@store')->name('owner.store')->middleware("auth");
    Route::get('edit/{owner}', 'App\Http\Controllers\OwnerController@edit')->name('owner.edit')->middleware("auth");
    Route::post('update/{owner}', 'App\Http\Controllers\OwnerController@update')->name('owner.update')->middleware("auth");
    Route::post('delete/{owner}', 'App\Http\Controllers\OwnerController@destroy' )->name('owner.destroy')->middleware("auth");
    Route::get('show/{owner}', 'App\Http\Controllers\OwnerController@show')->name('owner.show')->middleware("auth");
    Route::get('search', 'App\Http\Controllers\OwnerController@search')->name('owner.search')->middleware("auth");
    Route::get('/pdf', 'App\Http\Controllers\OwnerController@generatePDF')->name('owners.pdf')->middleware("auth");
    Route::get('pdfOwner/{owner}','App\Http\Controllers\OwnerController@generateOwner')->name('owner.pdfowner')->middleware("auth");

});

Route::prefix('paginationsettings')->group(function () {

    Route::get('','App\Http\Controllers\PaginationSettingController@index')->name('paginationsetting.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\PaginationSettingController@create')->name('paginationsetting.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\PaginationSettingController@store')->name('paginationsetting.store')->middleware("auth");
    Route::get('edit/{paginationSetting}', 'App\Http\Controllers\PaginationSettingController@edit')->name('paginationsetting.edit')->middleware("auth");
    Route::post('update/{paginationSetting}', 'App\Http\Controllers\PaginationSettingController@update')->name('paginationsetting.update')->middleware("auth");
    Route::post('delete/{paginationSetting}', 'App\Http\Controllers\PaginationSettingController@destroy' )->name('paginationsetting.destroy')->middleware("auth");
    Route::get('show/{paginationSetting}', 'App\Http\Controllers\PaginationSettingController@show')->name('paginationsetting.show')->middleware("auth");
    // Route::get('search', 'App\Http\Controllers\PaginationSettingController@search')->name('paginationsetting.search')->middleware("auth");
    // Route::get('/pdf', 'App\Http\Controllers\PaginationSettingController@generatePDF')->name('paginationsettings.pdf')->middleware("auth");
    // Route::get('pdfType/{paginationsetting}','App\Http\Controllers\PaginationSettingController@generatePaginationsetting')->name('paginationsetting.pdfpaginationsetting')->middleware("auth");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pdf', 'App\Http\Controllers\HomeController@generatePDF')->name('pdfstatistics.pdf')->middleware("auth");
