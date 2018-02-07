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



Route::get('/', function () {
    return view('index');
});

//$router->get('/', function () use ($router) {
//    //return $router->app->version();
//    return "<a href='https://github.com/bluesalt-labs/data-lab'>BlueSalt Labs Data Lab API</a>";
//});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('home');

Route::group(['prefix' => 'docs'], function () {
    Route::get('/', 'DocsController@index')->name('docs_home');
});


Route::prefix('admin')->group(function() {

});