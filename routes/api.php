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

//Route::middleware('auth:api')->get('/user', function (Request $request) {

//});


Route::middleware('auth:api')->prefix('v1')->group(function (){
    Route::get('/', function() {
        return "<a href='https://github.com/bluesalt-labs/data-lab'>BlueSalt Labs Data Lab API</a> Version 1";
    });

    //Route::group(['middleware' => 'auth'], function () use ($router) {

    // Data Routes
    Route::group(['prefix' => 'data'], function () {
        Route::get('/', 'DataController@index');
        Route::get('{id}', 'DataController@getByID');
        Route::post('/', 'DataController@create');
        Route::put('/', 'DataController@update');
        Route::delete('{id}', 'DataController@delete');
    });

    // App Routes
    Route::group(['prefix' => 'app'], function () {
        Route::get('/', 'AppController@index');
        Route::get('{id}', 'AppController@getByID');
        Route::post('/', 'AppController@create');
        Route::put('/', 'AppController@update');
        Route::delete('{id}', 'AppController@delete');
    });

    // User Routes
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index');
        Route::get('{id}', 'UserController@getByID');
        Route::post('/', 'UserController@create');
        Route::put('/', 'UserController@update');
        Route::delete('{id}', 'UserController@delete');
    });

    //});
});

