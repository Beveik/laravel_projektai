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
Route::prefix('products')->group(function () {

    Route::get('','App\Http\Controllers\ProductController@index')->name('product.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\ProductController@create')->name('product.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\ProductController@store')->name('product.store')->middleware("auth");
    Route::get('edit/{product}', 'App\Http\Controllers\ProductController@edit')->name('product.edit')->middleware("auth");
    Route::post('update/{product}', 'App\Http\Controllers\ProductController@update')->name('product.update')->middleware("auth");
    Route::post('delete/{product}', 'App\Http\Controllers\ProductController@destroy' )->name('product.destroy')->middleware("auth");
    Route::get('show/{product}', 'App\Http\Controllers\ProductController@show')->name('product.show')->middleware("auth");
    Route::get('search', 'App\Http\Controllers\ProductController@search')->name('product.search')->middleware("auth");
    Route::get('/pdf', 'App\Http\Controllers\ProductController@generatePDF')->name('products.pdf')->middleware("auth");
    Route::get('pdfProduct/{product}','App\Http\Controllers\ProductController@generateProduct')->name('product.pdfproduct')->middleware("auth");
});
Route::prefix('categories')->group(function () {

    Route::get('','App\Http\Controllers\CategoryController@index')->name('category.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\CategoryController@create')->name('category.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\CategoryController@store')->name('category.store')->middleware("auth");
    Route::get('edit/{category}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit')->middleware("auth");
    Route::post('update/{category}', 'App\Http\Controllers\CategoryController@update')->name('category.update')->middleware("auth");
    Route::post('delete/{category}', 'App\Http\Controllers\CategoryController@destroy' )->name('category.destroy')->middleware("auth");
    Route::get('show/{category}', 'App\Http\Controllers\CategoryController@show')->name('category.show')->middleware("auth");
    Route::get('search', 'App\Http\Controllers\CategoryController@search')->name('category.search')->middleware("auth");
    Route::get('/pdf', 'App\Http\Controllers\CategoryController@generatePDF')->name('categories.pdf')->middleware("auth");
    Route::get('pdfCategory/{category}','App\Http\Controllers\CategoryController@generateCategory')->name('category.pdfcategory')->middleware("auth");
});
Route::prefix('shops')->group(function () {

    Route::get('','App\Http\Controllers\ShopController@index')->name('shop.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\ShopController@create')->name('shop.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\ShopController@store')->name('shop.store')->middleware("auth");
    Route::get('edit/{shop}', 'App\Http\Controllers\ShopController@edit')->name('shop.edit')->middleware("auth");
    Route::post('update/{shop}', 'App\Http\Controllers\ShopController@update')->name('shop.update')->middleware("auth");
    Route::post('delete/{shop}', 'App\Http\Controllers\ShopController@destroy' )->name('shop.destroy')->middleware("auth");
    Route::get('show/{shop}', 'App\Http\Controllers\ShopController@show')->name('shop.show')->middleware("auth");
    Route::get('search', 'App\Http\Controllers\ShopController@search')->name('shop.search')->middleware("auth");
    Route::get('/pdf', 'App\Http\Controllers\ShopController@generatePDF')->name('shops.pdf')->middleware("auth");
    Route::get('pdfShop/{shop}','App\Http\Controllers\ShopController@generateShop')->name('shop.pdfshop')->middleware("auth");
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
