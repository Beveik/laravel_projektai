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
//The framework will automatically convert the array into a JSON response:
Route::get('/', function () {
    return [1, 2, 3];
});

Route::prefix('books')->group(function () {

    Route::get('','App\Http\Controllers\BookController@index')->name('book.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\BookController@create')->name('book.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\BookController@store')->name('book.store')->middleware("auth");
    Route::get('edit/{book}', 'App\Http\Controllers\BookController@edit')->name('book.edit')->middleware("auth");
    Route::post('update/{book}', 'App\Http\Controllers\BookController@update')->name('book.update')->middleware("auth");
    Route::post('delete/{book}', 'App\Http\Controllers\BookController@destroy' )->name('book.destroy')->middleware("auth");
    Route::get('show/{book}', 'App\Http\Controllers\BookController@show')->name('book.show')->middleware("auth");
    Route::get('search', 'App\Http\Controllers\BookController@search')->name('book.search')->middleware("auth");
    Route::get('/pdf', 'App\Http\Controllers\BookController@generatePDF')->name('books.pdf')->middleware("auth");
    Route::get('pdfBook/{book}','App\Http\Controllers\BookController@generateBook')->name('book.pdfbook')->middleware("auth");
});

Route::prefix('authors')->group(function () {

    Route::get('','App\Http\Controllers\AuthorController@index')->name('author.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\AuthorController@create')->name('author.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\AuthorController@store')->name('author.store')->middleware("auth");
    Route::get('edit/{author}', 'App\Http\Controllers\AuthorController@edit')->name('author.edit')->middleware("auth");
    Route::post('update/{author}', 'App\Http\Controllers\AuthorController@update')->name('author.update')->middleware("auth");
    Route::post('delete/{author}', 'App\Http\Controllers\AuthorController@destroy' )->name('author.destroy')->middleware("auth");
    Route::get('show/{author}', 'App\Http\Controllers\AuthorController@show')->name('author.show')->middleware("auth");
    Route::get('search', 'App\Http\Controllers\AuthorController@search')->name('author.search')->middleware("auth");
    Route::get('/pdf', 'App\Http\Controllers\AuthorController@generatePDF')->name('authors.pdf')->middleware("auth");
    Route::get('pdfAuthor/{author}','App\Http\Controllers\AuthorController@generateAuthor')->name('author.pdfauthor')->middleware("auth");
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
