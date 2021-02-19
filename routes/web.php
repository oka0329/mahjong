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

Route::get('/player_add','PlayerController@player_add');
Route::post('/player_add','PlayerController@player_create');

Route::get('/ranking','PlayerController@rank');

Route::post('/score','ScoreController@score');
Route::post('/score_add','ScoreController@score_add');
Route::post('/score_add_check','ScoreController@post');

Route::post('/score_add_check','ScoreController@score_add_check');

Route::post('/score_confirm','ScoreController@score_confirm');

Route::get('/game_index','ScoreController@game_index');

Route::get('/game_index_detail','ScoreController@game_index_detail');

Route::post('/score_edit','ScoreController@score_update');
