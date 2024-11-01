<?php

use Illuminate\Support\Facades\Route;


// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group(['prefix'     => config('backpack.base.route_prefix', 'admin'), 'middleware' => array_merge( (array) config('backpack.base.web_middleware', 'web'), (array) config('backpack.base.middleware_key', 'admin')),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::get('home', 'HomeController@index')->name('page.home.index');
    Route::get('location', 'LocationController@index')->name('page.location.index');
    Route::get('users', 'UsersController@index')->name('page.users.index');
    Route::get('destinations', 'DestinationsController@index')->name('page.destinations.index');
    Route::get('events', 'EventsController@index')->name('page.events.index');
}); // this should be the absolute last line of this file
