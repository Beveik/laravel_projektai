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
Route::get('/test', function () {
    return view('test');
});
Route::prefix('authors')->group(function () {
    Route::get('', 'App\Http\Controllers\AuthorController@index')->name('author.index');

    Route::get('create', 'App\Http\Controllers\AuthorController@create')->name('author.create');
    Route::post('store', 'App\Http\Controllers\AuthorController@store')->name('author.store');
});
Route::prefix('books')->group(function () {
    Route::get('', 'App\Http\Controllers\BooksController@index')->name('books.index');

    Route::get('create', 'App\Http\Controllers\BooksController@create')->name('books.create');
    Route::post('store', 'App\Http\Controllers\BooksController@store')->name('books.store');
});
