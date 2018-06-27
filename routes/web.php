<?php

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

Route::get('/', 'FootballController@live');
Route::get('/football/live', 'FootballController@live');

//API Football live
Route::get('/football/live/home', 'FootballController@liveEvents');
Route::get('/football/live/main_market', 'FootballController@liveMainMarket');