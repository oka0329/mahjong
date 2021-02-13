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

Route::get('/','PlayerController@index');


Route::get('/select_player','PlayerController@select_p');

Route::post('/select_player_check','PlayerController@player');

Route::get('/ranking','PlayerController@rank');

Route::post('/score','ScoreController@score');
Route::post('/score_add','ScoreController@score_add');

Route::post('/score_add_check','ScoreController@score_add_check');
