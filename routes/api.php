<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/ign', [
    'uses' => 'UserController@test'
]);

Route::post('/login', [
    'uses' => 'UserController@login',
]);

Route::post('/signup', [
    'uses' => 'UserController@signup'
]);

Route::resource('songs', 'SongController');
