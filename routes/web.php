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


Route::prefix('admin')->middleware('sidebar.admin')->namespace('Admin')->group(function() {
    Route::get('/', 'DashboardController@index')->name('dashboard');


/*
    // todo: can I loop through slugs and create these?
    $modelSlugs = array( 'user', 'app', 'data', 'role' );

    foreach($modelSlugs as $slug) {
        Route::prefix($slug)->group(function($router) {
            //var_dump( $router ); die;
            route::get('/', ucfirst($slug).'Controller@list')->name($slug.'_list');

            route::get('new', ucfirst($slug).'Controller@new')->name($slug.'_new');
            route::post('create', ucfirst($slug).'Controller@create')->name($slug.'_create');

            route::get('view/{id}', ucfirst($slug).'Controller@view')->name($slug.'_view');
            route::post('update', ucfirst($slug).'Controller@update')->name($slug.'_update');

            route::delete('delete', ucfirst($slug).'Controller@delete')->name($slug.'_delete');
        })->with($slug);
    }
*/

    Route::prefix('user')->group(function() {
        Route::get('/', 'UserController@list')->name('user_list');

        Route::get('new', 'UserController@new')->name('user_new');
        Route::post('create', 'UserController@create')->name('user_create');

        Route::get('view/{id}', 'UserController@single')->name('user_view');
        Route::post('update/{id}', 'UserController@update')->name('user_update');

        Route::delete('delete', 'UserController@delete')->name('user_delete');
    });

    Route::prefix('app')->group(function() {
        Route::get('/', 'AppController@list')->name('app_list');
        
        Route::get('new', 'AppController@new')->name('app_new');
        Route::post('create', 'AppController@create')->name('app_create');
        
        Route::get('view/{id}', 'AppController@single')->name('app_view');
        Route::post('update', 'AppController@update')->name('app_update');
        
        Route::delete('delete', 'AppController@delete')->name('app_delete');
    });

    Route::prefix('data')->group(function() {
        Route::get('/', 'DataController@list')->name('data_list');

        Route::get('new', 'DataController@new')->name('data_new');
        Route::post('create', 'DataController@create')->name('data_create');

        Route::get('view/{id}', 'DataController@single')->name('data_view');
        Route::post('update/{id}', 'DataController@update')->name('data_update');

        Route::delete('delete', 'DataController@delete')->name('data_delete');
    });

    Route::prefix('role')->group(function() {
        Route::get('/', 'RoleController@list')->name('role_list');

        Route::get('new', 'RoleController@new')->name('role_new');
        Route::post('create', 'RoleController@create')->name('role_create');

        Route::get('view/{id}', 'RoleController@single')->name('role_view');
        Route::post('update/{id}', 'RoleController@update')->name('role_update');

        Route::delete('delete', 'RoleController@delete')->name('role_delete');
    });
});