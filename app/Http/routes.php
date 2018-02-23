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
            'index' => 'services-index'
        ]
    ]
);


// Market
Route::resource(
    'markets',
    'MarketController' ,
    [
        'names' => [
            'index' => 'markets-index'
        ]
    ]
);


// Campaign
Route::resource(
    'campaigns',
    'CampaignController' ,
    [
        'names' => [
            'index' => 'campaigns-index'
        ]
    ]
);
Route::get('/new-campaign', 'CampaignController@newcampaign')->name('new-campaign');
Route::get('/{id}/duplicate-campaign', 'CampaignController@duplicatecampaign')->name('duplicate-campaign');

// CampaignChannel
Route::post('campaign-channel/{id}/unlink-channel/{uniqid}', ['uses' => 'CampaignchannelController@destroy', 'as' => 'unlink-channel']);
Route::post('campaign-channel/{id}/duplicate-channel/{uniqid}', ['uses' => 'CampaignchannelController@duplicate', 'as' => 'duplicate-channel']);
Route::post('campaign-channel/{id}/add-channel/{selected}', ['uses' => 'CampaignchannelController@add', 'as' => 'add-channel']);


// CMM
Route::get('/cmm', 'CmmController@index')->name('cmm-index');


// Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard-index');
Route::get('/dashboard-reload-campaigns/{period}', 'DashboardController@reloadCampaigns')->name('dashboard-reload-campaigns');


// Planning
Route::get('/planning', 'PlanningController@index')->name('planning-index');


// Statistic
Route::get('/statistic', 'StatisticController@index')->name('statistic-index');