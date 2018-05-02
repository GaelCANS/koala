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


// Indicator
Route::resource(
    'indicators',
    'IndicatorController'
);

// Parameter
Route::resource(
    'parameters',
    'ParameterController' ,
    array(
        'names' => array(
            'index' => 'parameters-index'
        )
    )
);

// Channel
Route::resource(
    'channels',
    'ChannelController' ,
    array(
        'names' => array(
            'index' => 'channels-index'
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
Route::post('/campaign-upload' , 'CampaignController@upload')->name('upload-campaign');
Route::post('/campaign-delete-image' , 'CampaignController@deleteImage')->name('delete-image-campaign');
Route::get('/clear-filter-campaign' , 'CampaignController@clearfilter')->name('clear-filter-campaign');
Route::get("/duplicate-campaign/{id}", 'CampaignController@duplicatecampaign')->name('duplicate-campaign')->where(array('id' => '[0-9]+'));

// CampaignChannel
Route::post('campaign-channel/{id}/unlink-channel/{uniqid}', array('uses' => 'CampaignchannelController@destroy', 'as' => 'unlink-channel'));
Route::post('campaign-channel/{id}/duplicate-channel/{uniqid}', array('uses' => 'CampaignchannelController@duplicate', 'as' => 'duplicate-channel'));
Route::post('campaign-channel/{id}/add-channel/{selected}', array('uses' => 'CampaignchannelController@add', 'as' => 'add-channel'));


// CMM
Route::get('/cmm', 'CmmController@index')->name('cmm-index');
Route::post('/cmm/params', 'CmmController@params');
Route::get('/cmm/close', 'CmmController@close');
Route::post('/cmm/previous', 'CmmController@previous');
Route::post('/cmm/addCampaign', 'CmmController@addCampaign');
Route::post('/cmm/send', 'CmmController@send');



// Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard-index');
Route::get('/', 'DashboardController@index');
Route::get('/dashboard-reload-campaigns/{period}', 'DashboardController@reloadCampaigns')->name('dashboard-reload-campaigns');
Route::get('/dashboard/my_campaigns','DashboardController@myCampaigns')->name('dashboard-my-campaigns');


// Planning
Route::get('/planning', 'PlanningController@index')->name('planning-index');
Route::get('/planning/events', 'PlanningController@events')->name('planning-events');


// Statistic
Route::get('/statistic', 'StatisticController@index')->name('statistic-index');
Route::auth();


// Export
Route::get('/export/excel/list-campaigns', 'ExportController@excelListeCampaigns')->name('excel-list-campaigns');


// User
Route::resource(
    'user',
    'UserController'
);
Route::get('/moncompte/{id}' , 'UserController@show')->name('mon-compte');


// Storage image
Route::get('storage/{filename}/{id?}', function ($filename, $id=null)
{

    if (is_null($id)) {
        $path = storage_path('app/public/'.$filename);
    }
    else {
        $path = storage_path('app/public/camp-'.$id.'/'. $filename);
    }

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


