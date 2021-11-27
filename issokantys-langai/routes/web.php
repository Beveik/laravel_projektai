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
Route::prefix('articles')->group(function () {

    Route::get('','App\Http\Controllers\ArticleController@index')->name('article.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\ArticleController@create')->name('article.create')->middleware("auth");
    Route::post('storeAjax', 'App\Http\Controllers\ArticleController@storeAjax')->name('article.storeAjax')->middleware("auth");
    Route::get('editAjax/{article}', 'App\Http\Controllers\ArticleController@editAjax')->name('article.editAjax')->middleware("auth");
    Route::post('updateAjax/{article}', 'App\Http\Controllers\ArticleController@updateAjax')->name('article.updateAjax')->middleware("auth");
    Route::post('deleteAjax/{article}', 'App\Http\Controllers\ArticleController@destroyAjax' )->name('article.destroyAjax')->middleware("auth");
    Route::get('showAjax/{article}', 'App\Http\Controllers\ArticleController@showAjax')->name('article.showAjax')->middleware("auth");
    Route::post('destroySelected', 'App\Http\Controllers\ArticleController@destroySelected')->name('article.destroySelected');
    });

    Route::prefix('types')->group(function () {

        Route::get('','App\Http\Controllers\TypeController@index')->name('type.index')->middleware("auth");
        Route::get('create', 'App\Http\Controllers\TypeController@create')->name('type.create')->middleware("auth");
        Route::post('storeAjax', 'App\Http\Controllers\TypeController@storeAjax')->name('type.storeAjax')->middleware("auth");
        Route::get('editAjax/{type}', 'App\Http\Controllers\TypeController@editAjax')->name('type.editAjax')->middleware("auth");
        Route::post('updateAjax/{type}', 'App\Http\Controllers\TypeController@updateAjax')->name('type.updateAjax')->middleware("auth");
        Route::post('deleteAjax/{type}', 'App\Http\Controllers\TypeController@destroyAjax' )->name('type.destroyAjax')->middleware("auth");
        Route::get('showAjax/{type}', 'App\Http\Controllers\TypeController@showAjax')->name('type.showAjax')->middleware("auth");
        Route::post('destroySelected', 'App\Http\Controllers\TypeController@destroySelected')->name('type.destroySelected');
        });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
