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


$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->get('/', function() use ($router) {
        return "<a href='https://github.com/bluesalt-labs/data-lab'>BlueSalt Labs Data Lab API</a> Version 1";
    });

    //$router->group(['middleware' => 'auth'], function () use ($router) {

    // Data Routes
    $router->group(['prefix' => 'data'], function () use ($router) {
        $router->get('/', 'DataController@index');
        $router->get('{id}', 'DataController@getByID');
        $router->post('/', 'DataController@create');
        $router->put('/', 'DataController@update');
        $router->delete('{id}', 'DataController@delete');
    });

    // App Routes
    $router->group(['prefix' => 'app'], function () use ($router) {
        $router->get('/', 'AppController@index');
        $router->get('{id}', 'AppController@getByID');
        $router->post('/', 'AppController@create');
        $router->put('/', 'AppController@update');
        $router->delete('{id}', 'AppController@delete');
    });

    // User Routes
    $router->group(['prefix' => 'user'], function () use ($router) {
        $router->get('/', 'UserController@index');
        $router->get('{id}', 'UserController@getByID');
        $router->post('/', 'UserController@create');
        $router->put('/', 'UserController@update');
        $router->delete('{id}', 'UserController@delete');
    });

    //});
});

