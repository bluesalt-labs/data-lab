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



Route::group(['prefix' => 'docs'], function () {
    Route::get('/', 'DocsController@index')->name('docs_home');
});


Route::prefix('admin')->middleware('sidebar.admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('dashboard');

    Route::prefix('users')->group(function() {
        Route::get('/', 'AdminController@userList')->name('user_list');

        Route::get('new', 'AdminController@userNew')->name('user_new');
        Route::post('create', 'AdminController@userCreate')->name('user_create');

        Route::get('view/{id}', 'AdminController@userSingle')->name('user_view');
        Route::post('update/{id}', 'AdminController@userUpdate')->name('user_update');

        Route::delete('delete/{id}', 'AdminController@userDelete')->name('user_delete');
    });

    Route::prefix('apps')->group(function() {
        Route::get('/', 'AdminController@appList')->name('app_list');
        
        Route::get('new', 'AdminController@appNew')->name('app_new');
        Route::post('create', 'AdminController@appCreate')->name('app_create');
        
        Route::get('view/{id}', 'AdminController@appSingle')->name('app_view');
        Route::post('update/{id}', 'AdminController@appUpdate')->name('app_update');
        
        Route::delete('delete/{id}', 'AdminController@appDelete')->name('app_delete');
    });

    Route::prefix('data')->group(function() {
        Route::get('/', 'AdminController@dataList')->name('data_list');

        Route::get('new', 'AdminController@dataNew')->name('data_new');
        Route::post('create', 'AdminController@dataCreate')->name('data_create');

        Route::get('view/{id}', 'AdminController@dataSingle')->name('data_view');
        Route::post('update/{id}', 'AdminController@dataUpdate')->name('data_update');

        Route::delete('delete/{id}', 'AdminController@dataDelete')->name('data_delete');
    });

    Route::prefix('roles')->group(function() {
        Route::get('/', 'AdminController@roleList')->name('role_list');

        Route::get('new', 'AdminController@roleNew')->name('role_new');
        Route::post('create', 'AdminController@roleCreate')->name('role_create');

        Route::get('view/{id}', 'AdminController@roleSingle')->name('role_view');
        Route::post('update/{id}', 'AdminController@roleUpdate')->name('role_update');

        Route::delete('delete/{id}', 'AdminController@roleDelete')->name('role_delete');
    });
});