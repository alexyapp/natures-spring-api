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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {
    // Public Routes
    // Auth
    $this->group(['prefix' => 'auth'], function () {
        $this->post('login', 'AuthController@login');

        $this->group(['middleware' => 'auth:api'], function () {
            Route::post('register', 'AuthController@register')->middleware('role:admin');
            Route::get('logout', 'AuthController@logout');
            Route::get('me', 'AuthController@me');
        });
    });

    // Jobs
    $this->get('jobs', 'JobController@index');

    // Events
    $this->get('events', 'EventController@index');

    // Locations
    $this->group(['prefix' => 'locations'], function () {
        $this->get('/', 'LocationController@index');
        $this->get('{islandGroup}', 'LocationController@islandGroup');
        $this->get('{islandGroup}/{province}', 'LocationController@province');
        $this->get('{islandGroup}/{province}/{city}', 'LocationController@city');
    });

    // Protected Routes
    $this->group(['middleware' => ['auth:api']], function () {
        // Jobs
        $this->group(['prefix' => 'jobs', 'middleware' => 'role:admin,hr'], function () {
            $this->post('/', 'JobController@store');
            $this->patch('/{job}', 'JobController@update');
            $this->delete('/{job}', 'JobController@destroy');
        });

        // Events
        $this->group(['prefix' => 'events', 'middleware' => 'role:admin,marketing'], function () {
            $this->get('/{event}', 'EventController@show');
            $this->post('/', 'EventController@store');
            $this->patch('/{event}', 'EventController@update');
            $this->delete('/{event}', 'EventController@destroy');
        });

        // Account
        $this->group(['prefix' => 'account'], function () {
            $this->patch('/profile', 'AccountController@profile');
            $this->patch('/password', 'AccountController@password');
            $this->post('/verify', 'AccountController@verify');
        });

        // Images
        $this->group(['prefix' => 'images'], function () {
            $this->post('/', 'ImageController@upload');
        });
    });
});