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
    return view('welcome');
});

Auth::routes();

Route::get('careers', 'PageController@careers')->name('website.careers');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    $this->get('/', 'HomeController')->name('admin.home');
    $this->view('settings', 'admin.settings.index')->name('admin.settings');
    
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