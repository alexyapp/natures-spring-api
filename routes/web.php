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

Route::view('/', 'website.under-construction');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'PageController@home')->name('website.home');

    Route::view('about-us', 'website.about.index')->name('website.about');
    Route::view('products', 'website.products.index')->name('website.products');
    Route::get('careers', 'PageController@careers')->name('website.careers');
    Route::get('careers/{career}', 'PageController@career')->name('website.career');
    Route::get('events', 'PageController@events')->name('website.events');
    Route::get('events/{event}', 'PageController@event')->name('website.event');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    $this->get('/', 'HomeController')->name('admin.home');
    $this->view('settings', 'admin.settings.index')->name('admin.settings');

    $this->group(['prefix' => 'users'], function () {
        $this->get('/', 'UserController@index')->name('users.index');
        $this->get('datatable', 'UserController@datatable')->name('users.datatable');
        $this->get('create', 'UserController@create')->name('users.create');
        $this->get('{user}/edit', 'UserController@edit')->name('users.edit');
    });

    $this->group(['prefix' => 'roles'], function () {
        $this->get('/', 'RoleController@index')->name('roles.index');
        $this->get('datatable', 'RoleController@datatable')->name('roles.datatable');
        $this->get('create', 'RoleController@create')->name('roles.create');
        $this->get('{role}/edit', 'RoleController@edit')->name('roles.edit');
    });
    
    $this->group(['prefix' => 'jobs'], function () {
        $this->get('/', 'JobController@index')->name('jobs.index');
        $this->get('datatable', 'JobController@datatable')->name('jobs.datatable');
        $this->get('create', 'JobController@create')->name('jobs.create');
        $this->get('{job}/edit', 'JobController@edit')->name('jobs.edit');
    });

    $this->group(['prefix' => 'events'], function () {
        $this->get('/', 'EventController@index')->name('events.index');
        $this->get('datatable', 'EventController@datatable')->name('events.datatable');
        $this->get('create', 'EventController@create')->name('events.create');
        $this->get('{event}/edit', 'EventController@edit')->name('events.edit');
    });
});