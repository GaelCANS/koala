<?php

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
Route::post('/filter-campaign' , 'CampaignController@filter')->name('filter-campaign');
Route::get('/clear-filter-campaign' , 'CampaignController@clearfilter')->name('clear-filter-campaign');
Route::get("/duplicate-campaign/{id}", 'CampaignController@duplicatecampaign')->name('duplicate-campaign')->where(array('id' => '[0-9]+'));

// CampaignChannel
Route::post('campaign-channel/{id}/unlink-channel/{uniqid}', array('uses' => 'CampaignchannelController@destroy', 'as' => 'unlink-channel'));
Route::post('campaign-channel/{id}/duplicate-channel/{uniqid}', array('uses' => 'CampaignchannelController@duplicate', 'as' => 'duplicate-channel'));
Route::post('campaign-channel/{id}/add-channel/{selected}', array('uses' => 'CampaignchannelController@add', 'as' => 'add-channel'));


// CMM
Route::get('/cmm', 'CmmController@index')->name('cmm-index');


// Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard-index');
Route::get('/', 'DashboardController@index');
Route::get('/dashboard-reload-campaigns/{period}', 'DashboardController@reloadCampaigns')->name('dashboard-reload-campaigns');


// Planning
Route::get('/planning', 'PlanningController@index')->name('planning-index');
Route::get('/planning/events', 'PlanningController@events')->name('planning-events');


// Statistic
Route::get('/statistic', 'StatisticController@index')->name('statistic-index');
Route::auth();




