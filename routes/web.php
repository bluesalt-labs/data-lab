<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    //return $router->app->version();
    return "<a href='https://github.com/bluesalt-labs/data-lab'>BlueSalt Labs Data Lab API</a>";
});


//==================== API v1 ====================//

$router->group(['prefix' => 'api/v1'], function () use ($router) {
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

//================================================//
