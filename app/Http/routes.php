<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Service
Route::resource(
    'services',
    'ServiceController' ,
    [
        'names' => [
            'index' => 'liste-services'
        ]
    ]
);


// Campaign
Route::resource(
    'campaigns',
    'CampaignController' ,
    [
        'names' => [
            'index' => 'liste-campaigns'
        ]
    ]
);


// CMM
Route::get('/cmm', 'CmmController@index')->name('cmm-index');


// Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard-index');


// Planning
Route::get('/planning', 'PlanningController@index')->name('planning-index');


// Statistic
Route::get('/statistic', 'StatisticController@index')->name('statistic-index');