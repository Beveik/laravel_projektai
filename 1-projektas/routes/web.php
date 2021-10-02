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
Route::get('/betkokianuoroda', function () {
    return view('pirmasispuslapis');
});
Route::get('/pirmasispuslapis', function () { //dvi nuorodos į tą patį psl
    return view('pirmasispuslapis');
});
Route::get('/antrasvaizdas', function () { //dvi nuorodos į tą patį psl
    return view('antrasvaizdas');
});
