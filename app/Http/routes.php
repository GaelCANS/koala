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
    array(
        'names' => array(
            'index' => 'services-index'
        )
    )
);


// Market
Route::resource(
    'markets',
    'MarketController' ,
    array(
        'names' => array(
            'index' => 'markets-index'
        )
    )
);


// Campaign
Route::resource(
    'campaigns',
    'CampaignController' ,
    array(
        'names' => array(
            'index' => 'campaigns-index'
        )
    )
);
Route::get('/new-campaign', 'CampaignController@newcampaign')->name('new-campaign');
Route::get("/duplicate-campaign/{id}", 'CampaignController@duplicatecampaign')->name('duplicate-campaign')->where(array('id' => '[0-9]+'));

// CampaignChannel
Route::post('campaign-channel/{id}/unlink-channel/{uniqid}', array('uses' => 'CampaignchannelController@destroy', 'as' => 'unlink-channel'));
Route::post('campaign-channel/{id}/duplicate-channel/{uniqid}', array('uses' => 'CampaignchannelController@duplicate', 'as' => 'duplicate-channel'));
Route::post('campaign-channel/{id}/add-channel/{selected}', array('uses' => 'CampaignchannelController@add', 'as' => 'add-channel'));


// CMM
Route::get('/cmm', 'CmmController@index')->name('cmm-index');


// Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard-index');
Route::get('/dashboard-reload-campaigns/{period}', 'DashboardController@reloadCampaigns')->name('dashboard-reload-campaigns');


// Planning
Route::get('/planning', 'PlanningController@index')->name('planning-index');


// Statistic
Route::get('/statistic', 'StatisticController@index')->name('statistic-index');