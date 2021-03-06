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

Route::get('/tim', 'GamesController@tim')->name('games.tim');

Route::get('/', 'GamesController@index')->name('games.index');

Route::get('/games/{slug}', 'GamesController@show')->name('games.show');

Route::get('/main', function () {
    return view('justLayouts.index');
});

Route::get('/show', function () {
    return view('justLayouts.show');
});
